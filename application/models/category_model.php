<?php
	class Category_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}


		public function get_categories(){
			
			$query = $this->db->get('categories');
				return $query->result_array();
			}
		

		public function get_CatById($cat_id){

			$query = $this->db->get_where('categories', array('cat_id' => $cat_id));
			return $query->row_array();

		}

		public function create_category($data){

			$this->db->insert('categories',$data);


		}


		 public function update_category($data, $cat_id)
     {
        if(!empty($data) && !empty($cat_id)){
            $update = $this->db->update('categories', $data, array('cat_id'=>$cat_id));
            return $update?true:flase;
        }else{
            return flase;
        }
     }


     public function delete_category($id){
        $delete = $this->db->delete('categories', array('cat_id' => $id));
        return $delete?true:false;

     }









	}