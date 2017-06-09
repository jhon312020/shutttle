<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_locations extends Response_Model {

	public $table               = 'locations';
	public $primary_key         = 'locations.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('locations');
		if($qry->num_rows())
			return current($qry->result_array());
		
		return false;
	}

	public function is_exists($field, $value, $id=null) {
		if ($id == null){
			$qry = $this->db->where($field,$value)->get('locations');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('locations');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

    public function getList() {
    	$list = $this->db->select('id, location')->get('locations')->result_array();
    	$lists = array();
    	foreach ($list as $value) {
    		$lists[$value['id']] = $value['location'];
    	}
    	return $lists;
    }

}

?>
