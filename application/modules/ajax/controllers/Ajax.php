<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends Anonymous_Controller {
  public $details = array();
  public function __construct() {
    parent::__construct();
    $this->load->model('users/mdl_users');
    $this->load->model('paths/mdl_paths');
    $this->load->model('vehicles/mdl_vehicles');
    $this->load->model('locations/mdl_locations');
    $this->load->model('collaborators/mdl_collaborators');
    $this->details = array();
    $this->details['collaborator_details'] = array();
    $this->details['collaborator_address'] = array();
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
      $qry = $this->db->select('collaborators.address,collaborators.id,collaborators.name,collaborators.zone, collaborators.no_of_available_seats,collaborators.available_seats,collaborators.payment_methods,collaborators.price')->from('users')->where(array('users.id'=>$this->session->userdata('user_id')))
              ->join('collaborators', 'collaborators.id=users.collaborator_id', 'left');
      $this->details['collaborator_details'] = current($qry->get()->result_array());
      $this->details['collaborator_address'] = $this->db->query("select CONCAT(col.name,' - ',coladd.address) as label,CONCAT(col.name,' - ',coladd.address) as value,coladd.zone,col.id, coladd.id as collaborator_address_id from tbl_collaborators_address coladd left join tbl_collaborators col on coladd.collaborator_id = col.id where col.id = ".$this->details['collaborator_details']['id']." and coladd.is_active=1")->result_array();     
    }
  }

  public function firstStepReservation() {
    if ($this->input->post()) {
      $post_params = $this->input->post();
      switch ($post_params['mode'])  {
        case "firstStep":
            $post_params['start_journey'] = str_replace('/', '-', $post_params['start_journey']);
            if(strtotime($post_params['start_journey']) < strtotime(' +6 hours')) {
                echo json_encode(array('error'=>lang('We need at least 6 hours to prepare your car and trip')));
                exit;
            }
            if (isset($post_params['return_journey']) && $post_params['return_journey']) {
              $post_params['return_journey'] = str_replace('/', '-', $post_params['return_journey']);
              if(strtotime($post_params['start_journey']) >= strtotime($post_params['return_journey'])) {
                echo json_encode(array('error'=>'The start date should be less than return date'));
                exit;
              }
            }
            // Check for collaborators 
            if ($post_params['collaborators_id']) {
            	if ($this->mdl_collaborators->checkAvailableRoute($post_params) == false) {
            		echo json_encode(array('error'=>'Kindly select your location at Start/End.'));
                	exit;
            	}
            }
            $paths = $this->mdl_paths->getRoute($post_params['from_location_id'], $post_params['to_location_id']);
            if ($paths) {
              $route_is_in_barcelona_city = $this->mdl_locations->isBarcelonaCity(array($post_params['from_location_id'], $post_params['to_location_id']));
              if ($route_is_in_barcelona_city) {
                $vehicles = $this->mdl_vehicles->getVehicles($post_params['adults'], 'all');
              } else {
                $vehicles = $this->mdl_vehicles->getVehicles($post_params['adults'], 'private');
                $vehicle_list = json_decode($paths['vehicles'],true);
                $vehicle_list = array_filter($vehicle_list);
                if (count($vehicle_list) == 0) {
                  $vehicles = false;
                } else {
                  foreach ($vehicles as $key=>$vehicle) {
                    if (!array_key_exists($vehicle['id'], $vehicle_list)) {
                      unset($vehicles[$key]);
                    }
                  }
                  $vehicles = array_values($vehicles);
                  if (count($vehicles) == 0) {
                    $vehicles = false; 
                  }
                }
              }
              
              if ($vehicles) {
                $post_params['start_journey'] = str_replace('/', '-', $post_params['start_journey']);
                $data['formatted_start_date'] = date('l j - F',strtotime($post_params['start_journey']));
                $data['formatted_start_time'] = date('H:i',strtotime($post_params['start_journey']));
                if (isset($post_params['return_journey']) && $post_params['return_journey']) {
                  $post_params['return_journey'] = str_replace('/', '-', $post_params['return_journey']);
                  $data['formatted_return_date'] = date('l j - F',strtotime($post_params['return_journey']));  
                  $data['formatted_return_time'] = date('H:i',strtotime($post_params['return_journey']));
                }
                $data['passengers'] = $post_params['adults'];
                $data['from_location'] = $post_params['from_location'];
                $data['to_location'] = $post_params['to_location'];
                $data['paths'] = $paths;
                $data['vehicles'] = $vehicles;
                $rate_type = 'rate1';
                if ($post_params['collaborators_id']) {
                  $collaborator = $this->mdl_collaborators->where('id',$post_params['collaborators_id'])->get()->result();
                  if ($collaborator) {
                    if ($collaborator[0]->price) {
                      $rate_type = $collaborator[0]->price;
                    }
                  }
                }
                $data['shared_vehicles_rate'] = $this->mdl_vehicles->getVehicleRates($post_params['adults'],$rate_type);
                echo json_encode($data); exit;
              } else {
                echo json_encode(array('error'=>'The vehicles does not exists for selected locations or people'));
                exit;  
              }
            } else {
              echo json_encode(array('error'=>'The route does not exists. Kindly select any other locations'));
              exit;
            }
          break;
      }
    }
  }

  public function finalStepReservation() {
    if ($this->input->post()) {
      $post_params = $this->input->post();
      if (isset($post_params['start_journey']) && $post_params['start_journey'] != '') {
        list($start_journey, $time) = explode(' ', $post_params['start_journey']);
        $post_params['start_journey'] = $start_journey;
        list($hours, $minutes) = explode(':', $time);
        $post_params['hours'] = $hours;
        $post_params['minutes'] = $minutes;
      }
      if (isset($post_params['start_journey']) && $post_params['return_journey'] != '') {
        list($return_journey, $return_time) = explode(' ', $post_params['return_journey']);
        $post_params['return_journey'] = $return_journey;
        list($return_hours, $return_minutes) = explode(':', $return_time);
        $post_params['return_hours'] = $return_hours;
        $post_params['return_minutes'] = $return_minutes;
      }
      $mode = $post_params['mode'];
      if ($mode == 'formsubmit') {
        
      }
    }
  }

  public function getData() {
  if ($this->input->post()) {
    $this->load->model('routes/mdl_routes');
    $post_params = $this->input->post();
    if (isset($post_params['start_journey']) && $post_params['start_journey'] != '') {
      list($start_journey, $time) = explode(' ', $post_params['start_journey']);
      $start_journey = str_replace('/', '-', $start_journey);
      $post_params['start_journey'] = date('Y-m-d',strtotime($start_journey));
      list($hours, $minutes) = explode(':', $time);
      $post_params['time'] = $time.':00';
      $post_params['hours'] = $hours;
      $post_params['minutes'] = $minutes;
    }
    $post_params['return_time'] = '';
    if (isset($post_params['start_journey']) && $post_params['return_journey'] != '') {
      list($return_journey, $return_time) = explode(' ', $post_params['return_journey']);
      $return_journey = str_replace('/', '-', $return_journey);
      $post_params['return_journey'] = date('Y-m-d',strtotime($return_journey));
      list($return_hours, $return_minutes) = explode(':', $return_time);
      $post_params['return_time'] = $return_time.':00';
      $post_params['return_hours'] = $return_hours;
      $post_params['return_minutes'] = $return_minutes;
    }
    $mode = $post_params['mode'];
    if ($mode == 'firstStep') {
      $result = $this->mdl_routes->getcar($post_params, $this->details);
      echo json_encode($result);
    } else if ($mode == 'login') {
        $this->db->select('clients.id as client_id,clients.name,clients.surname,clients.email,clients.phone,clients.address,clients.cp,clients.country as client_country, clients.city,clients.nationality,clients.dni_passport,clients.doc_no,users.id as user_id');
        $this->db->from('users');
        $this->db->where('users.email', $post_params['login_email']);
        $this->db->where('users.password', md5($post_params['login_password']));
        $this->db->where('users.is_active', '1');
        $this->db->where('users.role', '4');
        $this->db->join('clients', 'clients.id=users.client_id', 'inner');
        $query = $this->db->get();
        if ($query->num_rows()) {
            $user = current($query->result_array());
            $user['password'] = $post_params['login_password'];
            echo json_encode($user);
        } else {
            echo json_encode(array('error'=>'invalid credentials'));
        }
    } else if ($mode == 'codes') {
        $qry = $this->db->where('code', $post_params['code'])->get('promotional_codes');
        if ($qry->num_rows())
            echo json_encode(current($qry->result_array()));
        else
            echo json_encode(array('error'=>'invalid codes'));
    } else if ($mode == 'seatsAvailable') {
        /*Validation for client email and seats start*/
        $error = array('error'=>false, 'seats_error'=>false, 'return_seats_error'=>false, 'available_seats_error'=>false, 'baby_seats_error'=>false);
        $hidden_data = json_decode($post_params['journey_details'], true);
        $book_id = $hidden_data['id'];
        $terminal = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
        $step_list = array('Terminal 1', 'Terminal 2');
        if (in_array($post_params['start_from'],$terminal)) {
          if ($post_params['start_from'] == 'Barcelona Airport Terminal 1') {
              $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
          } else {
              $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
          }
        } else {
            if ($post_params['end_at'] == 'Barcelona Airport Terminal 2') {
                $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
            } else {
                $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
            }
        }
        $seat_com = $this->db->get()->result_array();
        $seat_occupy = 0;
        foreach ($seat_com as $data1) {
          $seat_occupy += $data1['seats'];
        }
        $seats = $hidden_data['seats'] - $seat_occupy;
        $total_seats = $post_params['seats'];
        if ($seats < $total_seats) {
          $error['error'] = true;
          $error['seats_error'] = true;
        } else {
          if (($seats - $total_seats)  == 0) {
            $error['baby_seats_error'] = true;
          }
        }
        if ($this->input->post('return_journey_details')) {
            $step_list = array('Terminal 1', 'Terminal 2');
            $rhidden_data = json_decode($post_params['return_journey_details'], true);
            $return_id = $rhidden_data['id'];
            if (in_array($post_params['start_from'],$terminal)) {
                if ($post_params['start_from'] == 'Barcelona Airport Terminal 2') {
                    $this->db->from('seats')->where("calendar_id = ".$return_id." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
                } else {
                    $this->db->from('seats')->where("calendar_id = ".$return_id." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
                }
            } else {
                if ($post_params['end_at'] == 'Barcelona Airport Terminal 1') {
                    $this->db->from('seats')->where("calendar_id = ".$return_id." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
                } else {
                    $this->db->from('seats')->where("calendar_id = ".$return_id." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
                }
            }

            $seat_com = $this->db->get()->result_array();
            $seat_occupy = 0;
            foreach($seat_com as $data1) {
                $seat_occupy += $data1['seats'];
            }
            $seats = $rhidden_data['seats'] - $seat_occupy;
            
            if ($seats < $total_seats) {
                $error['error'] = true;
                $error['return_seats_error'] = true;
            }
            else {
                if (($seats - $total_seats)  == 0) {
                    $error['baby_seats_error'] = true;
                }
            }
        }
        echo json_encode($error);
    }
      else if ($mode == 'formsubmit') {
          //$book_id = $post_params['book_id'];
          /*Validation for client email and seats start*/
          $error = array('error'=>false, 'seats_error'=>false, 'return_seats_error'=>false, 'available_seats_error'=>false, 'baby_seats_error'=>false, 'return_baby_seats_error'=>false, 'start_duplicate' =>  false, 'return_duplicate' => false, 'time_error' => false);
          
          if (isset($post_params['paymentmethod']) && $post_params['paymentmethod'] == 'available_seats') {
              $cl_result = $this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->row();
              if ($cl_result->no_of_available_seats < ($post_params['adults'])) {
                  $error['error'] = true;
                  $error['available_seats_error'] = true;
              }
          }
  
  /*Same booking validation start*/
  $start_from = $post_params['from_location'];
  $end_at = $post_params['to_location'];
  if ($post_params['duplicate_bool'] == 0) {
    $start_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$start_from."' and b.end_at = '".$end_at."' and b.adults ='".$post_params['adults']."' and b.start_journey ='".$post_params['start_journey']."' and b.hour ='".$post_params['time']."' and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
    $start_duplicate = $this->db->query($start_duplicate_qry);
    if ($start_duplicate->num_rows() > 0) {
      $error['start_duplicate'] = true;
    }
    
    if ($this->input->post('return_journey')) {
      $return_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$end_at."' and b.end_at = '".$start_from."' and b.adults ='".$post_params['adults']."'
       and b.start_journey ='".$post_params['return_journey']."' and b.hour ='".$post_params['return_time']."'  and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
      $return_duplicate = $this->db->query($return_duplicate_qry);
      if ($return_duplicate->num_rows() > 0) {
        $error['return_duplicate'] = true;
      }
    }
  }

/*  $post_params['error'] ='The start date should be less than return date1'; 
    echo json_encode($post_params); exit;*/

  /* Stripe payment validation start */
  /*if (isset($post_params['paymentmethod']) && $post_params['paymentmethod'] == 'online') {


  }*/
  /* Stripe payment validation end */


  /*Same booking validation end*/
  
  /*Journey time validation start*/
  //~ $journeyStartDate     = str_replace('/','-',$post_params['start_journey']);
  //~ $journeyStartDate     = date('Y-m-d', strtotime($journeyStartDate));
  //~ $journeyStartTime   = $post_params['hours'].':'.$post_params['minutes'];
  //~ $journeyStartDateTime = $journeyStartDate.' '.$journeyStartTime;
  //~ $tommorrowDateTime = date('Y-m-d H:i', strtotime('+4 hour'));
  //~ if (strtotime($journeyStartDateTime) < strtotime($tommorrowDateTime)) {
    //~ $error['error'] = true;
    //~ $error['time_error'] = true;
  //~ }
  /*Journey time validation end*/
  
          //echo json_encode($error);exit;
          /*Validation for client email and seats end*/
          
          if (!$error['error'] && !$error['start_duplicate'] && !$error['return_duplicate']) {
              $book_role = 4;
              
              if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
                  $book_role = 2;
              }
                  
              
              $client_array = array('name'=> $post_params['name'], 'surname'=>$post_params['surname'],
                                      'email'=>$post_params['email'], 'phone'=>$post_params['phone']
                                      );
              
              $address = $post_params['location_address'];
    
              /*Flight time calculation*/
              $time_go = Date('H:i', strtotime($post_params['hours'].':'.$post_params['minutes']));
              $time_back = Date('H:i', strtotime($post_params['return_hours'].':'.$post_params['return_minutes']));
    
              $collaborators_id = $post_params['collaborators_id'];
              if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
                $users = $this->mdl_users->where('id = '.$this->session->userdata('user_id'))->get()->row();
                $collaborators_id = $users->collaborator_id;
              }

              $book_array = array('time_go'=>$time_go, 'time_back' => $time_back, 'hour'=>$time_go, 'start_from'=>$start_from, 'end_at'=>$end_at,'price'=>$post_params['amount'], 'start_journey'=>$post_params['start_journey'],'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'], 'extra_array'=>$post_params['extras_array'],  'collaborator_id'=>$collaborators_id,'book_status'=>'pending', 'passenger_price'=>$post_params['passenger_price'], 'book_role'=>$book_role,
                                'collaborator_address_id' => $post_params['collaborator_address_id'], 'address' => $address, 'bcnarea_address_id' => $post_params['bcnarea_address_id'],'version'=>1,'from_location_id'=>$post_params['from_location_id'],'to_location_id'=>$post_params['to_location_id'],'vehicle_id'=>$post_params['vehicle_id']);

              if ($this->input->post('promotional_codes_id')) {
                  $book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
                  $book_array['reduction_value'] = $post_params['promotional_values'];
                  $book_array['promotional_value'] = $post_params['promotional_code_values'];
                  $book_array['promotional_type'] = $post_params['promotional_type'];
              }
              
              $this->db->set($book_array);
              $this->db->insert('booking');
              $bid = $this->db->insert_id();
              $ids[] = $bid;
              /*Seats entry*/
              /*$seats_array = array('calendar_id'=> $book_id, 'reference_id'=> $hidden_data['reference_id'], 'start_time'=> $hidden_data['journey_start'],
                              'end_time'=> $hidden_data['journey_end'], 'journey_date' => $hidden_data['service_date'], 'steps'=> $hidden_data['steps'],
                              'from_zone'=>$hidden_data['start_from'], 'to_zone'=> $hidden_data['end_at'], 'seats'=>$post_params['adults'],
                                'book_id'=>$bid); 

              $this->db->set($seats_array)->insert('seats');*/
              $str = array();
              $str['book_id'] = $bid;
              $str['amt'] = $post_params['amount'];
              $return_id = 0;
              if ($this->input->post('return_journey')) {
                  if ($post_params['return_journey']) {
                      $return_book_array = array('time_go'=>$time_go, 'time_back' => $time_back, 'hour'=>$post_params['return_time'], 'start_from'=>$end_at, 'end_at'=>$start_from, 
                                  'price'=>$post_params['amount'], 'start_journey'=>$post_params['return_journey']
                                  ,'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'],
                                  'extra_array'=>$post_params['extras_array'], 'collaborator_id'=>$collaborators_id,'book_status'=>'pending', 
                                  'passenger_price'=>$post_params['passenger_price'], 'book_role'=>$book_role,
                                    'round_trip'=>1, 'collaborator_address_id' => $post_params['collaborator_address_id'], 'address' => $address, 'bcnarea_address_id' => $post_params['bcnarea_address_id'],'version'=>1,'from_location_id'=>$post_params['to_location_id'],'to_location_id'=>$post_params['from_location_id'],'vehicle_id'=>$post_params['vehicle_id']);
                      if ($this->input->post('promotional_codes_id')) {
                          $return_book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
                          $return_book_array['reduction_value'] = $post_params['promotional_values'];
                          $return_book_array['promotional_value'] = $post_params['promotional_code_values'];
                          $return_book_array['promotional_type'] = $post_params['promotional_type'];
                      }
                      $this->db->set($return_book_array);
                      $this->db->insert('booking');
                      $return_id = $this->db->insert_id();
                      $ids[] = $return_id;
                  }
              }
              
                $client_lists = 
                  $this->db
                        ->where('email', $post_params['email'])->from('clients')
                        ->get()->row();

                  if($client_lists) {
                    $client_id = $client_lists->id;
                    $cid = '';
                    $this->db->set(array('client_array'=>json_encode($client_array), 'existing_client_id' => $client_id))->where('id', $bid);
                    $this->db->update('booking');
                    if ($return_id != 0) {
                        $this->db->set(array('client_array'=>json_encode($client_array), 'existing_client_id' => $client_id))->where('id', $return_id);
                        $this->db->update('booking');
                    } 
                  } else {
                    $this->db->set($client_array)->insert('clients');
                    $client_id = $this->db->insert_id();
                    $cid = $client_id;
                     $user_data = 
                    array('role'=>4, 'first_name'=> $post_params['name'], 
                          'last_name'=>$post_params['surname'],
                          'email'=>$post_params['email'],
                          'password'=>md5('test'),
                          'secret_key'=>base64_encode('test_pickngo'),
                          'client_id'=>$client_id);

                    $this->db->set($user_data)->insert('users');
                    
                  }

                  /* Uncomment this if the save my credential is active */
                  /* $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $bid);
                  $this->db->update('booking');
                  if ($return_id != 0) {
                      $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $return_id);
                      $this->db->update('booking');
                  } */
                  //$str['url'] .= '^0^0';
              //}
              if ($cid != '') {
                  $this->db->set(array('client_id'=>$cid))->where('id', $bid);
                  $this->db->update('booking');
                  if ($return_id != 0) {
                      $this->db->set(array('client_id'=>$cid))->where('id', $return_id);
                      $this->db->update('booking');
                  }
              }
              //$str['url'] .= '^'.$post_params['collaborators_id'];
              $str['payment_method'] = 'online';
              $str['error'] = false;
              $pay = 'online';
    if (isset($post_params['paymentmethod']) && $post_params['paymentmethod'] == 'bank') {
      $str['payment_method'] = 'bank';
      $pay = 'bank';
    }
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
        if (isset($post_params['paymentmethod'])) {
          if ($post_params['paymentmethod'] == 'available_seats') {
              $cl_result = current($this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->result_array());
              $str['payment_method'] = 'seats';
              $pay = 'paid';
              $this->db->set(array('no_of_available_seats' => $cl_result['no_of_available_seats'] - $post_params['adults']))->where('id', $this->details['collaborator_details']['id']);
              $this->db->update('collaborators');
          }
            else if ($post_params['paymentmethod'] == 'online') {
                $str['payment_method'] = 'online';
                $pay = 'online';
            }
            else if ($post_params['paymentmethod'] == 'cash') {
                $str['payment_method'] = 'cash';
                $pay = 'cash';
            }
        }
    }
    
    $this->db->set(array('payment_method'=>$pay, 'return_book_id'=>$return_id))->where('id', $bid)->update('booking');
    //$this->db->set(array('payment_method'=>$pay))->where('id', $return_id)->update('booking');

    if ($post_params['paymentmethod'] == 'cash') {
      $records = $this->db->where_in('id',$ids)->get('booking')->result_array();
      $this->db->insert_batch('temp_booking',$records);
      $this->db->where_in('id',$ids)->delete('booking');
      $this->send_payment_request($records[0]['id'], $client_array);
    }
    
    /*Sabadell payment start*/
    //include_once(APPPATH . "modules/layout/views/templates/apiRedsys.php");
    $this->load->library('apiRedsys');
    $ln = $this->uri->segment(1);
    $miObj = new apiRedsys;
    
    //$merchantCode = "336240668";
    /* Pick-n-Go merchant code 
    $merchantCode = "336240668";
    */
    $merchantCode = "336548318";
    $terminal = "001";
    $amount = str_replace('.', '', $post_params['amount']);
    $currency = "978";
    $transactionType = "0";
    $merchantURL = "";
    $urlOK = site_url($ln.'/success/?cm='.$bid);
    $urlKO = site_url($ln.'/error/?cm='.$bid);
    $order = time();
    $testurlPago = 'https://sis-t.redsys.es:25443/sis/realizarPago';
    //$realurlPago = 'https://sis.redsys.es/sis/realizarPago';
    $realurlPago = 'https://sis.sermepa.es/sis/realizarPago';
    
    $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
    $miObj->setParameter("DS_MERCHANT_ORDER",strval($order));
    $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$merchantCode);
    $miObj->setParameter("DS_MERCHANT_CURRENCY",$currency);
    $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$transactionType);
    $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
    $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$merchantURL);
    $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);   
    $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);
    
    /* Pick-n-Go key
    $version="HMAC_SHA256_V1";
    //$key = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';

    $key = 'MIwogh31NprCbvsoQY0fvVkHRt8Wcvia'; 
    */

    $version="HMAC_SHA256_V1";
    //Test key
    //$key = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
    //Real key
    $key = 'F5HrGPVIaddWbrdlvVDPAY365W3g7X45';
    
    $request = "";
    $params = $miObj->createMerchantParameters();
    $signature = $miObj->createMerchantSignature($key);
    
    $str['version'] = $version;
    $str['params'] = $params;
    $str['signature'] = $signature;
    $str['banaba_url'] = $realurlPago;
    /*Sabadell payment end*/
    
              echo json_encode($str);
          } else {
              echo json_encode($error);
          }
      }
  }
}

  public function send_payment_request($book_id, $client) {
    $settings_data = $this->db->select('*')->from('settings')->get()->result();
    $settings = array();
    foreach ($settings_data as $data) {
      $settings[$data->setting_key] = $data->setting_value;
    }
    $this->load->library('email');
    $subject = 'Confirm your order';
    $vars = $this->getTempBookingContent($book_id);
    $vars['client'] = $client;
    $vars['lang'] = $this->uri->segment(1);
    $vars['confirm_url'] = site_url($this->uri->segment(1).'/doPayment/'.$book_id);
    $mail_html = $this->load->view('layout/templates/request_email', $vars, true);
    $this->email->set_mailtype("html");
    $this->email->from($settings['site_email']);
    $this->email->to($client['email']);
    $this->email->subject($subject);
    $this->email->message($mail_html);
    $this->email->send();
  }

  public function pay_now() {
    if ($this->input->post('id')) {
      $bid = $this->input->post('id');
      $booking = $this->db->where('id',$bid)->get('temp_booking')->result_array();
      $ids[] = $bid;
      if (!$booking) {
        echo json_encode(array('error'=>'Your order has been expired'));
        exit;
      }
      unset($booking[0]['created']);
      $records[] = $booking[0];
      if ($booking[0]['return_book_id']) {
        $ids[] = $booking[0]['return_book_id'];
        $return_booking = $this->db->where('id',$booking[0]['return_book_id'])->get('temp_booking')->result_array();
        if ($return_booking) {
          unset($return_booking[0]['created']);
          $records[] = $return_booking[0];
        }
      }
      $this->db->insert_batch('booking',$records);
      $this->db->where_in('id',$ids)->delete('temp_booking');

      /*Sabadell payment start*/
      //include_once(APPPATH . "modules/layout/views/templates/apiRedsys.php");
      $this->load->library('apiRedsys');
      $ln = $this->uri->segment(1);
      $miObj = new apiRedsys;
      
      //$merchantCode = "336240668";
      /* Pick-n-Go merchant code 
      $merchantCode = "336240668";
      */
      $merchantCode = "336548318";
      $terminal = "001";
      $amount = str_replace('.', '', $booking[0]['price']);
      $currency = "978";
      $transactionType = "0";
      $merchantURL = "";
      $urlOK = site_url($ln.'/success/?cm='.$bid);
      $urlKO = site_url($ln.'/error/?cm='.$bid);
      $order = time();
      $testurlPago = 'https://sis-t.redsys.es:25443/sis/realizarPago';
      //$realurlPago = 'https://sis.redsys.es/sis/realizarPago';
      $realurlPago = 'https://sis.sermepa.es/sis/realizarPago';
      
      $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
      $miObj->setParameter("DS_MERCHANT_ORDER",strval($order));
      $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$merchantCode);
      $miObj->setParameter("DS_MERCHANT_CURRENCY",$currency);
      $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$transactionType);
      $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
      $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$merchantURL);
      $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);   
      $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);
      

      $version="HMAC_SHA256_V1";
      //Test key
      //$key = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
      //Real key
      $key = 'F5HrGPVIaddWbrdlvVDPAY365W3g7X45';
      
      $request = "";
      $params = $miObj->createMerchantParameters();
      $signature = $miObj->createMerchantSignature($key);
      $str = array();
      $str['book_id'] = $bid;
      $str['amt'] = $booking[0]['price'];
      $str['version'] = $version;
      $str['params'] = $params;
      $str['signature'] = $signature;
      $str['banaba_url'] = $realurlPago;
      /*Sabadell payment end*/

      echo json_encode($str);
    }
  }

  function getTempBookingContent($id) {
    $this->db->from('temp_booking')->where('id', $id);
    $res['bookings'] = current($this->db->get()->result_array());

    if ($res['bookings']['version'] == 1) {
      $vehicles = $this->db->from('vehicles')->where('id',$res['bookings']['vehicle_id'])->get()->result_array();
      if ($vehicles) {
        $res['bookings']['vehicle'] = $vehicles[0];
      }
    }

    if ($res['bookings']['return_book_id']) {
      $this->db->from('temp_booking')->where('id', $res['bookings']['return_book_id']);
      $res['return_bookings'] = current($this->db->get()->result_array());
    }

    /*Address details*/
    $res['bookings']['collaborator_address'] = $this->db->from('collaborators_address')->where('id', $res['bookings']['collaborator_address_id'])->get()->result_array();

    $this->db->from('collaborators')->where('id',$res['bookings']['collaborator_id']);
    $terminal = current($this->db->get()->result_array());
      
    $res['bookings']['collaborator_name'] = $terminal['name'];
    $this->db->from('calendars')->where('id', $res['bookings']['calendar_id']);
    $res['start_journey'] = current($this->db->get()->result_array());
    $client_qry = $this->db->from('clients')->select('name,surname,email,phone,address,cp,country, city,nationality,dni_passport,doc_no')->where('id',$res['bookings']['client_id'])->get();
    if ($client_qry->num_rows())
      $res['clients'] = current($client_qry->result_array());
    else
      $res['clients'] = json_decode($res['bookings']['client_array'], true);

    $res['book_reference'] = 'SHT-'.date('dmY',strtotime($res['bookings']['start_journey'])).'-'.sprintf("%02d", $res['bookings']['id']);

    return $res;
  }

}
?>
