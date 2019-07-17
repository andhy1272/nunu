<?php
	/**
	 * 
	 */
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}
		
		
		public function register($enc_password){
			//User data array
			$data = array(
				'user_name' => $this->input->post('name'),
				'user_username' => $this->input->post('username'),
				'user_email' => $this->input->post('email'),
				'user_password' => $enc_password
			);

			// Insert user
			return $this->db->insert('nunu_users', $data);
		}
	}