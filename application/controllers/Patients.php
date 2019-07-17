<?php
	/**
	 * Manage Patients
	 */
	class Patients extends CI_Controller {
		
		private const VIEW_LIST = 'patients/list';
		private const VIEW_EDIT = 'patients/edit';
		private const VIEW_VIEW = 'patients/view';
		private const VIEW_CREATE = 'patients/create';

		//Shows patients list
		public function list() {
			//if(!file_exists(APPPATH.'views/patients/list.php')){
			//	show_404();
			//}

			$data['page_title'] = "Patients List";
			$data['view'] = $this::VIEW_LIST;
			$data['data']['patients_list'] = $this->patient_model->get_list();

			$this->load->view('templates/main', $data);
		}

		//View patient information
		public function view($patient_id = NULL) {
			$data['page_title'] = "Patient View";
			$data['view'] = $this::VIEW_VIEW;
			$data['data']['patient_data'] = $this->patient_model->get_view($patient_id);
			$data['data']['error'] = '';

			if(empty($data['data']['patient_data'])) {
				$data['data']['error'] = 'El paciente no se encontra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
		}


		//Create a NEW patient
		public function create() {
			$data['page_title'] = "Patient Create";
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['title'] = "Crear Paciente";

			$this->load->view('templates/main', $data);
		}


		//Edit patient
		public function edit($patient_id) {
			$data['page_title'] = "Patients Edit";
			//tengo q ver si se salva todo o solo lo nuevo
		}


	}