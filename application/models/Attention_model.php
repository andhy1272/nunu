<?php
	/**
	 *
	 */
	class Attention_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}


    //Creates New Attention
		public function create($data){
			// Create attention
			$this->db->insert('nunu_agenda', $data);
			$insertId = $this->db->insert_id();

			return $insertId;
		}


		// Creates New attention from agenda appointment
		public function create_from_agenda($agenda_id){
			$q = 'INSERT INTO nunu_attention (
							attention_agenda_id,
							attention_date,
							attention_time,
							attention_patient_id,
							attention_service,
							attention_notes,
							attention_store,
							attention_attended_at
						)
            SELECT
							agenda_id,
							agenda_date,
							agenda_time,
							agenda_patient_id,
							agenda_service,
							agenda_notes,
							agenda_store,
							NOW()
            FROM nunu_agenda
            WHERE agenda_id = ' . $agenda_id . ';'
			;

			$query = $this->db->query($q);
			$insertId = $this->db->insert_id();

			return $insertId;
		}


		//Returns Attention General Info
		public function get_general_info($attention_id) {
			$q = 'SELECT
							a.*,
							CONCAT(p.patient_id_number, " / ", p.patient_name, " ", p.patient_last_name) AS patient_fullname,
							s.store_name
						FROM
							nunu_attention AS a,
							nunu_patients AS p,
							nunu_stores AS s
						WHERE
							a.attention_patient_id = p.patient_id AND
							a.attention_store = s.store_id AND
							a.attention_id = ' . $attention_id . ';'
			;

			$query = $this->db->query($q);

			return $query->row_array();
		}


		//Returns Physical Exam Info
		public function get_physical_info($attention_id) {
			$query = $this->db->get_where('nunu_attention_physical_exam', array('attention_id' => $attention_id));
			return $query->row_array();
		}


		//Returns Diagnosis Info
		public function get_diagnosis_info($attention_id) {
			$query = $this->db->get_where('nunu_attention_diagnosis', array('attention_id' => $attention_id));
			return $query->row_array();
		}


		//Returns Prescription Info
		public function get_prescription_info($attention_id) {
			$query = $this->db->get_where('nunu_attention_prescription', array('attention_id' => $attention_id));
			return $query->result_array();
		}

		//Returns Exams Info
		public function get_exams_info($attention_id) {
			//$query = $this->db->get_where('nunu_attention_exams', array('attention_id' => $attention_id));

			$q = 'SELECT attention_exam_id
				FROM
					nunu_attention_exams
				WHERE
					attention_id = "' . $attention_id . '"
				ORDER BY
					attention_exam_id DESC;'
			;

			$query = $this->db->query($q);

			return $query->result_array();
		}


		//Set/Edit Physical Exam Info
		public function set_physical_info($attention_id) {
			$query = $this->db->get_where('nunu_attention_physical_exam', array('attention_id' => $attention_id));
			return $query->row_array();
		}







		// estas funciones aun no se usan
		public function edit_specific_attribute(array $data) {
			$data_to_update = array(
			    $data['column_name'] => $data['new_value']
			);

			$this->db->where('agenda_id', $data['agenda_id']);

			$result = $this->db->update($data['table_name'], $data_to_update);

			return $result;
		}



		//Request data for search control
		public function search($date) {

			$q = 'SELECT a.*,
					p.patient_id,
					p.patient_id_number,
					CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname,
					s.store_id,
					s.store_name
				FROM
					nunu_agenda AS a,
					nunu_patients AS p,
					nunu_stores AS s
				WHERE
					a.agenda_patient_id = p.patient_id AND
					a.agenda_store = s.store_id AND
					a.agenda_date  = "' . $date . '"
				ORDER BY
					a.agenda_time ASC;'
			;

			$query = $this->db->query($q);

			return $query->result_array();
		}

/*
SELECT a.*, p.patient_id, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, s.store_id, s.store_name
FROM nunu_agenda AS a, nunu_patients AS p, nunu_stores AS s
WHERE a.agenda_patient_id = p.patient_id AND a.agenda_store = s.store_id AND a.agenda_date = "2020-05-12"
ORDER By a.agenda_time DESC;
*/

/*SELECT a.appointment_id, a.appointment_date, a.appointment_time, p.patient_id_number, CONCAT(p.patient_name, " ", p.patient_last_name) AS patient_fullname, a.appointment_status, a.appointment_notes
FROM nunu_appointments a INNER JOIN nunu_patients p
WHERE a.appointment_patient_id = p.patient_id AND a.appointment_date >= CURDATE()
ORDER BY a.appointment_date, a.appointment_time ASC;
*/




	}
