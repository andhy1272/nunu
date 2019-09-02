<?php
	/**
	 * Manage Patient Appointments
	 */
	class Appointments extends CI_Controller {
		
		private const VIEW_LIST = 'appointments/list';
		private const VIEW_EDIT = 'appointments/edit';
		private const VIEW_VIEW = 'appointments/view';
		private const VIEW_CREATE = 'appointments/create';


		//Shows appointments list
		public function list() {
			//if(!file_exists(APPPATH.'views/patients/list.php')){
			//	show_404();
			//}

			$data['page_title'] = "Appointments List";
			$data['view'] = $this::VIEW_LIST;
			$data['data']['appointments_list'] = $this->appointment_model->get_list();

			$this->load->view('templates/main', $data);
		}

		//View appointment information
		public function view($patient_id = NULL) {
			/*
			$data['page_title'] = "Patient View";
			$data['view'] = $this::VIEW_VIEW;
			$data['data']['patient_data'] = $this->patient_model->get_view($patient_id);
			$data['data']['error'] = '';

			if(empty($data['data']['patient_data'])) {
				$data['data']['error'] = 'El paciente no se encontra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
			*/
		}


		//Create a NEW appointment
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Crear Cita";
			$data['result'] = "vacio";

			$this->load->view('templates/main', $data);
		}


		//Edit appointment
		public function edit($patient_id) {
			/*
			$data['page_title'] = "Patients Edit";
			//tengo q ver si se salva todo o solo lo nuevo
			*/
		}


	}