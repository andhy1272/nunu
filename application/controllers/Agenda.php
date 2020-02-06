<?php
	/**
	 * Manage Agenda
	 */
	class Agenda extends CI_Controller {
		
		private const VIEW_LIST = 'agenda/list';
		private const VIEW_EDIT = 'agenda/edit';
		private const VIEW_VIEW = 'agenda/view';
		private const VIEW_CREATE = 'agenda/create';


		//Shows agenda list
		public function list() {
			//if(!file_exists(APPPATH.'views/patients/list.php')){
			//	show_404();
			//}

			$data['view'] = $this::VIEW_LIST;
			$data['data']['page_title'] = "Agenda List";
			$data['data']['agenda_list'] = $this->agenda_model->get_list();

			$this->load->view('templates/main', $data);
		}

		//View agenda information
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


		//Create a NEW agenda
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Crear Cita";
			$data['result'] = "vacio";

			$form_data = array(
				'appointment_patient_id' => $this->input->post('patient-id'),
				'appointment_medic' => $this->input->post('appointment-medic'),
				'appointment_store' => $this->input->post('appointment-store'),
				'appointment_service' => $this->input->post('appointment-service'),
				'appointment_notes' => $this->input->post('appointment-notes')
			);
			$data['form_data'] = $form_data;

			$this->form_validation->set_rules('patient-id', 'Paciente', 'required');
			$this->form_validation->set_rules('appointment-medic', 'Medico', 'required');
			$this->form_validation->set_rules('appointment-store', 'Sucursal', 'required');
			$this->form_validation->set_rules('appointment_service', 'Servicio', 'required');
			$this->form_validation->set_rules('appointment-notes', 'Detalles', 'required');


			$this->load->view('templates/main', $data);
		}


		//Edit agenda
		public function edit($patient_id) {
			/*
			$data['page_title'] = "Patients Edit";
			//tengo q ver si se salva todo o solo lo nuevo
			*/
		}


	}