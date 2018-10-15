<?php
	class User_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}


		public function register($data){

			$query = $this->db->insert('users', $data);
			return $query;


		}


		// Log user in
		public function login($email, $password){
			// Validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->num_rows();
			} else {
				return false;
			}
		}
		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}



		public function getallusers($email)
    {
        $this->db->select('*');
        $this->db->where("email",$email);
        $q=$this->db->get('users');
        return $q->result_array();
    }
    

    public function create_comment($data){

			$query = $this->db->insert('comments', $data);
			return $query;


		}

		public function get_cmnts($post_id){

			$query = $this->db->get_where('comments', array('p_id' => $post_id));
			return $query->result_array();
		}


		// public function get_likes(){
			
		// 	$query = $this->db->get('likes');
		// 		return $query->result_array();
		// 	}
		
	public function total_likes($post_id)
    {
      $query =  $this->db->query("
        SELECT COUNT(l_id) AS total
         FROM likes
         where post_id = '$post_id';
        ");
        return $query->result();
    }

    public function total_cmnts($post_id)
    {
      $query =  $this->db->query("
        SELECT COUNT(c_id) AS total
         FROM comments
        where p_id = '$post_id';
        ");
        return $query->result();
    }









		// public function get_CatById($cat_id){

		// 	$query = $this->db->get_where('categories', array('cat_id' => $cat_id));
		// 	return $query->row_array();

		// }

		public function create_like($data){

			$this->db->insert('likes',$data);


		}









}



