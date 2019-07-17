<?php
	/**
	 * 
	 */
	class Patient_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		

		public function get_list($sort = 'name') {
			$query = $this->db->get('nunu_patients');
			return $query->result_array();
		}

		public function get_view($patient_id) {
			$query = $this->db->get_where('nunu_patients', array('patient_id' => $patient_id));
			return $query->row_array();
		}




		public function get_find_list($keyword) {
			$query = $this->db->get('nunu_patients');

		}

		
		
		public function create($enc_password){
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