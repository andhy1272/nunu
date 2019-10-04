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

	public function get_view_background($patient_id) {
		$query = $this->db->get_where('nunu_patient_background', array('background_patient_id' => $patient_id));
		return $query->row_array();
	}

	public function get_find_list($keyword) {
		$query = $this->db->get('nunu_patients');

	}

	public function create($data, $data_background = null){
		// Create patient
		$this->db->insert('nunu_patients', $data);
		$insertId = $this->db->insert_id();

		if($insertId){
			if($data_background == null) {
				$data_background = array();
			}

			$data_background['background_patient_id'] = $insertId;

			$this->db->insert('nunu_patient_background', $data_background);
		}

		return $insertId;
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


	public function quick_search($patient_id = null, $patient_name = null) {
		//SELECT patient_id_number, patient_name, patient_last_name FROM nunu_patients WHERE patient_id_number LIKE '%7%' OR patient_name LIKE '%T%' OR patient_last_name LIKE '%L%' ORDER BY patient_name;

		$q = "SELECT patient_id, patient_id_number, patient_name, patient_last_name FROM nunu_patients WHERE ";

		if (($patient_id != null) && ($patient_name != null)){
			$q .= "patient_id_number LIKE '%" . $patient_id . "%' OR patient_name LIKE '%" . $patient_name ."%' OR patient_last_name LIKE '%" . $patient_name . "%'";
		}
		else {
			if ($patient_id != null) {
				$q .= "patient_id_number LIKE '%" . $patient_id . "%'";
			}
			else {
				$q .= "patient_name LIKE '%". $patient_name . "%' OR patient_last_name LIKE '%" . $patient_name . "%'";
			}
		}

		$q .= " ORDER BY patient_name";
		
		$query = $this->db->query($q);
		return $query->result_array();
	}

}








