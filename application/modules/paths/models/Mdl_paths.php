<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_paths extends Response_Model {

	public $table               = 'paths';
	public $primary_key         = 'paths.id';

	
	public function findById($id) {
		$qry = $this->db->where('id', $id)->get('paths');
		if($qry->num_rows())
			return current($qry->result_array());
		
		return false;
	}

	public function is_exists($field, $value, $id=null) {
		if ($id == null){
			$qry = $this->db->where($field,$value)->get('paths');	
		} else {
			$qry = $this->db->where($field,$value)->where('id !=',$id)->get('paths');
		}
        if($qry->num_rows())
            return true;
        else
            return false;
    }

    public function save_records($all_records,$pickup_location_id, $pickup_city_id) {
    	$rows = array();
    	foreach ($all_records as $records) {
			if ($records['drop_location'] && $records['duration'] && $records['distance'] && $records['vehicle']) {
				$rows[] = array(
								'id'=>null,
								'pickup_location_id'=>$pickup_location_id,
								'pickup_city_id' => $pickup_city_id,
								'drop_location_id' => $records['drop_location'],
								'duration' => $records['duration'],
								'distance' => $records['distance'],
								'vehicles' => json_encode($records['vehicle'],true),
								'created_at'=>date('Y-m-d h:i:s'),
								'updated_at'=>date('Y-m-d h:i:s')
							);
			}
		}
		if ($rows) {
			$this->db->insert_batch('tbl_paths',$rows);
		}
    }

    public function update_records($all_records,$pickup_location_id, $pickup_city_id) {
    	$rows = array();
    	foreach ($all_records as $records) {
			if ($records['drop_location'] && $records['duration'] && $records['distance'] && $records['vehicle']) {
				$rows = array(
								'pickup_location_id'=>$pickup_location_id,
								'pickup_city_id' => $pickup_city_id,
								'drop_location_id' => $records['drop_location'],
								'duration' => $records['duration'],
								'distance' => $records['distance'],
								'vehicles' => json_encode($records['vehicle'],true),
								'updated_at'=>date('Y-m-d h:i:s')
							);
				$this->mdl_paths->save($records['id'],$rows);
			}
		}
    }

}

?>
