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

    public function deleteCityLocations($city_id) {
    	$locations = $this->db->select('id')->where('city_id',$city_id)->get('locations')->result();
    	foreach ($locations as $location) {
    		$this->deleteLocation($location->id);
    	}
    }

    public function deleteLocation($id) {
    	$this->db->where('id',$id)->delete('locations');
    	$this->db->where('pickup_location_id',$id)->delete('paths');
    	$this->db->where('drop_location_id',$id)->delete('paths');
    }

    public function isBarcelonaCity($locations) {
        if (in_array($this->config->item('shuttle_city_id'), $locations)) {
            return true;
        } else {
            return false;
        }
    }

}

?>
