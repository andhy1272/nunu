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


		//Create a NEW agenda
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Nueva Atenci&oacute;n";
			$data['result'] = "vacio";

			/*
			//TAB - Physical Exam
			$physical_exam_data = array(
				'atention_blood_pressure' => $this->input->post('atention-blood-pressure'),
				'atention_heart_rate' => $this->input->post('atention-heart-rate'),
				'atention_breath_rate' => $this->input->post('atention-breath-rate'),
				'atention_temperature' => $this->input->post('atention-temperature'),
				'atention_weight' => $this->input->post('atention-weight'),
				'atention_height' => $this->input->post('atention-height'),
				'atention_BMI' => $this->input->post('atention-BMI'),
				'atention_head_circunference' => $this->input->post('atention-head-circunference'),
				'atention_skin' => $this->input->post('atention-skin'),
				'atention_skin_details' => $this->input->post('atention-skin-details'),
				'atention_conscience' => $this->input->post('atention-conscience'),
				'atention_walk' => $this->input->post('atention-walk'),
				'atention_biotype' => $this->input->post('atention-biotype'),
				'atention_neurologic' => $this->input->post('atention-neurologic'),
				'atention_head' => $this->input->post('atention-head'),
				'atention_ENT' => $this->input->post('atention-ENT'),
				'atention_neck' => $this->input->post('atention-neck'),
				'atention_thorax' => $this->input->post('atention-thorax'),
				'atention_abdomen' => $this->input->post('atention-abdomen'),
				'atention_genitourinary' => $this->input->post('atention-genitourinary'),
				'atention_spine' => $this->input->post('atention-spine'),
				'atention_limbs' => $this->input->post('atention-limbs'),
				'atention_observations' => $this->input->post('atention-observations')
			);

			//TAB - Diagnosis
			$diagnosis_data = array(
				'atention_cie10_diagnosis' => $this->input->post('atention-cie10-diagnosis'),
				'atention_open_diagnosis' => $this->input->post('atention-open-diagnosis')
			);

			//TAB - Prescription
			$prescription_ids = $this->input->post('prescription-ids');

			if ($prescription_ids != "") {
				
			}

			$prescription_data = array(
			);

			*/

			//TAB - Exams
			$exams_data = $this->input->post('exams');
			if(!empty($exams_data)) {
				foreach ($exams_data as $key => $value) {
					echo ($value . "<br/>");
				}
			}
			//exit;


			//$exams_data = array(
			//);

			//TAB - Files
			$files_data = array(
			);

			//TAB - Procedures
			$procedures_data = array(
			);

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
		public function edit($attention_id) {
			/*
			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Editar Cita";
			$data['data']['agenda_data'] = $this->agenda_model->get_view($agenda_id);
			$data['data']['error'] = '';

			if(empty($data['data']['agenda_data'])) {
				$data['data']['error'] = 'Ha ocurrido un error al cargar la cita.';
			}
			*/

			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Editar Atenci&oacute;n";
			$data['result'] = "vacio";

			$this->load->view('templates/main', $data);
			
		}









	}