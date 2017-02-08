<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Collaborators extends Anonymous_Controller {
  var $template_vars = array();
  /**
	 * Function constructor
	 * class constructor
   * 
	 * @return	void
	 */
  public function __construct() {
    parent::__construct();
    $this->load->model('node/mdl_nodes');
    $this->load->model('routes/mdl_calendars');
    $this->load->model('routes/mdl_routes');
    $this->load->model('users/mdl_users');
    $this->load->model('shuttles/mdl_shuttles');
    $this->load->model('routes/mdl_bcnareas');
    $this->load->model('booking_extras/mdl_booking_extras');
    if (isset($_SESSION['screen_width'])) {
      log_message("debug", 'User resolution: ' . $_SESSION['screen_width']);
    } else if (isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
      $_SESSION['screen_width'] = $_REQUEST['width'];
      $_SESSION['screen_height'] = $_REQUEST['height'];
      header('Location: ' . $_SERVER['PHP_SELF']);
    } 
    $this->load->model('collaborators/mdl_collaborators');
    // Registration Popup
    $data = array();
        $data['countries'] = array(''=>'Select country', 'AF'=>'Afghanistan', 'AL'=>'Albania', 'DZ'=>'Algeria', 'AS'=>'American Samoa', 'AD'=>'Andorra', 'AO'=>'Angola', 'AI'=>'Anguilla', 'AQ'=>'Antarctica', 'AG'=>'Antigua And Barbuda', 'AR'=>'Argentina', 'AM'=>'Armenia', 'AW'=>'Aruba', 'AU'=>'Australia', 'AT'=>'Austria', 'AZ'=>'Azerbaijan', 'BS'=>'Bahamas', 'BH'=>'Bahrain', 'BD'=>'Bangladesh', 'BB'=>'Barbados', 'BY'=>'Belarus', 'BE'=>'Belgium', 'BZ'=>'Belize', 'BJ'=>'Benin', 'BM'=>'Bermuda', 'BT'=>'Bhutan', 'BO'=>'Bolivia', 'BA'=>'Bosnia And Herzegovina', 'BW'=>'Botswana', 'BV'=>'Bouvet Island', 'BR'=>'Brazil', 'IO'=>'British Indian Ocean Territory', 'BN'=>'Brunei', 'BG'=>'Bulgaria', 'BF'=>'Burkina Faso', 'BI'=>'Burundi', 'KH'=>'Cambodia', 'CM'=>'Cameroon', 'CA'=>'Canada', 'CV'=>'Cape Verde', 'KY'=>'Cayman Islands', 'CF'=>'Central African Republic', 'TD'=>'Chad', 'CL'=>'Chile', 'CN'=>'China', 'CX'=>'Christmas Island', 'CC'=>'Cocos (Keeling) Islands', 'CO'=>'Columbia', 'KM'=>'Comoros', 'CG'=>'Congo', 'CK'=>'Cook Islands', 'CR'=>'Costa Rica', 'CI'=>'Cote D\'Ivorie (Ivory Coast)', 'HR'=>'Croatia (Hrvatska)', 'CU'=>'Cuba', 'CY'=>'Cyprus', 'CZ'=>'Czech Republic', 'CD'=>'Democratic Republic Of Congo (Zaire)', 'DK'=>'Denmark', 'DJ'=>'Djibouti', 'DM'=>'Dominica', 'DO'=>'Dominican Republic', 'TP'=>'East Timor', 'EC'=>'Ecuador', 'EG'=>'Egypt', 'SV'=>'El Salvador', 'GQ'=>'Equatorial Guinea', 'ER'=>'Eritrea', 'EE'=>'Estonia', 'ET'=>'Ethiopia', 'FK'=>'Falkland Islands (Malvinas)', 'FO'=>'Faroe Islands', 'FJ'=>'Fiji', 'FI'=>'Finland', 'FR'=>'France', 'FX'=>'France, Metropolitan', 'GF'=>'French Guinea', 'PF'=>'French Polynesia', 'TF'=>'French Southern Territories', 'GA'=>'Gabon', 'GM'=>'Gambia', 'GE'=>'Georgia', 'DE'=>'Germany', 'GH'=>'Ghana', 'GI'=>'Gibraltar', 'GR'=>'Greece', 'GL'=>'Greenland', 'GD'=>'Grenada', 'GP'=>'Guadeloupe', 'GU'=>'Guam', 'GT'=>'Guatemala', 'GN'=>'Guinea', 'GW'=>'Guinea-Bissau', 'GY'=>'Guyana', 'HT'=>'Haiti', 'HM'=>'Heard And McDonald Islands', 'HN'=>'Honduras', 'HK'=>'Hong Kong', 'HU'=>'Hungary', 'IS'=>'Iceland', 'IN'=>'India', 'ID'=>'Indonesia', 'IR'=>'Iran', 'IQ'=>'Iraq', 'IE'=>'Ireland', 'IL'=>'Israel', 'IT'=>'Italy', 'JM'=>'Jamaica', 'JP'=>'Japan', 'JO'=>'Jordan', 'KZ'=>'Kazakhstan', 'KE'=>'Kenya', 'KI'=>'Kiribati', 'KW'=>'Kuwait', 'KG'=>'Kyrgyzstan', 'LA'=>'Laos', 'LV'=>'Latvia', 'LB'=>'Lebanon', 'LS'=>'Lesotho', 'LR'=>'Liberia', 'LY'=>'Libya', 'LI'=>'Liechtenstein', 'LT'=>'Lithuania', 'LU'=>'Luxembourg', 'MO'=>'Macau', 'MK'=>'Macedonia', 'MG'=>'Madagascar', 'MW'=>'Malawi', 'MY'=>'Malaysia', 'MV'=>'Maldives', 'ML'=>'Mali', 'MT'=>'Malta', 'MH'=>'Marshall Islands', 'MQ'=>'Martinique', 'MR'=>'Mauritania', 'MU'=>'Mauritius', 'YT'=>'Mayotte', 'MX'=>'Mexico', 'FM'=>'Micronesia', 'MD'=>'Moldova', 'MC'=>'Monaco', 'MN'=>'Mongolia', 'MS'=>'Montserrat', 'MA'=>'Morocco', 'MZ'=>'Mozambique', 'MM'=>'Myanmar (Burma)', 'NA'=>'Namibia', 'NR'=>'Nauru', 'NP'=>'Nepal', 'NL'=>'Netherlands', 'AN'=>'Netherlands Antilles', 'NC'=>'New Caledonia', 'NZ'=>'New Zealand', 'NI'=>'Nicaragua', 'NE'=>'Niger', 'NG'=>'Nigeria', 'NU'=>'Niue', 'NF'=>'Norfolk Island', 'KP'=>'North Korea', 'MP'=>'Northern Mariana Islands', 'NO'=>'Norway', 'OM'=>'Oman', 'PK'=>'Pakistan', 'PW'=>'Palau', 'PA'=>'Panama', 'PG'=>'Papua New Guinea', 'PY'=>'Paraguay', 'PE'=>'Peru', 'PH'=>'Philippines', 'PN'=>'Pitcairn', 'PL'=>'Poland', 'PT'=>'Portugal', 'PR'=>'Puerto Rico', 'QA'=>'Qatar', 'RE'=>'Reunion', 'RO'=>'Romania', 'RU'=>'Russia', 'RW'=>'Rwanda', 'SH'=>'Saint Helena', 'KN'=>'Saint Kitts And Nevis', 'LC'=>'Saint Lucia', 'PM'=>'Saint Pierre And Miquelon', 'VC'=>'Saint Vincent And The Grenadines', 'SM'=>'San Marino', 'ST'=>'Sao Tome And Principe', 'SA'=>'Saudi Arabia', 'SN'=>'Senegal', 'SC'=>'Seychelles', 'SL'=>'Sierra Leone', 'SG'=>'Singapore', 'SK'=>'Slovak Republic', 'SI'=>'Slovenia', 'SB'=>'Solomon Islands', 'SO'=>'Somalia', 'ZA'=>'South Africa', 'GS'=>'South Georgia And South Sandwich Islands', 'KR'=>'South Korea', 'ES'=>'Spain', 'LK'=>'Sri Lanka', 'SD'=>'Sudan', 'SR'=>'Suriname', 'SJ'=>'Svalbard And Jan Mayen', 'SZ'=>'Swaziland', 'SE'=>'Sweden', 'CH'=>'Switzerland', 'SY'=>'Syria', 'TW'=>'Taiwan', 'TJ'=>'Tajikistan', 'TZ'=>'Tanzania', 'TH'=>'Thailand', 'TG'=>'Togo', 'TK'=>'Tokelau', 'TO'=>'Tonga', 'TT'=>'Trinidad And Tobago', 'TN'=>'Tunisia', 'TR'=>'Turkey', 'TM'=>'Turkmenistan', 'TC'=>'Turks And Caicos Islands', 'TV'=>'Tuvalu', 'UG'=>'Uganda', 'UA'=>'Ukraine', 'AE'=>'United Arab Emirates', 'UK'=>'United Kingdom', 'US'=>'United States', 'UM'=>'United States Minor Outlying Islands', 'UY'=>'Uruguay', 'UZ'=>'Uzbekistan', 'VU'=>'Vanuatu', 'VA'=>'Vatican City (Holy See)', 'VE'=>'Venezuela', 'VN'=>'Vietnam', 'VG'=>'Virgin Islands (British)', 'VI'=>'Virgin Islands (US)', 'WF'=>'Wallis And Futuna Islands', 'EH'=>'Western Sahara', 'WS'=>'Western Samoa', 'YE'=>'Yemen', 'YU'=>'Yugoslavia', 'ZM'=>'Zambia', 'ZW'=>'Zimbabwe');
    
    $data['start_from'] = array(''=>lang('from'), 'city'=>'Barcelona City', 'airport'=>'Barcelona Airport');
    $data['airport'] = array(''=>'Select', 't1'=>'Terminal 1', 't2'=>'Terminal 2');
    $prepend = array('00', '01','02','03','04','05','06','07','08','09');
    $data['hours'] = array_merge($prepend, range(10, 23));
    $data['adults'] = array_merge($prepend, range(10, 12));
    $data['adults'][0] = lang('adults');
    $data['kids'] = array_slice($prepend, 0, 7);
    $data['kids'][0] = lang('child');
    $data['babies'] = array('00', '01','02','03','04','05');
    $data['minutes'] = array('00'=>'00','05'=>'05') + array_combine(range(10, 55, 5), range(10, 55, 5));
    $this->load->vars($data);
    $settings_data = $this->db->select('*')->from('settings')->get()->result();
    $this->set = array();
    foreach ($settings_data as $data) {
      $this->set[$data->setting_key] = $data->setting_value;
    }
    $this->load->vars($this->set);
    $this->details = array();
    $this->details['collaborator_details'] = array();
    $this->details['collaborator_address'] = array();
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
      $qry = $this->db->select('collaborators.address,collaborators.id,collaborators.name,collaborators.zone, collaborators.no_of_available_seats,collaborators.available_seats,collaborators.payment_methods,collaborators.price')->from('users')->where(array('users.id'=>$this->session->userdata('user_id')))
              ->join('collaborators', 'collaborators.id=users.collaborator_id', 'left');
      $this->details['collaborator_details'] = current($qry->get()->result_array());
      $this->details['collaborator_address'] = $this->db->query("select CONCAT(col.name,' - ',coladd.address) as label,CONCAT(col.name,' - ',coladd.address) as value,coladd.zone,col.id, coladd.id as collaborator_address_id from tbl_collaborators_address coladd left join tbl_collaborators col on coladd.collaborator_id = col.id where col.id = ".$this->details['collaborator_details']['id']." and coladd.is_active=1")->result_array();     
    }
    $this->load->vars($this->details);
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 5) {
      $qry = $this->db->select('cars.id,cars.car_name')->from('users')->where(array('users.id'=>$this->session->userdata('user_id')))
              ->join('cars', 'cars.id=users.car_id', 'left');
      $this->details['car_details'] = current($qry->get()->result_array());
      $this->load->vars($this->details);
    }
    $lang = $this->uri->segment(1);
    if ($lang == '' || $lang == 'es' || $lang == 'en' ) {
      $this->template_vars['lang'] = $lang;
    } else {
      $this->template_vars['lang'] = 'es';
    }
  }
  
  /**
	 * Function login
	 * Displays the collaborators login
   * page and validates and authenticates
   * for collaborators access
   * 
	 * @return	void
	 */
  public function login() {
    $error='';
    if ($this->session->userdata('user_name'))
      redirect($this->uri->segment(1));
    if ($this->mdl_users->run_validation('validation_rules_collaborators_login')) {
      $data = $this->mdl_users->check_collaborators($this->input->post());
      if ($data) {
        redirect($this->uri->segment(1));
      } else {
        //$this->session->set_flashdata('alert_error', lang('invalid_credentials'));
        redirect($this->uri->uri_string());
      }
    }
    $this->load->view('login', $this->template_vars);
  }
  
  /**
	 * Function booking_details
	 * Displays the collaborators booking details
   * 
	 * @return	void
	 */
  public function bookings() {
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
      $this->mdl_shuttles->select('booking.bcnarea_address_id,booking.address as      book_address,collaborators.address as col_address,collaborators_address.address as mainaddress,collaborators_address.zone as col_zone,booking.book_status,booking.id,booking.collaborator_id,booking.kids,booking.adults,booking.baby,booking.start_from,booking.end_at,booking.zone,booking.hour,booking.arrival_time,booking.price,booking.start_journey, booking.return_book_id,booking.return_journey,booking.country,booking.flight_no,booking.created,collaborators.name,booking.client_id,booking.client_array, clients.name as first_name, clients.surname,calendars.reference_id')
        ->join('collaborators', 'collaborators.id=booking.collaborator_id', 'left')
        ->join('collaborators_address', 'collaborators_address.id = booking.collaborator_address_id', 'left')
        ->join('clients', 'clients.id=booking.client_id', 'left')
        ->join('calendars', 'calendars.id=booking.calendar_id', 'left')
        ->where('booking.is_active = 1  and tbl_booking.book_role=2 and tbl_booking.collaborator_id = '.$this->details['collaborator_details']['id']);
      if ($this->input->post('from_date')) {
        $fromUnixTime = strtotime(str_replace('/', '-', $this->input->post('from_date')));
        $fromDate = date('d-m-Y', $fromUnixTime);
        $this->template_vars['shuttles'] = $this->mdl_shuttles->where('DATE(tbl_booking.start_journey)', date('Y-m-d', $fromUnixTime))->order_by('booking.hour', 'asc')->get()->result();
        
      } else {
        $this->template_vars['shuttles'] = $this->mdl_shuttles->where('booking.round_trip', '0')
                        ->order_by('booking.created', 'desc')->get()->result();
      }
      
      $this->load->view('bookings', $this->template_vars);
    } else {
      redirect($this->uri->segment(1));
    }
  }
  
  /**
	 * Function changepassword
	 * Displays the changepassword form
   * and changes the password on form post
   * after validating the inputs
   * 
	 * @return	void
	 */
  public function changepassword() {
    $type = $this->uri->segment(3);
    if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
      if($this->mdl_users->run_validation('validation_rules_change_password')){
          $this->mdl_users->save_changepassword($this->input->post('newpassword'));
          $this->session->set_flashdata('alert_success', lang('change_password_success_message'));
          redirect($this->template_vars['lang'].'/collaborators/changepassword');
      }
    } else {
      redirect($this->template_vars['lang'].'/collaborators/changepassword');
    }
    $this->load->view('change_password', $this->template_vars);
  }
  
  /**
	 * Function Logout
	 * Destroys the session
   * and redirects to login page
   * 
	 * @return	void
	 */
  public function logout() {
    $this->session->sess_destroy();
    redirect($this->template_vars['lang']."/collaborators/login");
  }
  
  /**
	 * Function view_booking_details
	 * Displays booking detail page
   * 
	 * @return	void
	 */
  public function booking_details() {
    $id = $this->uri->segment(3);
    $this->db->from('booking')->where('id', $id);
    $res['bookings'] = current($this->db->get()->result_array());
    if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2 && $res['bookings']['collaborator_id'] == $this->details['collaborator_details']['id']) {
      if ($res['bookings']['return_book_id']) {
        $this->db->from('booking')->where('id', $res['bookings']['return_book_id']);
        $res['return_bookings'] = current($this->db->get()->result_array());
      }
      $res['error'] = array();
      $arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
      
      if (in_array($res['bookings']['start_from'], $arr)) {
        $zone = $res['bookings']['end_at'];
        $str = 'end_at';
      } else {
        $zone = $res['bookings']['start_from'];
        $str = 'start_from';
      }
      /*Address details*/
      $res['bookings']['collaborator_address'] = $this->db->from('collaborators_address')->where('id', $res['bookings']['collaborator_address_id'])->get()->result_array();
      
      $this->db->from('collaborators')->where('id',$res['bookings']['collaborator_id']);
      $terminal = current($this->db->get()->result_array());
      $res['bookings'][$str] = $terminal['name'].' - '.(count($res['bookings']['collaborator_address']) > 0 ?$res['bookings']['collaborator_address'][0]['address'] : $terminal['address']);
      if($res['bookings']['bcnarea_address_id'] != '' && $res['bookings']['bcnarea_address_id'] != '0') {
        $res['bookings'][$str] = $res['bookings']['address'];
      }
      
      $res['bookings']['collaborator_name'] = $terminal['name'];
      $this->db->from('calendars')->where('id', $res['bookings']['calendar_id']);
      $res['start_journey'] = current($this->db->get()->result_array());
      $client_qry = $this->db->from('clients')->select('name,surname,email,phone,address,cp,country, city,nationality,dni_passport,doc_no')->where('id',$res['bookings']['client_id'])->get();
      
      $res['book_reference'] = $res['start_journey']['reference_id'].' - '.sprintf("%02d", $res['bookings']['id']);
      if ($client_qry->num_rows())
        $this->template_vars['clients'] = current($client_qry->result_array());
      else
        $this->template_vars['clients'] = json_decode($res['bookings']['client_array'], true);
      
      $res['edit'] = false;
      $this->template_vars['bookings'] = $res['bookings'];
      $this->template_vars['error'] = $res['error'];
      $this->template_vars['book_reference'] = $res['book_reference'];
      $this->template_vars['extra_array'] = array();
      $this->load->view('booking_details', $this->template_vars);
    } else {
      redirect($this->uri->segment(1));
    }
  }
}
?>
