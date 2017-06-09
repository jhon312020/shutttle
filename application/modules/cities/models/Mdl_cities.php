<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_cities extends Response_Model {

	public $table               = 'cities';
	public $primary_key         = 'cities.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('cities');
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
            	)
			);
	}

	public function is_exists($field, $value, $id=null) {
		if ($id == null){
			$qry = $this->db->where($field,$value)->get('cities');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('cities');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

    public function getList() {
    	$list = $this->db->select('id, name')->get('cities')->result_array();
    	$resultList = array();
    	foreach ($list as $value) {
    		$resultList[$value['id']] = $value['name'];
    	}
    	return $resultList;
    }

}

?>
