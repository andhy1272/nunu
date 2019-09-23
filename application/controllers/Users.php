<?php
	/**
	 * Register, Edit and Remove Users
	 */
	class Users extends CI_Controller{

		private const VIEW_LIST = 'users/list';
		private const VIEW_EDIT = 'users/edit';
		private const VIEW_VIEW = 'users/view';
		private const VIEW_LOGIN = 'users/login';
		private const VIEW_REGISTER = 'users/register';
		
		//function __construct(argument)
		//{
			# code...
		//}

		//Shows users list
		public function list(){
			$data['view'] = $this::VIEW_LIST;
			$data['data']['page_title'] = "Usuarios";
			$data['data']['users_list'] = $this->user_model->get_list();

			$this->load->view('templates/main', $data);
		}


		//Show user information
		public function view($user_id = NULL){
			$data['view'] = $this::VIEW_VIEW;
			$data['data']['page_title'] = "Detalles del Usuario";
			$data['data']['user_data'] = $this->user_model->get_view($user_id);
			$data['data']['error'] = '';

			if(empty($data['data']['user_data'])) {
				$data['data']['error'] = 'El usuario no se encuentra en la Base de Datos';
			}

			$this->load->view('templates/main', $data);
		}


		//Register a new user
		public function register(){
			$data['data']['page_title'] = 'Registrar Usuario';


			//$permisions['permisions'] = $this->input->post('user-permisions');
			//print_r($permisions);


			$this->form_validation->set_rules('user-name', 'Name', 'required');
			$this->form_validation->set_rules('user-email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('user-alias', 'Alias', 'required|callback_check_alias_exists');
			$this->form_validation->set_rules('user-password', 'Password', 'required');
			$this->form_validation->set_rules('user-password2', 'Confirm Password', 'matches[user-password]');

			if ($this->form_validation->run() === FALSE) {
				$data['view'] = $this::VIEW_REGISTER;

				$this->load->view('templates/main', $data);
			}
			else{
				//User data array 
				$data = array(
					'user_name' => $this->input->post('user-name'),
					'user_email' => $this->input->post('user-email'),
					'user_email' => $this->input->post('user-phone'),
					'user_email' => $this->input->post('user-address'),
					'user_alias' => $this->input->post('user-alias'),
					'user_password' => md5($this->input->post('user-password')),
					'user_role' => 'admin',
					'user_status' => 1
				);

				$new_user_id = $this->user_model->register($data);

				$this->session->set_flashdata('message_success', 'Usuario registrado exitosamente');

				redirect('users/view/' . $new_user_id);
			}
		}


		//Login user
		public function login(){
			$data['data']['page_title'] = 'Iniciar Sesion';

			$this->form_validation->set_rules('user-alias', 'Alias', 'required');
			$this->form_validation->set_rules('user-password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['view'] = $this::VIEW_LOGIN;

				$this->load->view('templates/login/main', $data);
			}
			else{
				//User data array 
				$alias = $this->input->post('user-alias');
				$password = md5($this->input->post('user-password'));
				
				//check if user exists
				$user_id = $this->user_model->login($alias, $password);

				if($user_id){
					//create session
					$user_data = array(
						'user_id' => $user_id,
						'user_alias' => $alias,
						'user_login' => true
					);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('message_success', 'Bienvenido ' . $alias);
					redirect('/');
				}
				else {
					$this->session->set_flashdata('message_error', 'Alias o Contraseña invalidos');
					redirect('login');
				}
			}
		}


		//Log user out
		public function logout(){
			//unset user data
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_alias');
			$this->session->unset_userdata('user_login');

			$this->session->set_flashdata('message_success', 'Sesion finalizada');
			redirect('login');
		}


		public function check_alias_exists($alias) {
			$this->form_validation->set_message('check_alias_exists', 'El Alias ingresado ya ha sido registrado. Porfavor ingrese uno diferente.');

			if($this->user_model->check_alias_exists($alias)){
				return true;
			}
			else {
				return false;
			}
		}

		public function check_email_exists($email) {
			$this->form_validation->set_message('check_email_exists', 'El Email ingresado ya ha sido registrado. Porfavor ingrese uno diferente.');

			if($this->user_model->check_email_exists($email)){
				return true;
			}
			else {
				return false;
			}
		}

	}
