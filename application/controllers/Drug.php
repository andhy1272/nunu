<?php
	/**
	 * Manage Drugs list
	 */
	class Drug extends CI_Controller {

		//Shows Drugs search
		public function search() {

			$terms = $this->input->post('terms');
			$multiple_terms = explode(' ', $terms);

			//First search the whole terms
			$result = $this->drug_model->search($terms);

			//Then search term by term
			if (count($multiple_terms) > 1) {
				foreach ($multiple_terms as $t) {
					$aux = $this->drug_model->search($t);

					$result = array_merge($result, $aux);
				}
			}

			echo json_encode($result);
		}



	}