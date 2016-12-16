<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public function index()
	{
		
		$this->load->view('library_view');
	}

	public function getUserBooks()
	{//get list of books checked_out by user

		//user session id shoul dbe set
		$user_id = $_SESSION['user']; 
		$sql = 'SELECT b.id, b.isbn, b.title, b.author
				FROM books b
				INNER JOIN checked_out co
				ON co.books_id = b.id
				WHERE co.users_id ='.$user_id.'
				AND co.status = 1'; 
		$query = $this->db->query($sql); 

		if($query->num_rows() > 0) //make sure result exists
		{
			echo json_encode($query->result()); 
		}
		else
		{
                         echo json_encode('null');
		}
	}
}