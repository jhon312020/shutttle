<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 * Dashboard class
 * 
 * 
 */

class Dashboard extends Admin_Controller {
  
  /**
   * Constructor
   *
   * @return  void
   */
  public function __construct() {
    parent::__construct();
    $this->load->model('settings/mdl_settings');
  }
  
  /**
   * Displays the dasboard page
   *
   * @return  void
   */
  public function index() {
    $this->load->model('collaborators/mdl_collaborators');
    $this->load->model('routes/mdl_calendars');
    $this->load->model('routes/mdl_routes');
    $this->load->model('faq/mdl_faq');
    $this->load->model('shuttles/mdl_shuttles');
    $this->load->model('partners/mdl_partners');
    $this->load->model('contacts/mdl_contacts');
    $this->load->model('users/mdl_clients');
    $this->load->model('charts/mdl_charts');
    $total_passengers = $this->db->query("select sum(kids+adults) as total from tbl_booking where is_active=1")->row();
    $total_price = $this->db->query("select sum(price) as total from tbl_booking where is_active=1")->row();
    $today_sales = $this->db->query("select sum(price) as total from tbl_booking where is_active=1 and created like '".Date('Y-m-d')."%'")->row();
    $today_billing = $this->db->query("select sum(price) as total from tbl_booking where is_active=1 and start_journey = '".Date('Y-m-d')."'")->row();
    $today_passengers = $this->db->query("select sum(kids+adults) as total from tbl_booking where is_active=1 and start_journey = '".Date('Y-m-d')."'")->row();
    $data = array(
      'shuttles' =>$this->mdl_shuttles->get()->num_rows(),
      'partners' =>$this->mdl_partners->get()->num_rows(),
      'contacts' =>$this->mdl_contacts->get()->num_rows(),
      'collaborators' =>$this->mdl_collaborators->get()->num_rows(),
      'calendars' => $this->mdl_calendars->get()->num_rows(),
      'clients' => $this->mdl_clients->get()->num_rows(),
      'routes' => $this->mdl_routes->get()->num_rows(),
      'faq' =>$this->mdl_faq->get()->num_rows(),
      'total_passengers' =>$total_passengers->total,
      'total_price'=>$total_price->total,
      'passengers_country'=>$this->mdl_charts->get_passengerByCountry(),
      'today_booking'=>$this->mdl_shuttles->where("start_journey = '".Date('Y-m-d')."' and is_active = 1")->get()->num_rows(),
      'today_billing'=>$today_billing->total,
      'today_sales'=>$today_sales->total,
      'today_passengers'=>$today_passengers->total
    );
    $this->layout->set($data);
    $this->layout->buffer('content', 'admin/index');
    $this->layout->render();
  }
  
  /**
   * Set the Language
   *
   * @return  void
   */
  public function set_lang($lang) {
    if(trim($lang) == "english") {
      $lang = "spanish";
    } else if (trim($lang) == "spanish") {
      $lang = "english";
    }
    $newdata = array(
      'cms_lang'  => $lang,
    );
    $this->session->set_userdata($newdata);
    $this->load->library('user_agent');
    $referrer = $this->agent->referrer();
    if (!empty($referrer)) {
      redirect($referrer);
    } else{
      redirect('admin/dashboard');
    }
  }
}
?>
