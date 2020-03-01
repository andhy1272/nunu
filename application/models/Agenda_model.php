<?php
	/**
	 * 
	 */
	class Agenda_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		

		public function get_list($from = null, $to = null) {

			$from = $this->input->post('date_from');
			$to = $this->input->post('date_to');
			$filter = '';

			if ( (($from !== null) && ($from !== '')) && (($to !== null) && ($to !== '')) ) {
				$filter = 'a.agenda_date >= STR_TO_DATE("' . $from . '", "%Y-%m-%d")';
				$filter = ' AND ';
				$filter = 'a.agenda_date <= STR_TO_DATE("' . $to . '", "%Y-%m-%d")';
			}
			else if (($from !== null) && ($from !== '')) {
				$filter = 'a.agenda_date >= STR_TO_DATE("' . $from . '", "%Y-%m-%d")';
			}
			else if (($to !== null) && ($to !== '')) {
				$filter = 'a.agenda_date <= STR_TO_DATE("' . $to . '", "%Y-%m-%d")';
			}
			else {
				$filter = 'a.agenda_date >= CURDATE()';
			}

			$q = 'SELECT a.agenda_id, a.agenda_date, a.agenda_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.agenda_service, a.agenda_status, a.agenda_notes FROM nunu_agenda a INNER JOIN nunu_patients p WHERE a.agenda_patient_id = p.patient_id AND ' . $filter . ' ORDER BY a.agenda_date, a.agenda_time ASC;';

			//echo $q;
			$query = $this->db->query($q);

			return $query->result_array();
		}




		public function get_view($agenda_id) {

			$q = 'SELECT a.agenda_id, a.agenda_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.agenda_service, a.agenda_status, a.agenda_notes FROM nunu_agenda a INNER JOIN nunu_patients p WHERE a.agenda_patient_id = p.patient_id AND a.agenda_id = ' . $agenda_id . ';';

			//echo $q;
			$query = $this->db->query($q);

			return $query->row_array();

		}



		public function appointments_per_day($date, $store) {

			$q = 'SELECT a.agenda_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.agenda_service, a.agenda_status, a.agenda_notes FROM nunu_agenda a INNER JOIN nunu_patients p WHERE a.agenda_patient_id = p.patient_id AND a.agenda_date = "' . $date . '" AND a.agenda_store = ' . $store . ' ORDER BY a.agenda_time ASC;';

			//echo $q;
			$query = $this->db->query($q);

			return $query->result_array();
		}



		public function create($data){
			// Create patient
			$this->db->insert('nunu_agenda', $data);
			$insertId = $this->db->insert_id();

			return $insertId;
		}


		public function edit_specific_attribute(array $data) {
			$data_to_update = array( 
			    $data['column_name'] => $data['new_value']
			);

			$this->db->where('agenda_id', $data['agenda_id']);

			$result = $this->db->update($data['table_name'], $data_to_update);

			return $result;
		}


//SELECT a.appointment_id, a.appointment_date, a.appointment_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.appointment_status, a.appointment_notes FROM nunu_appointments a INNER JOIN nunu_patients p WHERE a.appointment_patient_id = p.patient_id AND a.appointment_date >= CURDATE() ORDER BY a.appointment_date, a.appointment_time ASC;



		
	}