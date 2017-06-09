<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_place_categories extends Response_Model {

	public $table               = 'place_categories';
	public $primary_key         = 'place_categories.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('place_categories');
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
			$qry = $this->db->where($field,$value)->get('place_categories');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('place_categories');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

    public function getList() {
    	$list = $this->db->select('id, name')->get('place_categories')->result_array();
    	$categoryList = array();
    	foreach ($list as $value) {
    		$categoryList[$value['id']] = $value['name'];
    	}
    	return $categoryList;
    }

}

?>
