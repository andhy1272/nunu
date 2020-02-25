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
		public function view($agenda_id = NULL) {

			$data['view'] = $this::VIEW_VIEW;
			$data['data']['page_title'] = "Ver Cita";
			$data['data']['agenda_data'] = $this->agenda_model->get_view($agenda_id);
			$data['data']['error'] = '';

			if(empty($data['data']['agenda_data'])) {
				$data['data']['error'] = 'Ha ocurrido un error al cargar la cita.';
			}

			$this->load->view('templates/main', $data);
		}


		//Create a NEW agenda
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Crear Cita";
			$data['result'] = "vacio";

			$form_data = array(
				'agenda_date' => $this->input->post('agenda-date'),
				'agenda_time' => $this->input->post('agenda-hour') . ":" . $this->input->post('agenda-minutes') . ":00",
				'agenda_patient_id' => $this->input->post('patient-id'),
				'agenda_service' => $this->input->post('service-list'),
				'agenda_status' => "ontime",
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
				$result = $this->agenda_model->create($form_data);

				if ($result) {
					$this->session->set_flashdata('message_success', 'Cita creada exitosamente');
					redirect('agenda/');
				} 
				else {
					$this->load->view('templates/main', $data);
					$this->session->set_flashdata('error_message', 'Ha ocurrido un error. Por favor intente de nuevo o contacte con el administrador del sistema');
				}
			}
		}


		//Edit agenda
		public function edit($patient_id) {
			/*
			$data['page_title'] = "Patients Edit";
			//tengo q ver si se salva todo o solo lo nuevo
			*/
		}



		//Function called using AJAX
		//Returns a list of hours for an specific day (date, store)
		public function appointments_per_day() {
			$date = $this->input->post('date');
			$store = $this->input->post('store');

			$result = $this->agenda_model->appointments_per_day($date, $store);

			echo json_encode($result);
		}


	}