<?php
	/**
	 * 
	 */
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}
		
		//Returns all users list
		public function get_list(){
			$query = $this->db->get('nunu_users');
			return $query->result_array();
		}

		//Returns all user info
		public function get_view($user_id) {
			$query = $this->db->get_where('nunu_users', array('user_id' => $user_id));
			return $query->row_array();
		}
		
		//Register a new user
		public function register($data){
			// Insert user
			$this->db->insert('nunu_users', $data);
			$insertId = $this->db->insert_id();
			return $insertId;
		}

		//Log user in
		public function login($alias, $password){
			$this->db->where('user_alias', $alias);
			$this->db->where('user_password', $password);

			$result = $this->db->get('nunu_users');

			if($result->num_rows() == 1){
				return $result->row(0)->user_id;
			} 
			else {
				return false;
			}
		}




		//Checks if alias exists
		public function check_alias_exists($alias){
			$query = $this->db->get_where('nunu_users', array('user_alias' => $alias));
			if(empty($query->row_array())){
				return true;
			}
			else {
				return false;
			}
		}

		//Checks if email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('nunu_users', array('user_email' => $email));
			if(empty($query->row_array())){
				return true;
			}
			else {
				return false;
			}
		}
	}