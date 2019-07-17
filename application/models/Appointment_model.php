<?php
	/**
	 * 
	 */
	class Appointment_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		

		public function get_list($from = null, $to = null) {

			$from = $this->input->post('date_from');
			$to = $this->input->post('date_to');
			$filter = '';

			if ( (($from !== null) && ($from !== '')) && (($to !== null) && ($to !== '')) ) {
				$filter = 'a.appointment_date >= STR_TO_DATE("' . $from . '", "%Y-%m-%d")';
				$filter = ' AND ';
				$filter = 'a.appointment_date <= STR_TO_DATE("' . $to . '", "%Y-%m-%d")';
			}
			else if (($from !== null) && ($from !== '')) {
				$filter = 'a.appointment_date >= STR_TO_DATE("' . $from . '", "%Y-%m-%d")';
			}
			else if (($to !== null) && ($to !== '')) {
				$filter = 'a.appointment_date <= STR_TO_DATE("' . $to . '", "%Y-%m-%d")';
			}
			else {
				$filter = 'a.appointment_date >= CURDATE()';
			}

			$q = 'SELECT a.appointment_id, a.appointment_date, a.appointment_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.appointment_status, a.appointment_notes FROM nunu_appointments a INNER JOIN nunu_patients p WHERE a.appointment_patient_id = p.patient_id AND ' . $filter . ' ORDER BY a.appointment_date, a.appointment_time ASC;';

			//echo $q;
			$query = $this->db->query($q);

			return $query->result_array();
		}




		public function get_view($patient_id) {
			$query = $this->db->get_where('nunu_patients', array('patient_id' => $patient_id));
			return $query->row_array();
		}


//SELECT a.appointment_id, a.appointment_date, a.appointment_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.appointment_status, a.appointment_notes FROM nunu_appointments a INNER JOIN nunu_patients p WHERE a.appointment_patient_id = p.patient_id AND a.appointment_date >= CURDATE() ORDER BY a.appointment_date, a.appointment_time ASC;



		
	}