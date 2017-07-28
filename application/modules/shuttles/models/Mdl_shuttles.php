<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mdl_shuttles extends Response_Model {

    public $table               = 'booking';
    public $primary_key         = 'booking.id';
    //public $date_created_field  = 'date_created';
    //public $date_modified_field = 'date_modified';

    public function default_order_by(){
        $this->db->order_by('booking.id');
    }

    public function validation_rules()
    {
        return array(
            'hour' => array(
                'field' => 'hour',
                'label' => 'Hour',
                'rules' => 'required'
            ),
            'start_from' => array(
                'field' => 'start_from',
                'label' => 'From',
                'rules' => 'required'
            ),
            'end_at' => array(
                'field' => 'end_at',
                'label' => 'To',
                'rules' => 'required'
            ),
            /*'arrival_time' => array(
                'field' => 'arrival_time',
                'label' => 'Arrival Time',
                'rules' => 'required'
            ),*/
            'price' => array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required'
            ),
            'start_journey' => array(
                'field' => 'start_journey',
                'label' => 'Go Date',
                'rules' => 'required'
            ),
            /*'return_journey' => array(
                'field' => 'return_journey',
                'label' => 'Return Date',
                'rules' => 'required'
            ),*/
            'country' => array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'required'
            ),
            'flight_no' => array(
                'field' => 'flight_no',
                'label' => 'Flight No',
                'rules' => 'required'
            ),
            'adults' => array(
                'field' => 'adults',
                'label' => 'Adults',
                'rules' => 'required'
            ),
            'zone' => array(
                'field' => 'zone',
                'label' => 'Zone',
                'rules' => 'required'
            )
        );
    }

    public function saveData($bookings, $post_params) {
        $post_params['start_journey'] = $this->changeFormat($post_params['start_journey']);
        $data = array(
                'start_journey' => $post_params['start_journey'],
                'hour' => $post_params['hour'],
                'time_go' => $post_params['hour'],
                'flight_no' => $post_params['flight_no']
                );
        if (isset($post_params['return_hour'])) {
            $data['time_back'] = $post_params['return_hour'];
        }
        $this->save($bookings['id'],$data);
        if ($bookings['return_book_id']) {
            $post_params['return_journey'] = $this->changeFormat($post_params['return_journey']);
            $return_data = array(
                'start_journey' => $post_params['return_journey'],
                'hour' => $post_params['return_hour'],
                'time_go' => $post_params['return_hour'],
                'flight_no' => $post_params['flight_no']
                );
            $this->save($bookings['return_book_id'],$return_data);
        }
    }

    public function changeFormat($date) {
        $date = strtotime(str_replace('/', '-', $date));
        return date('Y-m-d',$date);
    }

    public function deleteRecord($id) {
        $this->db->from('booking')->where('id', $id);
        $bookings = current($this->db->get()->result_array());
        $this->db->set(array('is_active'=>0))->where('book_id', $id)->update('seats');
        if ($bookings['return_book_id'] > 0) {

            $this->db->from('booking')->where('id', $bookings['return_book_id']);
            $res['return_bookings'] = current($this->db->get()->result_array());
            
            $this->db->set(array('updated_by' =>'shuttle delete', 'is_active'=>0))->where('id', $bookings['return_book_id'])->update('booking');
            $this->db->set(array('is_active'=>0))->where('book_id', $bookings['return_book_id'])->update('seats');
        }
        $this->db->set(array('updated_by' =>'shuttle delete', 'is_active'=>0))->where('id', $id)->update('booking');
    }

}

?>
