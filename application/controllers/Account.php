<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$data['pref'] = $this->getPreference(); 

		if($data['pref'] == false)
		{
			$this->load->view('account_view');
		}
		else
		{
			$this->load->view('account_view', $data);
		}
	}

	public function getUserInfo()
	{ //get account info for current user	
		
		$id = $_SESSION['user']; 
		$sql = 'SELECT name_first, name_last, email, address1, address2, city, state, zip
				FROM users WHERE id = '.$id; 

		$query = $this->db->query($sql); 
		if($query->num_rows() > 0)
		{
			echo json_encode($query->result()); 
		}
		else
		{

		}
	}

	public function getBillingInfo()
	{ //get account info for current user	
		
		$id = $_SESSION['user']; 
		$sql = 'SELECT bi.charge, MONTHNAME(bi.date) as month, b.title
				FROM billing bi
				INNER JOIN checked_out co
				ON co.id = bi.checked_out_id
				INNER JOIN books b
				ON b.id = co.books_id
				WHERE bi.users_id = '.$id.'
				AND MONTHNAME(date) = MONTHNAME(NOW())'; 

		$query = $this->db->query($sql); 
		if($query->num_rows() > 0)
		{
			echo json_encode($query->result()); 
		}
		else
		{

		}
	}

	public function getSubjects()
	{
		$sql = 'SELECT id,subject FROM subjects WHERE 1'; 
		$query = $this->db->query($sql); 

		if($query->num_rows() > 0)
		{
			echo json_encode($query->result()); 
		}
		else
		{
			echo json_encode('null'); 
		}
	}

	public function updatePreference()
	{
		$subjects = $_POST['subject']; 
		$user_id = $_SESSION['user']; 
   
                $sql = 'DELETE FROM users_subjects WHERE users_id ='.$user_id; 
                $this->db->query($sql); 
                unset($sql); 

		foreach($subjects as $key => $value)
		{
			 
	            $sql = 'INSERT INTO users_subjects (users_id, subjects_id) VALUES ('.$user_id.', '.$value.')'; 
	            $this->db->query($sql); 
		
		}

		header('Location:'.base_url().'account'); 
	}

	public function getPreference()
	{//get prefeernce for user
		
		$user_id = $_SESSION['user']; 
		$sql = 'SELECT s.subject, s.id FROM users_subjects us 
				INNER JOIN subjects s
				ON s.id = us.subjects_id
				WHERE users_id ='.$user_id; 

		$query = $this->db->query($sql); 
		if($query->num_rows() > 0)
		{
			return json_encode($query->result());
		}
		else
		{
			return false; 
		}
	}
}