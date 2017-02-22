<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_booking extends Response_Model {

  public $table               = 'booking';
  public $primary_key         = 'booking.id';

  public function default_order_by() {
      $this->db->order_by('booking.id');
  }
 /**
  * Function to get number of people
  * travelled
  *
  */
  public function get_total_people_tavelled() {
    $total_people_travelled = 0;
    $booking = $this->mdl_booking->select('SUM(adults) as adults')->get()->row();
    if ($booking) {
      $total_people_travelled = $booking->adults;
    }
    return $total_people_travelled;
  } 
}

?>
