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

    public function getPrivateList() {
    	$list = $this->db->select('id, name')->where('shared',0)->get('vehicles')->result_array();
    	$lists = array();
    	foreach ($list as $value) {
    		$lists[$value['id']] = $value['name'];
    	}
    	return $lists;
    }

    public function getVehicles($seats, $type = 'all'){
    	switch ($type) {
    		case 'all':
    			return $this->db->where('is_active',1)->where('min_passengers <= ',$seats)->where('max_passengers >= ',$seats)->order_by('order_number')->get('vehicles')->result_array();	
    			break;
    		case 'private':
    			return $this->db->where('is_active',1)->where('min_passengers <= ',$seats)->where('max_passengers >= ',$seats)->where('shared',0)->order_by('order_number')->get('vehicles')->result_array();	
    			break;
    		case 'shared':
    			return $this->db->where('is_active',1)->where('min_passengers <= ',$seats)->where('max_passengers >= ',$seats)->where('shared',1)->order_by('order_number')->get('vehicles')->result_array();	
    			break;
    	}
    }

    public function getVehicleRates($no_of_seats, $rate_type = 'rate1') {
        if ($rate_type == 'rate3') {
            $rates = $this->db->where('no_of_seats',1)->where('rate_type','rate3')->get('rates')->result_array();
            $rates[0]['no_of_seats'] *= $no_of_seats;
            $rates[0]['rate_for_one_way'] *= $no_of_seats;
            $rates[0]['rate_for_round_a_trip'] *= $no_of_seats;
            $rates[0]['night_rate_for_one_way'] *= $no_of_seats;
            $rates[0]['night_rate_for_round_a_trip'] *= $no_of_seats;
            return $rates;
        } else {
            return $this->db->where('no_of_seats',$no_of_seats)->where('rate_type',$rate_type)->get('rates')->result_array();
        }
    }

    public function getNewOrderNumber() {
        $list = $this->db->select('max(order_number) as order_number_new')->get('vehicles')->result_array();
        if ($list && isset($list[0])) {
            return $list[0]['order_number_new']+1;
        }else{
            return 1;
        }
    }

}

?>
