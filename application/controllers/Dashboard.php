<?php
	/**
	 * Dashboard page of the App
	 */
	class Dashboard extends CI_Controller{

		private const VIEW_LOAD = 'dashboard/dashboard';
		
		//function __construct(argument)
		//{
			# code...
		//}

		public function index(){
			$data['page_title'] = "Dashboard";
			$data['view'] = $this::VIEW_LOAD;

			$this->load->view('templates/main', $data);
		}


	}
