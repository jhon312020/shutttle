<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_vehicles extends Response_Model {

	public $table               = 'vehicles';
	public $primary_key         = 'vehicles.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('vehicles');
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
            	'brand' => array(
	                'field' => 'brand',
	                'label' => 'Brand',
	                'rules' => 'required'
            	)
			);
	}

	public function is_exists($field, $value, $id=null) {
		if ($id == null){
			$qry = $this->db->where($field,$value)->get('vehicles');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('vehicles');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

    public function getList() {
    	$list = $this->db->select('id, name')->get('vehicles')->result_array();
    	$lists = array();
    	foreach ($list as $value) {
    		$lists[$value['id']] = $value['name'];
    	}
    	return $lists;
    }

}

?>
