<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Node extends Anonymous_Controller {
  var $template_vars = array();
  /**
	 * Function constructor
	 * class constructor
   * 
	 * @return	void
	 */
  
  public function __construct() {
    parent::__construct();
    //echo base64_decode("ZWRpdG9yX3BpY2tuZ28");die;
    $this->load->model('place_categories/mdl_place_categories');
    $this->load->model('locations/mdl_locations');
    $this->load->model('cities/mdl_cities');
    $this->load->model('node/mdl_nodes');
    $this->load->model('routes/mdl_calendars');
    $this->load->model('routes/mdl_routes');
    $this->load->model('users/mdl_users');
    $this->load->model('shuttles/mdl_shuttles');
    $this->load->model('routes/mdl_bcnareas');
    $this->load->model('users/mdl_users');
    $this->load->model('booking/mdl_booking');
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
    $data['adults'] = array_merge($prepend, range(10, 13));
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

    $range_months = 
      array_map(function($n) { 
        if($n < 10) return '0'.$n;
        else return $n; }, 
      range(1, 12) );
    $months = array("" => "Select Month") + array_combine($range_months, $range_months);
    //print_r($months);die;
    //echo json_encode($months);die;
    $this->template_vars['months'] = $months;
    $this->template_vars['header_text_images'] = $this->header_text_images;

    $rang_years = range(date('Y'), date('Y') + 30);
    $years = array("" => "Select Year") + array_combine($rang_years, $rang_years);
    $this->template_vars['years'] = $years;
    //print_r($years);die;

    $lang = $this->uri->segment(1);
    if ($lang == '' || $lang == 'es' || $lang == 'en' ) {
      $this->template_vars['lang'] = $lang;
    } else {
      $this->template_vars['lang'] = 'es';
    }
  }

  public function index($lang = 'es') {
    $this->display_home($lang);
  }

  /**
	 * Function display_home
	 * Displays the home page
   * 
	 * @return	void
	 */
  public function display_home($lang) {
    $res = array();
    $ln = $this->uri->segment(1);
    if ($ln == '')
      redirect("en");
    $this->load->model('booking/mdl_booking');
    $this->load->model('calendars/mdl_calendars');
    $this->load->model('clients/mdl_clients');
    $this->template_vars['total_people'] = $this->mdl_booking->get_total_people_tavelled();
    $this->template_vars['total_nationalites'] = $this->mdl_clients->get_total_nationalities();
    $this->template_vars['total_trips'] = $this->mdl_calendars->get_total_trips();
    $this->template_vars['sliders'] = $this->mdl_nodes->fetchAllSliders();
    $this->template_vars['banner'] = $this->mdl_nodes->fetchBannerLast();
    $this->template_vars['boxes'] = $this->mdl_nodes->fetchAllBoxes();
    $this->load->view('layout/templates/home', $this->template_vars);
  }
  
  /**
	 * Function faq
	 * Displays the faq page
   * 
	 * @return	void
	 */
  public function faq() {
    $this->template_vars['bottom_data'] = $this->db->select('*')->from('faqs')->order_by('category')->get()->result();
    $this->load->model('captions/mdl_captions');
    $this->template_vars['content'] = $this->mdl_captions->getRow('faq', $this->uri->segment(1));
    $this->template_vars['page'] = 'faq';
    $this->template_vars['content']['image'] = 'faq.jpg';
    $this->load->view('layout/templates/faq', $this->template_vars);
  }
  
  /**
	 * Function aboutus
	 * Displays the aboutus page
   * 
	 * @return	void
	 */
  public function aboutus() {
    $this->load->model('captions/mdl_captions');
    $this->template_vars['content'] = $this->mdl_captions->getRow('aboutus', $this->uri->segment(1));
    //print_r($this->template_vars);
    $this->load->view('layout/templates/aboutus', $this->template_vars);
  }
  
  public function update_journey() {
    $id = $this->uri->segment(3);
    $this->db->set(array('journey_completed'=>1))->where('id', $id)->update('booking');
    redirect($this->agent->referrer());
  }
  public function calendar_details() {
    $id = $this->uri->segment(3);
    $routes = $this->mdl_routes->where('car',$this->details['car_details']['id'])->get()->result_array();
        $rid = array();
        foreach($routes as $route) {
          array_push($rid, $route['id']);
        }
  
    $cal_data = $this->db->select('booking.id,calendars.route_id,calendars.seats')->from('booking')->where('booking.id', $id)
              ->join('calendars', 'calendars.id=booking.calendar_id', 'left')->get()->row();

    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 5 && in_array($cal_data->route_id, $rid)) {
      $book_id = $this->uri->segment(3);
          $check_round = $this->db->from('booking')->where('return_book_id', $book_id)->get();
      if($check_round->num_rows == 0) {
            $this->db->from('booking')->where('id', $book_id);
        $res['bookings'] = current($this->db->get()->result_array());
      } else {
        $book_data = $check_round->row();
        $this->db->from('booking')->where('id', $book_data->id);
        $res['bookings'] = current($this->db->get()->result_array());
      }
      if ($res['bookings']['return_book_id']) {
        $this->db->from('booking')->where('id', $res['bookings']['return_book_id']);
        $res['return_bookings'] = current($this->db->get()->result_array());
      }
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
      if ($client_qry->num_rows())
        $res['clients'] = current($client_qry->result_array());
      else
        $res['clients'] = json_decode($res['bookings']['client_array'], true);
      
      $res['book_reference'] = $res['start_journey']['reference_id'].' - '.sprintf("%02d", $res['bookings']['id']);
        $this->load->view('layout/templates/calendar_details', $res);
        } else {
      redirect($this->uri->segment(1).'/carchannel');
    }
  }
  public function route_details() {
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 5) {
            $routes = $this->mdl_routes->where('car',$this->details['car_details']['id'])->get()->result_array();

            $bcn = $this->mdl_bcnareas->get()->result_array();
            $bcn_array = array();
            foreach($bcn as $b) {
              $bcn_array[$b['zone']] = $b['name'];
            }
            $rid = array();           
            foreach($routes as $route) {
              array_push($rid, $route['id']);
            }
            if(count($rid) == 0) {
          $rid = array(0);
        }
          $booking_array = $this->mdl_shuttles->select('booking.bcnarea_address_id,booking.address as book_address,collaborators.address,collaborators_address.address as mainaddress,collaborators_address.zone as col_zone,booking.round_trip,booking.price,booking.book_status,booking.payment_method,booking.journey_completed,booking.id,booking.extra_array,booking.collaborator_id,booking.kids,booking.adults,booking.baby,booking.start_from,
                                            booking.end_at,booking.zone,booking.hour,booking.arrival_time,booking.price,booking.start_journey,
                                            booking.return_book_id,booking.return_journey,booking.country,booking.flight_no,booking.created,collaborators.name,booking.client_id,booking.client_array,
                                            clients.name as first_name, clients.surname,calendars.reference_id')
                                            ->join('collaborators', 'collaborators.id=booking.collaborator_id', 'left')
                                            ->join('clients', 'clients.id=booking.client_id', 'left')
                                            ->join('collaborators_address', 'collaborators_address.id = booking.collaborator_address_id', 'left')
                                            ->join('calendars', 'calendars.id=booking.calendar_id', 'left')
                                            ->where("booking.is_active = 1 and tbl_calendars.route_id in (".implode(',', $rid).") and tbl_booking.start_journey = '".Date('Y-m-d')."'")
                                            ->order_by('booking.hour', 'asc')
                                            ->get()->result_array();
                    //echo $this->db->last_query();die;
        $return_id = $this->db->query("select tbl_booking.id, mm.id as return_book_id 
                      from tbl_booking 
                      inner join (select tbl_booking.id from tbl_booking 
                            left join tbl_calendars on tbl_calendars.id = tbl_booking.calendar_id
                            where tbl_booking.is_active = 1 and tbl_calendars.route_id in (".implode(',', $rid).") and tbl_booking.start_journey = '".Date('Y-m-d')."' and tbl_booking.round_trip = 1) mm
                      on mm.id = tbl_booking.return_book_id")->result_array();
        //echo "<pre>";
        //print_r($return_id);die;
        $res = array();
        array_walk($return_id, function($item) use (&$res) {
            // flatten the array
            $res[$item['return_book_id']] = $item['id'];
        });
        
            $data_array = array('routes' => $routes, 'bcn' => $bcn, 'bcn_array' => $bcn_array, 'booking_array'=> $booking_array, 'res'=>$res);
        $this->load->view('layout/templates/route_details', $data_array);

    } else {
      redirect($this->uri->segment(1).'/carchannel');
    }
  }
  
  /**
	 * Function change password
	 * Displays the password recovery page
   * 
	 * @return	void
	 */
  public function change_password($route) {
    $type = $this->uri->segment(3);
    if ($type != 'clients' && $type != 'collaborators' && $type != 'drivers')
      redirect($this->uri->segment(1));
    
    $record_num = end($this->uri->segment_array());
    $error = '';
    $decodedString = base64_decode($record_num);
    if (strpos($decodedString, '_') !== false) {
      $currentTime = date('Y-m-d H:i:s');
      list($userEmail, $requestedTime) = explode('_', $decodedString);
      if (strtotime($currentTime) > strtotime($requestedTime)) {
        redirect($this->uri->segment(1));
      }
      else{
        $_POST['type'] = $type;
        $verifiedUser = current($this->mdl_users->findByEmail($userEmail, $type));
        if (!$verifiedUser)
          redirect($this->uri->segment(1));
        if ($this->input->post('password')) {
          if ($this->mdl_users->run_validation('validation_rules_change_password')) {
            $this->mdl_users->save_change_password($verifiedUser['id'], $this->input->post('password'));
            $this->mdl_users->check_collaborators(array('username'=>$userEmail, 'password'=>$this->input->post('password')));
            $this->load->library('email');
            $subject = 'Password Reset Confirmation';
            $message  = 'Hello ' . $verifiedUser['first_name'] .' <br/><br/>';
            $message .= ' This is to confirm that login password for your account has been successfully changed. <br/><br/>';
            $message .= 'For security reasons, we do not send any account information to your email address. For any support related issues, please email us and one of our customer care executive will get back to you as early as possible. <br/><br/> ';
            $this->email->set_mailtype("html");
            $this->email->from($this->set['site_email'], 'Change password');
            $this->email->to($userEmail); 
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            redirect($this->uri->segment(1));
            //$this->session->set_flashdata('alert_success', lang('change_password_success_message'));
            //redirect($this->uri->uri_string());
          }
        }
      }
    }
    else{
      redirect($this->uri->segment(1));
    }
    $this->load->view('layout/templates/change_password', $this->template_vars);
  }
  
  /**
	 * Function Password recovery
	 * Displays the password recovery page
   * 
	 * @return	void
	 */
  public function recovery_password() {
    $error='';
    $type = $this->uri->segment(3);
    if ($type != 'clients' && $type != 'collaborators' && $type != 'drivers')
      redirect($this->uri->segment(1));
      if ($this->mdl_users->run_validation('validation_rules_password_recovery')) {
        $this->load->library('email');
        $_POST['type'] = $type;
        $data = $this->mdl_users->password_recovery($this->input->post());
        if ($data) {
          $subject  = 'Change Password';
          $message  = 'Hi <b>' . ucfirst($data['first_name']) . '</b>,<br/><br/>';
          $message .= 'To change your current password <a href = "' . $data['url'] . '">click here</a>.<br/><br/>';
          $message .= 'If your not able click on it, kindly copy the below link<br/>' . $data['url'] . '<br/> and paste it on the new tab.<br/><br/>';
          $message .= 'For your information the above links will be valid for only 1 hour.';
          $this->email->set_mailtype("html");
          $this->email->from($this->set['site_email'], 'Recovery password');
          $this->email->to($data['email']); 
          $this->email->subject($subject);
          $this->email->message($message);
          $this->email->send();
          $this->session->set_flashdata('alert_success', lang('recover_email_success_message'));
          redirect($this->uri->uri_string());
        } else {
          $this->session->set_flashdata('alert_error', lang('invalid_username'));
          redirect($this->uri->uri_string());
        }
      }
    $this->load->view('layout/templates/recovery_password', $this->template_vars);
  }
  
  /**
	 * Function contacts
	 * Displays the payment success page
   * 
	 * @return	void
	 */
  public function contacts($lang = 'es') {
    $this->load->model('node/mdl_contact');
    if ($this->mdl_contact->run_validation()) {
      log_message("debug", "%%%%%%%% FROM NODE CONTACT");
      $node= array(
        'name'    =>$this->input->post('name'),
        'email'   =>$this->input->post('email'),
        'description'   =>$this->input->post('description'),
      );
      $this->mdl_contact->save(NULL, $node);
      $this->load->library('email');
      $this->email->from($this->input->post('email'), $this->input->post('name'));
      $this->email->to($this->set['site_email']); 
      $this->email->subject('Enquiry');
      $this->email->message($this->input->post('description'));
      $this->email->send();
    } else 
    log_message("debug", "%%%%%%%% FROM NODE CONTACT ELSE");
    $this->load->model('captions/mdl_captions');
    $this->template_vars['content'] = $this->mdl_captions->getRow('contacts', $this->uri->segment(1));
    $this->load->view('layout/templates/contacts', $this->template_vars);
  }
  /**
	 * Function terms
	 * Displays the terms and conditions page
   * 
	 * @return	void
	 */
  public function terms() {
    //$this->template_vars['content'] = $this->db->select('*')->from('captions')->where(array('type' => 'terms_and_conditions'))->get()->row();
    $this->load->model('captions/mdl_captions');
    $this->template_vars['content'] = $this->mdl_captions->getRow('terms_and_conditions', $this->uri->segment(1));
    $this->load->view('layout/templates/terms', $this->template_vars);
  }
  
  /**
	 * Function email
	 * Displays the email page
   * 
	 * @return	void
	 */
  public function email() {
    $this->load->view('layout/templates/email', $this->template_vars);
  }
  
  /**
	 * Function pdf
	 * Displays the pdf page
   * 
	 * @return	void
	 */
  public function pdf() {
    $this->load->helper('dompdf');
    $data =array();
    $this->load->view('layout/templates/pdf', $this->template_vars);
  }
  
  /**
	 * Function success
	 * Displays the payment success page
   * 
	 * @return	void
	 */ 
  public function success() {
    $transaction_details = array();
    // Checking the paypal token and PayerID on calling the setExpressCheckout
    if ($this->input->get('token') && $this->input->get('PayerID')) {
      $this->load->library('paypal/paypalRequire');
      $this->load->library('paypal/paypal');
      $paypal= new paypal();
      // On receiving the paypal token and payer calling DoExpressCheckout
      $payerId = $this->input->get('PayerID');
      $do_express_api_response = $paypal->DoExpressCheckoutPayment();
      $transaction_details = $paypal->GetTransactionDetails();
      $book_id = $transaction_details['CUSTOM'];
      if ($book_id != '' && is_numeric($book_id)) {
        $book_data = $this->db->from('booking')->where('id', $book_id)->get()->row();
        if ($book_data->book_status != 'pending') {
          //redirect($this->uri->segment(1));
        }
      } else {
          redirect($this->uri->segment(1));
      }
      if ($do_express_api_response['transaction']) {
        $this->db->set(array('is_active'=>1, 'paypal_token_id'=>$transaction_details['TOKEN'], 'paypal_payer_id'=>$payerId, 'paypal_transaction_response'=>json_encode($do_express_api_response['response'])))->where('id', $book_id)->update('booking');
      } else {
          $this->db->set(array('updated_by' =>'success', 'is_active'=>0, 'book_status'=>'Transaction failed', 'paypal_token_id'=>$transaction_details['TOKEN'], 'paypal_payer_id'=>$payerId, 'paypal_transaction_response'=>json_encode($transaction_details)))->where('id', $book_id)->update('booking');
          $this->load->library('email');
          //$this->email->set_mailtype("html");
          $this->email->from($this->set['site_email'], $this->set['site_title']);
          $this->email->to('bright@proisc.com');
          $this->email->subject('Booking Confirmation: '.$book_id.' has been Transaction failed');
          $this->email->message('Transaction failed');
          $this->email->send();
          $this->session->set_flashdata('alert_error', lang('transaction_failed'));
          redirect($this->uri->segment(1));
      }
    } else if ($this->input->get('cm')) {
        $book_id = $this->input->get('cm');
    } else {
        $this->session->set_flashdata('alert_error', lang('transaction_failed'));
        redirect($this->uri->segment(1));
    }
    if ($book_id != '' && is_numeric($book_id)) {
      $book_data = $this->db->from('booking')->where('id', $book_id)->get()->row();
      if ($book_data->book_status != 'pending') {
        //redirect($this->uri->segment(1));
      }
      if((float)$book_data->passenger_price == 0) {
        $this->session->set_flashdata('alert_error', 'Something went wrong');
        redirect($this->uri->segment(1).'/reservation');
      }
      if((float)$book_data->price == 0 && $book_data->promotional_code_id == null) {
        $this->session->set_flashdata('alert_error', 'Something went wrong');
        redirect($this->uri->segment(1).'/reservation');
      }
      /*Test bank payment start*/
      /*if($book_data->payment_method == 'bank') {
        $this->session->set_flashdata('alert_error', 'This is the test payment for bank');
        redirect($this->uri->segment(1));
      }*/
      /*Test bank payment end*/
    } else {
        redirect($this->uri->segment(1));
    }
    /*update payment status*/       
    //$this->db->set(array('is_active'=>1))->where('book_id', $book_id)->update('seats');
    $this->db->from('booking')->where('id', $book_id);
    $bookings = current($this->db->get()->result_array());

    if ($bookings['payment_method'] == 'paid')
      $this->db->set(array('updated_by' =>'success', 'book_status'=>'paid'))->where('id', $book_id)->update('booking');
    else if($bookings['payment_method'] == 'cash')
      $this->db->set(array('updated_by' =>'success', 'book_status'=>'cash'))->where('id', $book_id)->update('booking');
    else
      $this->db->set(array('is_active'=>1, 'updated_by' =>'success', 'book_status'=>'completed'))->where('id', $book_id)->update('booking');

    $this->db->from('booking')->where('id', $book_id);
    $this->template_vars['bookings'] = current($this->db->get()->result_array());

    if ($this->template_vars['bookings']['return_book_id']) {
      $this->db->from('booking')->where('id', $this->template_vars['bookings']['return_book_id']);
      $this->template_vars['return_bookings'] = current($this->db->get()->result_array());
        if ($this->template_vars['return_bookings']['payment_method'] == 'paid')
          $this->db->set(array('updated_by' =>'success', 'book_status'=>'paid'))->where('id', $this->template_vars['bookings']['return_book_id'])->update('booking');
        else if($this->template_vars['return_bookings']['payment_method'] == 'cash')
          $this->db->set(array('updated_by' =>'success', 'book_status'=>'cash'))->where('id', $this->template_vars['bookings']['return_book_id'])->update('booking');
        else
          $this->db->set(array('updated_by' =>'success', 'book_status'=>'completed'))->where('id', $this->template_vars['bookings']['return_book_id'])->update('booking');
    }
    if ($bookings['version'] != 1) {
      $arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');

      if (in_array($this->template_vars['bookings']['start_from'], $arr)) {
        $zone = $this->template_vars['bookings']['end_at'];
        $str = 'end_at';
      } else {
          $zone = $this->template_vars['bookings']['start_from'];
          $str = 'start_from';
      }
    }
    /*Address details*/
    $this->template_vars['bookings']['collaborator_address'] = $this->db->from('collaborators_address')->where('id ', $this->template_vars['bookings']['collaborator_address_id'])->get()->result_array();      

    $this->db->from('collaborators')->where('id',$this->template_vars['bookings']['collaborator_id']);
    $terminal = current($this->db->get()->result_array());

    if ($bookings['version'] != 1) {
     $this->template_vars['bookings'][$str] = $terminal['name'].' - '.(count($this->template_vars['bookings']['collaborator_address']) > 0 ?$this->template_vars['bookings']['collaborator_address'][0]['address'] : $terminal['address']);

      if($this->template_vars['bookings']['bcnarea_address_id'] != '' && $this->template_vars['bookings']['bcnarea_address_id'] != '0') {
        $this->template_vars['bookings'][$str] = $this->template_vars['bookings']['address'];

        $postal_query = $this->db->select('postal_code')->from('bcnareas_address')->where('id', $this->template_vars['bookings']['bcnarea_address_id'])->get()->row();

        if($postal_query->postal_code) {
          $this->template_vars['bookings']['postal_code'] = $postal_query->postal_code;  
          $this->template_vars['bookings']['source_point'] = $str;
        }
      } 
    }

    $this->template_vars['bookings']['collaborator_name'] = $terminal['name'];
    $this->db->from('calendars')->where('id', $this->template_vars['bookings']['calendar_id']);
    $this->template_vars['start_journey'] = current($this->db->get()->result_array());
    $client_qry = $this->db->from('clients')->select('name,surname,email,phone,address,cp,country, city,nationality,dni_passport,doc_no')->where('id',$this->template_vars['bookings']['client_id'])->get();
    if ($client_qry->num_rows())
        $this->template_vars['clients'] = current($client_qry->result_array());
    else
        $this->template_vars['clients'] = json_decode($this->template_vars['bookings']['client_array'], true);

    $this->template_vars['price'] = $this->input->get('amt');
    $this->template_vars['book_reference'] = 'SHT-'.date('dmY',strtotime($bookings['start_journey'])).'-'.sprintf("%02d", $this->template_vars['bookings']['id']);
    $this->template_vars['content']['image'] = 'payment.jpg';

    /* $this->load->helper('dompdf');  
    $html = $this->load->view('layout/templates/pdf', $this->template_vars, true);
    $mail_html = $this->load->view('layout/templates/email', $this->template_vars, true);
    pdf_create($html, $this->template_vars['book_reference'], true); */

    $this->load->view('layout/templates/success', $this->template_vars);
    
    if (($_SERVER['SERVER_NAME'] != 'localhost' && $_SERVER['SERVER_NAME'] != '192.168.1.12')) {
      $this->load->helper('dompdf');  
      $html = $this->load->view('layout/templates/pdf', $this->template_vars, true);
      $mail_html = $this->load->view('layout/templates/email', $this->template_vars, true);
      //$output = pdf_create($html, 'booking reference', false);
      $output = pdf_create($html, $this->template_vars['book_reference'], false);
      $this->load->library('email');
      $this->email->set_mailtype("html");
      $this->email->from($this->set['site_email'], $this->set['site_title']);
      $this->email->to($this->template_vars['clients']['email']); 
      $cc_array = array('janakiraman@proisc.com', 'checking@shuttleing.com');
      $this->email->cc($cc_array);
      if($this->template_vars['bookings']['book_status'] == 'completed')
        $this->email->bcc(array('janakiraman@proisc.com', 'bright@proisc.com'));

      $this->email->subject('Booking Confirmation: '.$this->template_vars['book_reference']);
      $this->email->message($mail_html);
      $this->email->attach($output);
      $this->email->send();
      
    }
  }
  
  /**
	 * Function error
	 * Displays the payment failure/errors
   * 
	 * @return	void
	 */  
  public function error() {
   /* $this->load->library('paypal/paypalRequire');
    $this->load->library('paypal/paypal');
    $paypal= new paypal();
    $transaction_details = $paypal->GetTransactionDetails();*/
    $book_id = '';
    if (isset($_GET['cm'])) {
      $book_id = $_GET['cm'];
    }
    if($book_id != '' && is_numeric($book_id)) {
      $book_data = $this->db->from('booking')->where('id', $book_id)->get()->row();
      if($book_data->book_status != 'pending') {
        redirect($this->uri->segment(1));
      }
    } else {
      redirect($this->uri->segment(1));
    }
    //$this->db->set(array('updated_by' =>'error', 'is_active'=>0, 'book_status'=>'rejected', 'paypal_token_id'=>$transaction_details['TOKEN'], 'paypal_transaction_response'=>json_encode($transaction_details)))->where('id',$book_id)->update('booking');
    $this->db->set(array('updated_by' =>'error', 'is_active'=>0, 'book_status'=>'rejected', 'paypal_token_id'=>'', 'paypal_transaction_response'=>'User Cancelled'))->where('id',$book_id)->update('booking');
    $this->db->set(array('is_active'=>0))->where('book_id',$book_id)->update('seats');
    /*return journey start*/
    $this->db->from('booking')->where('id', $book_id);
    $res['bookings'] = current($this->db->get()->result_array());
        
    if ($res['bookings']['return_book_id']) {
      $this->db->from('booking')->where('id', $res['bookings']['return_book_id']);
      $res['return_bookings'] = current($this->db->get()->result_array());
      
      $this->db->set(array('updated_by' =>'error', 'is_active'=>0, 'book_status'=>'rejected', 'paypal_token_id'=>'', 'paypal_transaction_response'=>'User Cancelled'))->where('id', $res['bookings']['return_book_id'])->update('booking');
      $this->db->set(array('is_active'=>0))->where('book_id', $res['bookings']['return_book_id'])->update('seats');
  }
    $this->load->library('email');
    //$this->email->set_mailtype("html");
    $this->email->from($this->set['site_email'], $this->set['site_title']);
    $this->email->to('bright@proisc.com'); 
    $this->email->subject('Booking Confirmation: '.$book_id.' has been rejected');
    $this->email->message('rejected');
    $this->email->send();
    /*return journey end*/
    $this->load->view('layout/templates/error', $this->template_vars);
  }
 
  /**
	 * Function reservation
	 * Displays the Booking page
   * 
	 * @return	void
	 */
  /*public function reservation () {
    $base_path = base_url().'assets/cc';
    $this->template_vars['css'] = array(
      '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
      $base_path.'/datetimepicker/css/bootstrap-datetimepicker.min.css',
    );
    $this->template_vars['js'] = array(
      '//code.jquery.com/ui/1.12.1/jquery-ui.js',
      $base_path.'/datetimepicker/js/bootstrap-datetimepicker.min.js',
      $base_path.'/js/reservation.js',
      $base_path.'/js/functions.js',
      'https://js.stripe.com/v2/',
      $base_path.'/js/stripe/payment.js',
    );
    $this->template_vars['booking'] = $this->mdl_booking_extras->where('is_active', 1)->get()->result_array();
    $this->template_vars['terminal_array'] = array('' => lang('to'), 'Barcelona Airport Terminal 1' => 'Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2'=>'Barcelona Airport Terminal 2');
    //echo '<pre>'; print_r($this->template_vars); echo '</pre>';
    $this->template_vars['content']['image'] = 'reserva.jpg';
    $this->load->view('layout/templates/reservation', $this->template_vars);
  }*/

  /**
   * Function reservation
   * Displays the Booking page
   * 
   * @return  void
   */
  public function reservationBank () {
    $base_path = base_url().'assets/cc';
    $this->template_vars['css'] = array(
      '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
      $base_path.'/datetimepicker/css/bootstrap-datetimepicker.min.css'
    );
    $this->template_vars['js'] = array(
      '//code.jquery.com/ui/1.12.1/jquery-ui.js',
      $base_path.'/datetimepicker/js/bootstrap-datetimepicker.min.js',
      $base_path.'/js/reservation-bank.js',
      $base_path.'/js/functions-bank.js',
      'https://js.stripe.com/v2/',
      $base_path.'/js/stripe/payment.js'
    );
    $categories = $this->mdl_place_categories->getList();
    $locations = $this->mdl_locations->get()->result();
    foreach ($locations as $location) {
      $select_location[] = array('label'=>$location->location,'category'=>$categories[$location->category_id]);
      $locations[$location->location] = $location->id;
    }

    $collaborators = $this->db->select('category_id,location_id,name')->where('category_id !=', 0)->where('location_id !=',0)->get('collaborators')->result();
    foreach ($collaborators as $record) {
      $select_location[] = array('label'=>$record->name,'category'=>$categories[$record->category_id]);
      $locations[$record->name] = $record->location_id;
    }

    $this->template_vars['select_location'] = $select_location;
    $this->template_vars['locations'] = $locations;

    $this->template_vars['booking'] = $this->mdl_booking_extras->where('is_active', 1)->get()->result_array();
    $this->template_vars['terminal_array'] = array('' => lang('to'), 'Barcelona Airport Terminal 1' => 'Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2'=>'Barcelona Airport Terminal 2');
    //echo '<pre>'; print_r($this->template_vars); echo '</pre>';
    $this->template_vars['content']['image'] = 'reserva.jpg';
    $this->load->view('layout/templates/reservation_bank', $this->template_vars);
  }
  
  /**
	 * Function process
	 * Displays the payment process
   * 
	 * @return	void
	 */
  public function process() { 
    $this->load->view('layout/templates/process', $this->template_vars);
  }
  
  /**
	 * Function stripePayment
	 * Displays the payment process
   * 
	 * @return	void
	 */
  public function stripePayment() {
    if ($this->input->post('BookId') != '' && $this->input->post('amount') > 0 ){
      $booking_id = (int)strip_tags($this->input->post('BookId'));
      $booking_amount = strip_tags($this->input->post('amount'));
      $booking_info['bookingInfo'] = array('id'=>$booking_id,'amount'=>$booking_amount);
      $this->session->set_userdata($booking_info);
      $base_path = base_url().'assets/cc';
      $this->template_vars['js'] = array(
        'https://js.stripe.com/v2/',
        $base_path.'/js/stripe/payment.js',
      );
      $this->template_vars['bookings'] = 
          current($this->mdl_booking
            ->where('id', $this->input->post('BookId'))->get()->result_array());


      $arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');

      if (in_array($this->template_vars['bookings']['start_from'], $arr)) {
        $zone = $this->template_vars['bookings']['end_at'];
        $str = 'end_at';
        $this->template_vars['bookings']['start_from_lang'] = 'flightlanding_time';
        $this->template_vars['bookings']['end_at_lang'] = 'flight_time';
      } else {
          $zone = $this->template_vars['bookings']['start_from'];
          $str = 'start_from';
          $this->template_vars['bookings']['start_from_lang'] = 'flight_time';
          $this->template_vars['bookings']['end_at_lang'] = 'flightlanding_time';
      }
      /*Address details*/
      $this->template_vars['bookings']['collaborator_address'] = $this->db->from('collaborators_address')->where('id ', $this->template_vars['bookings']['collaborator_address_id'])->get()->result_array();      

      $this->db->from('collaborators')->where('id',$this->template_vars['bookings']['collaborator_id']);
      $terminal = current($this->db->get()->result_array());

      $this->template_vars['bookings'][$str] = $terminal['name'].' - '.(count($this->template_vars['bookings']['collaborator_address']) > 0 ?$this->template_vars['bookings']['collaborator_address'][0]['address'] : $terminal['address']);
      if($this->template_vars['bookings']['bcnarea_address_id'] != '' && $this->template_vars['bookings']['bcnarea_address_id'] != '0') {
        $this->template_vars['bookings'][$str] = $this->template_vars['bookings']['address'];
      }

      $this->template_vars['bookings']['collaborator_name'] = $terminal['name'];

    if ($this->template_vars['bookings']['return_book_id']) {
      $this->db->from('booking')->where('id', $this->template_vars['bookings']['return_book_id']);
      $this->template_vars['return_bookings'] = 
          current($this->mdl_booking
            ->where('id', $this->template_vars['bookings']['return_book_id'])->get()->result_array());
    }
    
    $client_qry = $this->db->from('clients')->select('name,surname,email,phone,address,cp,country, city,nationality,dni_passport,doc_no')->where('id',$this->template_vars['bookings']['client_id'])->get();
    if ($client_qry->num_rows())
        $this->template_vars['clients'] = current($client_qry->result_array());
    else
        $this->template_vars['clients'] = json_decode($this->template_vars['bookings']['client_array'], true);


      $this->load->view('layout/templates/stripe_payment', $this->template_vars);
    } else {
      redirect($this->template_vars['lang']);
    }
  }
  
  /**
	 * Function stripePaymentProcess
	 * Displays the payment process
   * 
	 * @return	void
	 */
  public function stripePaymentOldProcess() { 
    
    // If no errors, process the order:
    $errors = array();
    // Set the order amount somehow:
    /*print_r($_POST);
    exit;*/
    if ($this->input->post('stripeToken')!= '' && $this->session->userdata('bookingInfo')) {
      //echo 'comes in';
      //exit;
      $booking_info = $this->session->userdata('bookingInfo');
      $lang = $this->template_vars['lang'];
      $success_url = site_url($lang.'/success/?cm='.$booking_info['id']);
      $failure_url = site_url($lang.'/error/?cm='.$booking_info['id']);
    
      $token = $this->input->post('stripeToken');
      // create the charge on Stripe's servers - this will charge the user's card
      try {
        // Include the Stripe library:
        $this->load->library('stripe/stripeInit');

        // set your secret key: remember to change this to your live secret key in production
        // see your keys here https://manage.stripe.com/account
        \Stripe\Stripe::setApiKey($this->config->item('STRIPE_PRIVATE_KEY'));

        // Charge the order:
        $charge = \Stripe\Charge::create(array(
          "amount" => ($booking_info['amount'] * 100), // amount in cents, again
          "currency" => "usd",
          "source" => $token,
          "description" => $booking_info['id']
          )
        );
        $this->db->where('id', $booking_info['id']);
        $this->db->update('tbl_booking', array('paypal_transaction_response' => json_encode($charge)));
        // Check that it was paid:
        if ($charge->paid == true) {
            redirect($success_url);
        } else { // Charge was not paid!
          redirect($failure_url);
          echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
        }

      } catch (\Stripe\Error\Card $e) {
          // Card was declined.
        $e_json = $e->getJsonBody();
        $err = $e_json['error'];
        echo $errors['stripe'] = $err['message'];
      } catch (\Stripe\Error\ApiConnection $e) {
          // Network problem, perhaps try again.
          echo $e;
      } catch (\Stripe\Error\InvalidRequest $e) {
          // You screwed up in your programming. Shouldn't happen!
          echo $e;
      } catch (\Stripe\Error\Api $e) {
          // Stripe's servers are down!
          echo $e;
      } catch (\Stripe\Error\Base $e) {
          // Something else that's not the customer's fault.
          echo $e;
      }
      
    }

  
  }

  /**
   * Function stripePaymentProcess
   * Displays the payment process
   * 
   * @return  void
   */
  public function stripePaymentProcess() { 
    
    // If no errors, process the order:
    $errors = array();
    // Set the order amount somehow:
    /*print_r($_POST);
    exit;*/
    $post_params = $this->input->post();
    if ($post_params['stripeToken'] && $post_params['book_id']) {
      //echo 'comes in';
      //exit;
      $book_id = $post_params['book_id'];
      $amount = $post_params['amount'];
      $lang = $this->template_vars['lang'];
      $success_url = site_url($lang.'/success/?cm=' . $book_id);
      $failure_url = site_url($lang.'/error/?cm=' . $book_id);
    
      $token = $post_params['stripeToken'];
      // create the charge on Stripe's servers - this will charge the user's card
      try {
        // Include the Stripe library:
        $this->load->library('stripe/stripeInit');

        // set your secret key: remember to change this to your live secret key in production
        // see your keys here https://manage.stripe.com/account
        \Stripe\Stripe::setApiKey($this->config->item('STRIPE_PRIVATE_KEY'));

        // Charge the order:
        $charge = \Stripe\Charge::create(array(
          "amount" => ($amount * 100), // amount in cents, again
          "currency" => "usd",
          "source" => $token,
          "description" => $book_id
          )
        );
        $this->db->where('id', $book_id);
        $this->db->update('tbl_booking', array('paypal_transaction_response' => json_encode($charge)));
        // Check that it was paid:
        if ($charge->paid == true) {
            redirect($success_url);
        } else { // Charge was not paid!
          redirect($failure_url);
          echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
        }

      } catch (\Stripe\Error\Card $e) {
          // Card was declined.
        $e_json = $e->getJsonBody();
        $err = $e_json['error'];
        echo $errors['stripe'] = $err['message'];
      } catch (\Stripe\Error\ApiConnection $e) {
          // Network problem, perhaps try again.
          echo $e;
      } catch (\Stripe\Error\InvalidRequest $e) {
          // You screwed up in your programming. Shouldn't happen!
          echo $e;
      } catch (\Stripe\Error\Api $e) {
          // Stripe's servers are down!
          echo $e;
      } catch (\Stripe\Error\Base $e) {
          // Something else that's not the customer's fault.
          echo $e;
      }
    }
  }
}
?>
