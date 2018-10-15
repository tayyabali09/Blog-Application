<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 
 public function __construct()
 
    {
        parent::__construct();
        $this->load->model('post_model','pm');
        $this->load->model('category_model','cm');
        $this->load->model('user_model','um');


        }


        // Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');

			
			if($this->form_validation->run() === FALSE){
				$this->load->view('layouts/header');
				$this->load->view('users/register', $data);
				$this->load->view('layouts/footer');
			} else {

				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                
			);
				$this->um->register($data);
				// Set message
				$this->session->set_flashdata('success_msg', 'You are now registered and can log in');
				redirect('User/login');
			}
		}
		// Log in user

		public function login()
			{
			
			$this->load->view('layouts/header');
			$this->load->view('users/login');
			$this->load->view('layouts/footer');


			}



		public function authcheck(){
		
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('layouts/header');
				$this->load->view('users/login', $data);
				$this->load->view('layouts/footer');
			} else {
				
				// Get username
				$email = $this->input->post('email');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$user_id = $this->um->login($email, $password);
				if($user_id){
					// Create session
					$user_data = array(
						'u_id' => $u_id,
						'username' => $username,
						'email' => $email,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('success_msg', 'You are now logged in');
					redirect('User/dashboard');
				} else {
					// Set message
					$this->session->set_flashdata('error_msg', 'Login is invalid');
					redirect('user/login');
				}		
			}
		}


		public function dashboard(){

			if($this->session->userdata('logged_in') == TRUE){

		        // $user = $this->session->userdata('name');
		        // $data['user'] = $this->session->userdata($user);
		        $email = $this->session->userdata('email');

		        $data['result']=$this->um->getallusers($email);
		        // print_r($data);
		        // exit();
				$data['posts'] = $this->pm->get_posts();


				$this->load->view('layouts/header');
				$this->load->view('users/dashboard',$data);
				$this->load->view('layouts/footer');

			} else{

				redirect('User/login');
			}
		
		}



		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('username');
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('user/login');
		}
		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->um->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}
		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->um->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	


		public function Create_post()
		{
			if($this->session->userdata('logged_in') == TRUE){

		        // $user = $this->session->userdata('name');
		        // $data['user'] = $this->session->userdata($user);
		        $email = $this->session->userdata('email');

		        $data['result']=$this->um->getallusers($email);

		$data['categories'] = $this->cm->get_categories();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');

		   if(!empty($_FILES['img']['name'])){
                
                $config['upload_path'] = 'uploads/post/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['img']['name'];
                $config['maintain_ratio'] = TRUE;
                $config['width']    = 2056;
                $config['height']   = 2056;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('img')){
                    $uploadData = $this->upload->data();
                    $img = $uploadData['file_name'];
                }else{
                    $img = '';
                }
            }else{
                $img = '';
            }       


		if($this->form_validation->run() == FALSE){

		$this->load->view('Layouts/header');
		$this->load->view('users/create_post',$data);
		$this->load->view('Layouts/footer');

		} else{

			$data = array(

				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'img' => base_url().'uploads/post/images/'.$img ,
				'user_id' => $this->input->post('user_id'),
				'category_id' => $this->input->post('category_id'),

				);

			$this->pm->create_post($data);
			$this->session->set_flashdata('success_msg', 'Post has been Created');
			redirect(base_url().'User/dashboard');
			

		}
		
	}	else{

				redirect('User/login');
			}

}

	


	public function Edit_post($id){

		if($this->session->userdata('logged_in') == FALSE){

			redirect(base_url('User/login'));
		}

		$data['categories'] = $this->cm->get_categories();
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');
            
            $Data = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
                );

            if($this->form_validation->run() == true){

                $update = $this->pm->update_post($Data, $id);

                if($update){

                    $this->session->set_flashdata('succcess_msg', 'Post hasn been Updated');
                    redirect('/Pages/Posts');
                }else{

                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        $data['post'] = $this->pm->get_PostById($id);
        $data['title'] = 'Update Post';
        $data['action'] = 'Edit';
        $this->load->view('layouts/header', $data);
        $this->load->view('Pages/edit_post', $data);
        $this->load->view('layouts/footer');

        }




	public function delete_post($id){

        	if($this->session->userdata('logged_in') == TRUE){

        		redirect(base_url('User/login'));

        	}
        if($id){

            $delete = $this->pm->delete_post($id);

            if($delete){

                $this->session->set_flashdata('success_msg', 'Post has been removed successfully.');

            }else{

                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');

            }

        }

        redirect('/User/dashboard');

    }   


public function Create_comment()
	{
		if($this->session->userdata('logged_in') == FALSE){

			redirect(base_url('User/login'));
		}


		$this->form_validation->set_rules('comment','comment','required');

		if($this->form_validation->run() == FALSE){

		$this->load->view('Layouts/header');
		$this->load->view('Pages/view_post',$data);
		$this->load->view('Layouts/footer');

		} else{

			$data = array(

				'user_name' => $this->input->post('user_name'),
				'p_id' => $this->input->post('p_id'),
				'comment' => $this->input->post('comment'),

				);

			$this->um->create_comment($data);
			redirect('Pages/posts');
			

		}

	}	


	public function Create_like()
	{
			if($this->session->userdata('logged_in') == FALSE){

				redirect(base_url('User/login'));
			}



				$email = $this->session->userdata('email');

		        $data['result']=$this->um->getallusers($email);


			$data = array(

				'user_id' => $this->input->post('user_id'),
				'post_id' => $this->input->post('post_id'),
				
				);

			$this->um->create_like($data);
			redirect(base_url().'Pages/posts');
			

		}

	



















}











