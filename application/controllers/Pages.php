<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
 
 public function __construct()
 
    {
        parent::__construct();
        $this->load->model('post_model','pm');
        $this->load->model('category_model','cm');
        $this->load->model('user_model','um');


        }

		public function index()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/home');
		$this->load->view('Layouts/footer');
	}

	public function About()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/about');
		$this->load->view('Layouts/footer');
	}


	public function Posts($offset = 0)
	{
		// Pagination Config	
			$config['base_url'] = base_url() . 'Pages/posts/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');
			// Init Pagination
			$this->pagination->initialize($config);


		$email = $this->session->userdata('email');

		        $data['result']=$this->um->getallusers($email);
		$data['posts'] = $this->pm->get_posts($config['per_page'],$offset);

		$this->load->view('Layouts/header');
		$this->load->view('Pages/posts',$data);
		$this->load->view('Layouts/footer');
	}



	// public function Create_post()
	// {
	// 	$data['categories'] = $this->cm->get_categories();

	// 	$this->form_validation->set_rules('title','Title','required');
	// 	$this->form_validation->set_rules('body','Body','required');

	// 	   if(!empty($_FILES['img']['name'])){
                
 //                $config['upload_path'] = 'uploads/post/images/';
 //                $config['allowed_types'] = 'jpg|jpeg|png|gif';
 //                $config['file_name'] = $_FILES['img']['name'];
 //                $config['maintain_ratio'] = TRUE;
 //                $config['width']    = 2056;
 //                $config['height']   = 2056;
                
 //                //Load upload library and initialize configuration
 //                $this->load->library('upload',$config);
 //                $this->upload->initialize($config);
                
 //                if($this->upload->do_upload('img')){
 //                    $uploadData = $this->upload->data();
 //                    $img = $uploadData['file_name'];
 //                }else{
 //                    $img = '';
 //                }
 //            }else{
 //                $img = '';
 //            }       
         



	// 	if($this->form_validation->run() == FALSE){

	// 	$this->load->view('Layouts/header');
	// 	$this->load->view('Pages/create_post',$data);
	// 	$this->load->view('Layouts/footer');

	// 	} else{

	// 		$data = array(

	// 			'title' => $this->input->post('title'),
	// 			'body' => $this->input->post('body'),
	// 			'img' => base_url().'uploads/post/images/'.$img ,
	// 			'category_id' => $this->input->post('category_id'),

	// 			);

	// 		$this->pm->create_post($data);
	// 		redirect(base_url().'Pages/Posts');
			

	// 	}

	// }	



		public function View_post($id)
	{
		   $email = $this->session->userdata('email');
		   $u_id = $this->session->userdata('u_id');


		   $data['result']=$this->um->getallusers($email);

		$data['post'] = $this->pm->get_PostById($id);
		
		 $post_id = $data['post']['id'];
		$data['likes'] = $this->um->total_likes($post_id);
		 // print_r($data);
		 // exit();

		$data['total_cmnts'] = $this->um->total_cmnts($post_id);

		$data['comments'] = $this->um->get_cmnts($post_id);

		// print_r($data);
		// exit();

		$this->load->view('Layouts/header');
		$this->load->view('Pages/view_post',$data);
		$this->load->view('Layouts/footer');
	}



		// 	public function Edit_post($id){

		// $this->form_validation->set_rules('title','Title','required');
		// $this->form_validation->set_rules('body','Body','required');
            
  //           $Data = array(
  //               'title' => $this->input->post('title'),
  //               'body' => $this->input->post('body')
  //               );

  //           if($this->form_validation->run() == true){

  //               $update = $this->pm->update_post($Data, $id);

  //               if($update){

  //                   $this->session->set_flashdata('succcess_msg', 'Faq hasn been Updated');
  //                   redirect('/Pages/Posts');
  //               }else{

  //                   $data['error_msg'] = 'Some problems occurred, please try again.';
  //               }
  //           }
  //       $data['post'] = $this->pm->get_PostById($id);
  //       $data['title'] = 'Update Post';
  //       $data['action'] = 'Edit';
  //       $this->load->view('layouts/header', $data);
  //       $this->load->view('Pages/edit_post', $data);
  //       $this->load->view('layouts/footer');

  //       }
     	

    //  	public function delete_post($id){

    //     if($id){

    //         $delete = $this->pm->delete_post($id);

    //         if($delete){

    //             $this->session->set_flashdata('success_msg', 'Buyer has been removed successfully.');

    //         }else{

    //             $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');

    //         }

    //     }

    //     redirect('/Pages/Posts');

    // }   



    
    



}
