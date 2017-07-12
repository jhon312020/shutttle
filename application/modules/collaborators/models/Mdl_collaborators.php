<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_collaborators extends Response_Model {

    public $table               = 'collaborators';
    public $primary_key         = 'collaborators.id';

    public function default_order_by() {
        $this->db->order_by('collaborators.id');
    }

    public function validation_rules() {
        return array(
            'name' => array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            /*'address' => array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            ),
            'zone' => array(
                'field' => 'zone',
                'label' => 'BCN Area',
                'rules' => 'required|decimal'
            ),*/
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
			'password' => array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
            /*'phone' => array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|is_numeric'
            ),
            'website' => array(
                'field' => 'website',
                'label' => 'Website address',
                'rules' => 'required'
            ),
            'available_seats' => array(
                'field' => 'available_seats',
                'label' => 'Available Seats',
                'rules' => 'required'
            ),*/
            'price' => array(
                'field' => 'price',
                'label' => 'Rates',
                'rules' => 'required'
            ),
            'payment_methods' => array(
                'field' => 'payment_methods',
                'label' => 'Payment Type',
                'rules' => 'required'
            )
        );
    }

    public function checkAvailableRoute($post_params) {
        $record = $this->where('id',$post_params['collaborators_id'])->get()->result();
        if ($record) {
            $record = $record[0];
            if (strtolower($post_params['from_location']) == strtolower($record->name) || strtolower($post_params['to_location']) == strtolower($record->name)) {
                if ($post_params['from_location_id'] == $record->location_id || $post_params['to_location_id'] == $record->location_id){
                    return true;
                } else {
                    return false;
                }    
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>
