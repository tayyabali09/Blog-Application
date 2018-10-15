<?php
	class Post_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}


		public function get_posts($limit=FALSE,$offset=FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('categories', 'categories.cat_id = posts.category_id');
			$this->db->join('users', 'users.u_id = posts.user_id');
			$query = $this->db->get('posts');
				return $query->result_array();
			}
		

		public function get_PostById($id){
			$this->db->join('users', 'users.u_id = posts.user_id');
			$this->db->join('categories', 'categories.cat_id = posts.category_id');
			$query = $this->db->get_where('posts', array('id' => $id));
			return $query->row_array();

		}

		public function create_post($data){

			$this->db->insert('posts',$data);


		}


		 public function update_post($data, $id)
     {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('posts', $data, array('id'=>$id));
            return $update?true:flase;
        }else{
            return flase;
        }
     }


     public function delete_post($id){
        $delete = $this->db->delete('posts', array('id' => $id));
        return $delete?true:false;

     }







	}