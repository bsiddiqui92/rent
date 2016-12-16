<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rent extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct(); 
		if(!isset($_SESSION['user'])) header('Location:'.BASE_URL('login')); 
	}

	public function index()
	{
		$this->load->view('rent_view');
	}

	public function getBooks()	
	{//get all availabe books in the system
		$sql = 'SELECT id, isbn, title, author, price, quantity FROM books WHERE 1'; 
		$query = $this->db->query($sql);

		if($query->num_rows() > 0) //results found
		{
			echo json_encode($query->result()); 
		}
	}

	public function checkout()
	{//mark book as checked out. update qty and add to users library
		//checkout data
		$id = $this->input->post('book');
		$price = $this->input->post('price'); 
		$user_id = $_SESSION['user']; 

		$sql = 'INSERT INTO checked_out (`books_id`, `users_id`, `checkout_date`, `status`) VALUES ('.$id.', '.$user_id.', NOW(), 1)'; 
		$query = $this->db->query($sql); 
		$co_id = $this->db->insert_id(); 
		//update quantity for books in books table
		//in this instance subtract 1
		$this->update_quantity($id, '-');
		$this->update_billing($user_id, $co_id, $price); 

	}

	public function update_quantity($id, $operation)
	{
		//get current quantity
		if($operation == '+')
		{
			$sql = 'UPDATE books SET quantity = quantity + 1 WHERE id ='.$id; 
		}
		else if($operation == '-')
		{
			$sql = 'UPDATE books SET quantity = quantity - 1 WHERE id ='.$id;
		}

		$this->db->query($sql); 

	}

	public function update_billing($users_id='', $id = '', $price='')
	{ //add billing info to billing table

		$sql = 'INSERT INTO billing (`users_id`, `checked_out_id`, `charge`, `date`) VALUES ('.$users_id.', '.$id.', '.$price.', NOW())';
		$this->db->query($sql);  
	}

	public function search()
	{ //user search term to retrn book result from books
		$term = $this->input->post('search');
		//$term = $_GET['search']; 
		$sql = 'SELECT * FROM books WHERE
									(
									    title LIKE "%'.$term.'%"
									    OR isbn LIKE "%'.$term.'%"
									    OR author LIKE "%'.$term.'%"
									)'; 

		$query = $this->db->query($sql); 

		if($query->num_rows() > 0)
		{
			echo json_encode($query->result()); 
		}
		else
		{
			echo json_encode('false'); 
		}
	}

	public function giveBack()
	{//return book from user library

		$id = $_POST['id']; 
		$user_id = $_SESSION['user'];  

		$sql = 'UPDATE checked_out SET status = 0 WHERE books_id = '.$id.' AND status = 1 AND users_id = '.$user_id;
		$this->db->query($sql); 
		//add book back to books table
		$this->update_quantity($id, '+');  

		echo json_encode('hello'); 
	}

		public function getBooksByPreference()
	{
		$users_id = $_SESSION['user']; 
		$sql = 'SELECT isbn, author, price, title FROM books WHERE id IN (
				SELECT bs.books_id FROM books_subjects bs 
			    INNER JOIN users_subjects us 
			    ON us.subjects_id = bs.subjects_id
			    WHERE us.users_id ='.$users_id.')';

		$query = $this->db->query($sql); 

		if($query->num_rows() > 0)
		{
			echo json_encode($query->result()); 
		}
		else
		{
			$this->getBooks(); 
		} 
	}
}
