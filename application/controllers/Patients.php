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
				'patient_blood_type' => $this->input->post('patient-blood-type'),
				'patient_sex' => $this->input->post('patient-sex'),
				'patient_email' => $this->input->post('patient-email'),
				'patient_phone1' => $this->input->post('patient-phone1'),
				'patient_phone2' => $this->input->post('patient-phone2'),
				'patient_address' => $this->input->post('patient-address'),
				'patient_observations' => $this->input->post('patient-observations')
			);
			$data['form_data'] = $form_data;
			
			
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
				$data['result'] = $this->patient_model->create();

				$this->session->set_flashdata('patient_created', 'Paciente creado exitosamente');

				$this->load->view('templates/main', $data);


				//redirect('user/register');
			}
		}


		//Edit patient
		public function edit($patient_id) {
			$data['view'] = $this::VIEW_EDIT;
			$data['data']['page_title'] = "Editar Paciente";
			
			$data['data']['patient_data'] = $this->patient_model->get_view($patient_id);
			$data['data']['error'] = '';

			if(empty($data['data']['patient_data'])) {
				$data['data']['error'] = 'El paciente no se encontra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
		}


		//Function called using AJAX to save modified data
		public function edit_field() {
			
			$patient_id = $this->input->post('patient_id');
			$table = "nunu_" . $this->input->post('object_name');
			$column = $this->input->post('control_name');
			$new_value = $this->input->post('new_value');

			$data = array('patient_id' => $patient_id, 'table_name' => $table, 'column_name' => $column, 'new_value' => $new_value);

			$result = $this->patient_model->edit_field($data);
			//$result;

			echo json_encode($result);
		}


		//Function called using AJAX
		//Returns field for edit data -- text, textarea, date, dropdowns(sex, blood type, )
		public function load_field_type() {
			$type = $this->input->post('type');
			$value = $this->input->post('value');

			switch($type) {
				case "text":
					echo '<input type="text" name="edit-control" class="form-control edit-control" value="' . $value . '">';
					break;

				case "email":
					echo '<input type="email" name="edit-control" class="form-control edit-control" value="' . $value . '">';
					break;

				case "sex":
					$sex_list = get_sex_list();

					$text = '<select name="edit-control" class="form-control edit-control">';
					foreach($sex_list as $sex): 
						if($sex['sex_name'] == $value):
							$text .= '<option selected value="' . $sex['sex_name'] . '">' . $sex['sex_name'] . '</option>';
						else:
							$text .= '<option value="' . $sex['sex_name'] . '">' . $sex['sex_name'] . '</option>';
						endif;
					endforeach;
					$text .= '</select>';

					echo $text;
					break;
					
				default:
					echo "<span>El elemento no pueder ser cargado, por favor intente de nuevo o contacte con el administrador del sistema.</span>";
			}
		}


	}