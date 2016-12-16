<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	
	public function index($msg = '')
	{
		if($msg == '')
		{
			$this->load->view('login_view');
		}
		else
		{
			$data['error'] = 'Invalid Login'; 
			$this->load->view('login_view', $data);
		}  
	}

	public function create()
	{
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$name 	  = $this->input->post('name'); 
		$email 	  = $this->input->post('email');
		$names	  = explode(" ", $name); 

		$first_name = $names[0]; 
		$last_name  = $names[1]; 
		//create user first
		$sql = 'INSERT INTO users (`name_first`, `name_last`, `email`) 
				VALUES ("'.$first_name.'", "'.$last_name.'", "'.$email.'")'; 

		$this->db->query($sql);
		//get newly created id
		$new_user = $this->db->insert_id(); 
		//add login info to logins table
		unset($sql); 
		$sql = 'INSERT INTO logins (`users_id`, `username`, `password`) 
		        VALUES ('.$new_user.', "'.$username.'", "'.$password.'")';  
		$this->db->query($sql); 

		//set session info for login
		$_SESSION['user'] = $new_user; 

		header('Location:'.base_url()); 
	}

	public function authenticate()
	{
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 

		$sql = 'SELECT * FROM logins WHERE username = "'.$username.'" AND password ="'.$password.'"'; 
		$query = $this->db->query($sql); 

		if($query->num_rows() > 0) //record found so user password true
		{
			$_SESSION['user'] = $query->row()->users_id; 
			$_SESSION['password'] = $password; 
			header('Location:'.base_url()); 
		}	
		else
		{
			header('Location:'.base_url('login/index/invalidLogin')); 
		}
	}

	public function logout()
	{
		unset($_SESSION['user']); 
		header('Location:'.base_url()); 
	}
}
