<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		
		$this->load->view('account_view');
	}

	public function update($id = '')
	{//update user info

		if($id == '') $id = $_SESSION['user']; 

		$name = $_POST['name']; 
		$email = $_POST['email']; 
		$address1 = $_POST['address1']; 
		$address2 = $_POST['address2']; 
		$city = $_POST['city']; 
		$state = $_POST['state']; 
		$zip = $_POST['zip']; 

		$names = explode(" ", $name); 
		$first_name = $names[0]; 
		$last_name  = $names[1]; 
		
		$sql = 'UPDATE users SET name_first = "'.$first_name.'", 
								 name_last = "'.$last_name.'", 
								 email = "'.$email.'", 
								 address1 ="'.$address1.'", 
								 address2 ="'.$address2.'", 
								 city = "'.$city.'", 
								 state ="'.$state.'", 
								 zip ="'.$zip.'"
				WHERE id = '.$id; 

		$this->db->query($sql);

		header('Location:'.base_url().'account');  
	}
}