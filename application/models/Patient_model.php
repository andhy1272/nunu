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

	public function get_view_history($patient_id) {
		$query = $this->db->get('nunu_xml');
		return $query->row_array();
	}

	public function get_find_list($keyword) {
		$query = $this->db->get('nunu_patients');

	}

	public function create(){
		//User data array
		$data = array(
			'patient_id_number' => $this->input->post('patient-id-number'),
			'patient_id_type' => $this->input->post('patient-id-type'),
			'patient_name' => $this->input->post('patient-name'),
			'patient_last_name' => $this->input->post('patient-last-name'),
			'patient_birthdate' => $this->input->post('patient-birthdate'),
			'patient_blood_type' => $this->input->post('patient-blood-type'),
			'patient_sex' => $this->input->post('patient-sex'),
			'patient_email' => $this->input->post('patient-email'),
			'patient_phone1' => $this->input->post('patient-phone1'),
			'patient_phone2' => $this->input->post('patient-phone2'),
			'patient_address' => $this->input->post('patient-address'),
			'patient_observations' => $this->input->post('patient-observations')
		);

		// Insert user
		return $this->db->insert('nunu_patients', $data);
	}



	public function edit_specific_attribute(array $data) {
		/*
		$q = "UPDATE " . $data['table_name'] . " SET " . $data['column_name'] . " = '" . $data['new_value'] . "' WHERE patient_id = " . $data['patient_id'];
		
		$query = $this->db->query($q);
		*/


		$data_to_update = array( 
		    $data['column_name'] => $data['new_value']
		);

		$this->db->where('patient_id', $data['patient_id']);

		$result = $this->db->update($data['table_name'], $data_to_update);

		return $result;
	}



}