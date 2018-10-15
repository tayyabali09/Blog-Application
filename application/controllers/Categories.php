<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	 public function __construct()
 
    {
        parent::__construct();
        $this->load->model('post_model','pm');

        $this->load->model('category_model','cm');

        }

		public function index()
	{ 
		if($this->session->userdata('logged_in') == FALSE){

			redirect(base_url('User/login'));
		}

		$data['Categories'] = $this->cm->get_categories();

		$this->load->view('Layouts/header');
		$this->load->view('Category/categories',$data);
		$this->load->view('Layouts/footer');
	}


	public function Create_category()
	{

		if($this->session->userdata('logged_in') == FALSE){

			redirect(base_url('User/login'));
		}

		$this->form_validation->set_rules('cat_name','Category Name','required');

		if($this->form_validation->run() == FALSE){

		$this->load->view('Layouts/header');
		$this->load->view('Category/create_category');
		$this->load->view('Layouts/footer');

		} else{

			$data = array(

				'cat_name' => $this->input->post('cat_name'),
				
				);

			$this->cm->create_category($data);
			redirect(base_url().'Categories');
			

		}

	}	


	public function delete_category($id){

        if($id){
            $delete = $this->cm->delete_category($id);

            if($delete){

                $this->session->set_flashdata('success_msg', 'Buyer has been removed successfully.');

            }else{

                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('/categories');
    }   









}
