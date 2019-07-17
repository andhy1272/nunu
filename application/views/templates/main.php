<?php

	$header_data['page_title'] = "NuNu";
	if (isset($page_title)) {
		$header_data['page_title'] = "NuNu - ". $page_title;
	}





	//LOADS HEAD AND HEADER
	$this->load->view('templates/header', $header_data);

	//LOADS BODY
	if (isset($data)) {
		$this->load->view($view, $data);
	} else {
		$this->load->view($view);
	}
	
	//LOADS FOOTER
	$this->load->view('templates/footer');