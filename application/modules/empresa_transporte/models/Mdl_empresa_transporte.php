<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_empresa_transporte extends Response_Model {

	public $table               = 'empresa_transporte';
	public $primary_key         = 'empresa_transporte.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('empresa_transporte');
		if($qry->num_rows())
			return current($qry->result_array());
		
		return false;
	}

	public function validation_rules() {
		return array(
				'name' => array(
	                'field' => 'name',
	                'label' => 'Name',
	                'rules' => 'required'
            	),
				'city' => array(
	                'field' => 'city',
	                'label' => 'City',
	                'rules' => 'required'
            	),
            	'email' => array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email'
            	),
            	'phone' => array(
	                'field' => 'phone',
	                'label' => 'Phone',
	                'rules' => 'required'
            	)
			);
	}

	public function is_exists($field, $value, $id=null) {
		if ($id == null){
			$qry = $this->db->where($field,$value)->get('empresa_transporte');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('empresa_transporte');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

}

?>
