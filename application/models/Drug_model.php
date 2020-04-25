<?php
/**
 * 
 */
class Drug_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	
	public function search($terms) {
		//SELECT GROUP_CONCAT(dc.drugcat_name SEPARATOR ', ') As drug_categories, d.drug_name, d.drug_generic, d.drug_posology, d.drug_observations FROM nunu_drugs AS d, nunu_drugs_categories AS dc, nunu_drugs_cats_rel AS dcrel WHERE d.drug_id = dcrel.drug_id AND dcrel.drugcat_id = dc.drugcat_id AND drug_name LIKE "paracetamol" GROUP BY (d.drug_id);

		$q = 'SELECT d.drug_id, GROUP_CONCAT(dc.drugcat_name SEPARATOR ", ") As drug_categories, d.drug_name, d.drug_generic, d.drug_posology, d.drug_observations 
			FROM nunu_drugs AS d, nunu_drugs_categories AS dc, nunu_drugs_cats_rel AS dcrel 
			WHERE d.drug_id = dcrel.drug_id AND dcrel.drugcat_id = dc.drugcat_id AND drug_name 
			LIKE "%' . $terms . '%" 
			GROUP BY (d.drug_id);';

		$query = $this->db->query($q);

		return $query->result_array();
	}

}








