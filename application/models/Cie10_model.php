<?php
/**
 * 
 */
class Cie10_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	
	public function search($terms) {

		$q = 'SELECT ("' . $terms . '") AS "term",
				CONCAT(g.key, " ", g.description) AS "group", 
				CONCAT(sg.key, " ", sg.description) AS "subgroup", 
				CONCAT(c.key, " ", c.description) AS "category", 
				CONCAT(d.key, " - ", d.description) AS "diagnosis" 
			FROM 
				nunu_cie10_groups AS g, 
				nunu_cie10_subgroups AS sg, 
				nunu_cie10_categories AS c, 
				nunu_cie10_diagnostic AS d 
			WHERE 
				d.id_category = c.id AND 
				c.id_subgroup = sg.id AND 
				sg.id_group = g.id AND 
				d.description LIKE "%' . $terms . '%";'
		;

		$query = $this->db->query($q);

		return $query->result_array();
	}

}








