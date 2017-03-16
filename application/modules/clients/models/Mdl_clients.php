<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_clients extends Response_Model {

  public $table               = 'clients';
  public $primary_key         = 'clients.id';

  /*public function default_order_by() {
      $this->db->order_by('clients.id');
  }*/
 /**
  * Function to get number of people
  * travelled
  *
  */
  public function get_total_nationalities() {
    $client_grouped_by_nationalites = 0;
    $clients = $this->mdl_clients->select('SUM(nationality) as nationality')->group_by('nationality')->get();
    if ($clients) {
      $client_grouped_by_nationalites = $clients->num_rows();
    }
    return $client_grouped_by_nationalites;
  } 
}

?>
