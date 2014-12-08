<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
		public function register()
	{
		$this->load->view('user_register');
	}
	//ajax handle user login
	public function admin_login()
	{	
		$post_data = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
		}
		else
		{	
			$user = array(
				'email' => $post_data["email"], 
				'password' => md5(HASH_START . $post_data["password"] . HASH_END)
			);

			$this->load->model('dashboard');
			$user = $this->dashboard->check_admin($user);

			if(count($user) > 0)
			{	
				$user_data = array(
					'user_id' => $user->id,
					'email' => $user->email,
					'user_level' => $user->user_level,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'is_logged_in' => TRUE
				);

				//session is being set in here with index user session, remember session is in a form of array
				$this->session->set_userdata('user_session', $user_data);
						
				$data['status'] = TRUE;
				$data['redirect_url'] = base_url('/dashboard');
			}
			else
			{
				$data['status'] = FALSE;
				$data["error_message"] = "Invalid email and Password! Please Try Again!";
			}
		}
		
		echo json_encode($data);
	}

	//ajax handled user registration
	public function admin_register()
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
		}
		else
		{
			$this->load->model('User');
			$register_user = $this->User->add_user($this->input->post());
			
			if($register_user)
			{
				$data["status"] = TRUE; 

				//since this function is use by add user and user login, http referer will let us know where post data came from
				if($_SERVER['HTTP_REFERER'] == base_url("/register"))
					$data["success_message"] = "Registration successful! You can now <a href='signin'>login</a>!";
				else
					$data["success_message"] = "User is sucessfully added!";
			}
			else
			{
				$data["status"] = FALSE;
				$data["error_message"] = "Registration failed! Please Try Again!";
			}	
		}
	}
}