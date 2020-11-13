<?php
	/**
	 * Manage Attention
	 */
	class Attention extends CI_Controller {

		private const VIEW_LIST = 'attention/list';
		private const VIEW_EDIT = 'attention/edit';
		private const VIEW_VIEW = 'attention/view';
		private const VIEW_CREATE = 'attention/create';


		//Shows agenda list
		public function list() {
			/*
			$data['view'] = $this::VIEW_LIST;
			$data['data']['page_title'] = "Agenda List";
			$data['data']['agenda_list'] = $this->agenda_model->get_list();

			$this->load->view('templates/main', $data);
			*/
		}

		//View agenda information
		public function view($agenda_id = NULL) {
			/*
			$data['view'] = $this::VIEW_VIEW;
			$data['data']['page_title'] = "Ver Cita";
			$data['data']['agenda_data'] = $this->agenda_model->get_view($agenda_id);
			$data['data']['error'] = '';

			if(empty($data['data']['agenda_data'])) {
				$data['data']['error'] = 'Ha ocurrido un error al cargar la cita.';
			}

			$this->load->view('templates/main', $data);
			*/
		}


		//Create NEW attention
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Nueva Atenci&oacute;n";
			$data['result'] = NULL;

			$form_data = array(
				'agenda_date' => $this->input->post('agenda-date'),
				'agenda_time' => $this->input->post('agenda-hour') . ":" . $this->input->post('agenda-minutes') . ":00",
				'agenda_patient_id' => $this->input->post('patient-id'),
				'agenda_service' => $this->input->post('service-list'),
				'agenda_notes' => $this->input->post('agenda-notes'),
				'agenda_store' => $this->input->post('store-list')
			);

			$this->form_validation->set_rules('patient-id', 'Paciente', 'required');
			$this->form_validation->set_rules('store-list', 'Establecimiento', 'required');
			$this->form_validation->set_rules('service-list', 'Servicio', 'required');


			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/main', $data);
			}
			else {
				//MODEL
				$result = $this->attention_model->create($form_data);

				if ($result) {
					//$this->session->set_flashdata('message_success', 'Cita creada exitosamente');
					redirect('attention/edit/' . $result);
				}
				else {
					$this->load->view('templates/main', $data);
					$this->session->set_flashdata('error_message', 'Ha ocurrido un error. Por favor intente de nuevo o contacte con el administrador del sistema');
				}
			}
		}



		//Create NEW attention from Agenda
		public function create_from_agenda() {
			$agenda_id = $this->input->post('id');

			$result = $this->attention_model->create_from_agenda($agenda_id);

			echo json_encode($result);
		}




		//Edit agenda
		public function edit($attention_id) {

			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Atenci&oacute;n";
			$data['data']['general_info'] = $this->attention_model->get_general_info($attention_id);
			$data['data']['physical_info'] = $this->attention_model->get_physical_info($attention_id);
			$data['data']['diagnosis_info'] = $this->attention_model->get_diagnosis_info($attention_id);
			$data['data']['prescription_info'] = $this->attention_model->get_prescription_info($attention_id);
			$data['data']['exams_info'] = $this->attention_model->get_exams_info($attention_id);
			$data['result'] = "vacio";

			//$type = $this->input->post('type');

			$this->load->view('templates/main', $data);
		}









	}
