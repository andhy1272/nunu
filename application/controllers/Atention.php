<?php
	/**
	 * Manage Agenda
	 */
	class Atention extends CI_Controller {
		
		private const VIEW_LIST = 'atention/list';
		private const VIEW_EDIT = 'atention/edit';
		private const VIEW_VIEW = 'atention/view';
		private const VIEW_CREATE = 'atention/create';


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


		//Create a NEW agenda
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Atenci&oacute;n";
			$data['result'] = "vacio";

			$this->load->view('templates/main', $data);


			/*
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

			*/
		}


		//Edit agenda
		public function edit($agenda_id) {
			/*
			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Editar Cita";
			$data['data']['agenda_data'] = $this->agenda_model->get_view($agenda_id);
			$data['data']['error'] = '';

			if(empty($data['data']['agenda_data'])) {
				$data['data']['error'] = 'Ha ocurrido un error al cargar la cita.';
			}

			$this->load->view('templates/main', $data);
			*/
		}









	}