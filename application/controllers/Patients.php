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

			$data['view'] = $this::VIEW_LIST;
			$data['data']['page_title'] = "Pacientes";
			$data['data']['patients_list'] = $this->patient_model->get_list();

			$this->load->view('templates/main', $data);
		}


		//View patient information
		public function view($patient_id = NULL) {
			$data['view'] = $this::VIEW_VIEW;
			$data['data']['page_title'] = "Detalles del Paciente";
			$data['data']['patient_data'] = $this->patient_model->get_view($patient_id);
			$data['data']['patient_data_background'] = $this->patient_model->get_view_background($patient_id);
			$data['data']['error'] = '';

			if(empty($data['data']['patient_data'])) {
				$data['data']['error'] = 'El paciente no se encontra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
		}


		//Create a NEW patient
		public function create() {
			$data['view'] = $this::VIEW_CREATE;
			$data['data']['page_title'] = "Crear Paciente";
			$data['result'] = "vacio";

			$form_data = array(
				'patient_id_number' => $this->input->post('patient-id-number'),
				'patient_id_type' => $this->input->post('patient-id-type'),
				'patient_name' => $this->input->post('patient-name'),
				'patient_last_name' => $this->input->post('patient-last-name'),
				'patient_birthdate' => $this->input->post('patient-birthdate'),
				'patient_sex' => $this->input->post('patient-sex'),
				'patient_blood_type' => $this->input->post('patient-blood-type'),
				'patient_marital_status' => $this->input->post('patient-marital-status'),
				'patient_education' => $this->input->post('patient-education'),
				'patient_profesion' => $this->input->post('patient-profesion'),
				'patient_email' => $this->input->post('patient-email'),
				'patient_phone1' => $this->input->post('patient-phone1'),
				'patient_phone2' => $this->input->post('patient-phone2'),
				'patient_country' => $this->input->post('patient-country'),
				'patient_province' => $this->input->post('patient-province'),
				'patient_city' => $this->input->post('patient-city'),
				'patient_address' => $this->input->post('patient-address'),
				'patient_profesion' => $this->input->post('patient-profesion')
			);
			$data['form_data'] = $form_data;

			$form_data_background = array(
				'background_family' => $this->input->post('background-family'),
				'background_pathalogic' => $this->input->post('background-pathalogic'),
				'background_non_pathalogic' => $this->input->post('background-non-pathalogic'),
				'background_neonatal' => $this->input->post('background-neonatal'),
				'background_gyneco_obstetric' => $this->input->post('background-gyneco-obstetric')
			);
			$data['form_data_background'] = $form_data_background;


			//echo $this->input->post('patient-birthdate');
			//exit;
			
			
			$this->form_validation->set_rules('patient-id-number', 'ID N&uacute;mero', 'required');
			$this->form_validation->set_rules('patient-name', 'Nombre', 'required');
			$this->form_validation->set_rules('patient-last-name', 'Apellidos', 'required');
			$this->form_validation->set_rules('patient-birthdate', 'Fecha de Nacimiento', 'required');
			$this->form_validation->set_rules('patient-phone1', 'Celular', 'required');
			$this->form_validation->set_rules('patient-email', 'E-mail', 'required');
			$this->form_validation->set_rules('patient-address', 'Direcci&oacute;n', 'required');
			

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/main', $data);
			}
			else {
				$result = $this->patient_model->create($form_data, $form_data_background);

				if ($result) {
					$this->session->set_flashdata('message_success', 'Paciente creado exitosamente');
					redirect('patients/edit/' . $result);
				} 
				else {
					$this->load->view('templates/main', $data);
					$this->session->set_flashdata('error_message', 'Ha ocurrido un error. Por favor intente de nuevo o contacte con el administrador del sistema');
				}
			}
		}


		public function quick_create() {
			$form_data = array(
				'patient_id_type' => $this->input->post('patient_id_type'),
				'patient_id_number' => $this->input->post('patient_id_number'),
				'patient_name' => $this->input->post('patient_name'),
				'patient_last_name' => $this->input->post('patient_last_name'),
				'patient_birthdate' => $this->input->post('patient_birthdate'),
				'patient_email' => $this->input->post('patient_email'),
				'patient_phone1' => $this->input->post('patient_phone1'),
				'patient_address' => ':)'
			);

			$result = $this->patient_model->create($form_data);

			echo json_encode($result);
		}


		//Edit patient
		public function edit($patient_id) {
			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Editar Paciente";
			
			$data['data']['patient_data'] = $this->patient_model->get_view($patient_id);
			$data['data']['patient_data_background'] = $this->patient_model->get_view_background($patient_id);
			$data['data']['error'] = '';

			if(empty($data['data']['patient_data'])) {
				$data['data']['error'] = 'El paciente no se encontra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
		}


		//Function called using AJAX to save modified data
		public function edit_specific_attribute() {
			
			$patient_id = $this->input->post('patient_id');
			$table = "nunu_" . $this->input->post('object_name');
			$column = $this->input->post('control_name');
			$new_value = $this->input->post('new_value');

			$data = array('patient_id' => $patient_id, 'table_name' => $table, 'column_name' => $column, 'new_value' => $new_value);

			$result = $this->patient_model->edit_specific_attribute($data);
			//$result;

			echo json_encode($result);
		}


		//Function called using AJAX to save modified data on background table
		public function edit_specific_attribute_background() {
			
			$patient_id = $this->input->post('patient_id');
			$table = "nunu_" . $this->input->post('object_name');
			$column = $this->input->post('control_name');
			$new_value = $this->input->post('new_value');

			$data = array('patient_id' => $patient_id, 'table_name' => $table, 'column_name' => $column, 'new_value' => $new_value);

			$result = $this->patient_model->edit_specific_attribute_background($data);
			//$result;

			echo json_encode($result);
		}


		//Function called using AJAX
		//Returns field for edit data -- text, textarea, date, dropdowns(sex, blood type, )
		public function load_control_type() {
			$type = $this->input->post('type');
			$current_value = $this->input->post('value');

			switch($type) {
				case "text":
					echo '<input type="text" name="edit-control" class="form-control edit-control" value="' . $current_value . '">';
					break;

				case "email":
					echo '<input type="email" name="edit-control" class="form-control edit-control" value="' . $current_value . '">';
					break;

				case "textarea":
					$text = '<textarea rows="6" maxlength="255" name="edit-control" class="form-control edit-control count-chars" >' . $current_value . '</textarea>';
					$text .= '<span class="char-counter" title="Remain chars">255</span>';
					echo $text;
					break;

				case "yesno":
					$text = '<select name="edit-control" class="form-control edit-control">';
						if($current_value == 1){ 
							$text .= '<option selected value="1">Yes</option>';
							$text .= '<option value="0">No</option>';
						}
						else {
							$text .= '<option value="1">Yes</option>';
							$text .= '<option selected value="0">No</option>';
						}
					$text .= '</select>';

					echo $text;
					break;

				case "sex":
					echo get_sex_list($current_value);
					break;

				case "blood":
					echo get_blood_list($current_value);
					break;

				default:
					echo "<span>El elemento no pueder ser cargado, por favor intente de nuevo o contacte con el administrador del sistema.</span>";
			}
		}


		//Function called using AJAX
		//Returns a simple patient list (id, name) filtering 
		public function quick_search() {
			$id = $this->input->post('id');
			$name = $this->input->post('name');

			$result = $this->patient_model->quick_search($id, $name);

			echo json_encode($result);
		}

	}
