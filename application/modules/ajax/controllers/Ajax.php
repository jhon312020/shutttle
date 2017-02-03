<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends Anonymous_Controller {
  public $details = array();
  public function getData() {
  if ($this->input->post()) {
    $this->load->model('routes/mdl_routes');
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
          $book_id = $post_params['book_id'];
          /*Validation for client email and seats start*/
          $error = array('error'=>false, 'seats_error'=>false, 'return_seats_error'=>false, 'available_seats_error'=>false, 'baby_seats_error'=>false, 'return_baby_seats_error'=>false, 'start_duplicate' =>  false, 'return_duplicate' => false, 'time_error' => false);
          if ($post_params['client_id'] == '') {
              if ($this->input->post('save_extra')) {
                  $qry = $this->db->where('email', $post_params['email'])->get('users');
                  if ($qry->num_rows()) {
                      $error['error'] = true;
                      $error['email_error'] = lang('exists_username');
                  }
              }
          } else {
              $clients = current($this->db->where('client_id', $post_params['client_id'])->get('users')->result_array());
              if ($clients['email'] != $post_params['email']) {
                  $qry = $this->db->where('email', $post_params['email'])->get('users');
                  if ($qry->num_rows()) {
                      $error['error'] = true;
                      $error['email_error'] = lang('exists_username');
                  }
              }
          }
          $hidden_data = json_decode($post_params['journey_'.$book_id], true);
          $terminal = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
          $step_list = array('Terminal 1', 'Terminal 2');
          if (in_array($post_params['start_from'],$terminal)) {
              if ($post_params['start_from'] == 'Barcelona Airport Terminal 1') {
                  $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
              } else {
                  $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
              }
          }
          else{
              if ($post_params['end_at'] == 'Barcelona Airport Terminal 2') {
                  $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
              } else {
                  $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
              }
          }
          
          $seat_com = $this->db->get()->result_array();
          $seat_occupy = 0;
          foreach($seat_com as $data1) {
              $seat_occupy += $data1['seats'];
          }
          $extras_array = json_decode($post_params['extras_array'], true);
          $totBabySeats = (isset($extras_array[2]['extra_count']))?$extras_array[2]['extra_count']:0;
          $seats = $hidden_data['seats'] - $seat_occupy;
          $total_seats = $post_params['adults'];
          if ($seats < $total_seats) {
              $error['error'] = true;
              $error['seats_error'] = true;
          }
          else{
              $baby_seats = $seats - $total_seats;
              if (isset($extras_array[2]['extra_count']) && $extras_array[2]['extra_count'] > $baby_seats) {
                  $error['error'] = true;
                  $error['baby_seats_error'] = true;
                  $error['go_babay_seats'] = $baby_seats;
              }
          }
          if ($this->input->post('return_book_id')) {
              $step_list = array('Terminal 1', 'Terminal 2');
              $rhidden_data = json_decode($post_params['return_journey_'.$post_params['return_book_id']], true);

              if (in_array($post_params['start_from'],$terminal)) {
                  if ($post_params['start_from'] == 'Barcelona Airport Terminal 2') {
                      $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
                  } else {
                      $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
                  }
              } else {
                  if ($post_params['end_at'] == 'Barcelona Airport Terminal 1') {
                      $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
                  } else {
                      $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
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
              else{
                  $baby_seats = $seats - $total_seats;
                  if (isset($extras_array[2]['extra_count']) && $extras_array[2]['extra_count'] > $baby_seats) {
                      $error['error'] = true;
                      $error['return_baby_seats_error'] = true;
                      $error['return_babay_seats'] = $baby_seats;
                  }
              }
          }
          if (isset($post_params['paymentmethod']) && $post_params['paymentmethod'] == 'available_seats') {
              $cl_result = $this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->row();
              if ($cl_result->no_of_available_seats < ($total_seats + $totBabySeats)) {
                  $error['error'] = true;
                  $error['available_seats_error'] = true;
              }
          }
  
  /*Same booking validation start*/
  $start_from = (in_array($post_params['start_from'], $terminal))?$post_params['start_from']:$post_params['zone'];
  $end_at = (in_array($post_params['end_at'], $terminal))?$post_params['end_at']:$post_params['zone'];
  $babySeats = (isset($extras_array[2]['extra_count']))?$extras_array[2]['extra_count']:0;
  if ($post_params['duplicate_bool'] == 0) {
    $start_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$start_from."' and b.end_at = '".$end_at."' and b.adults ='".$post_params['adults']."' and b.kids ='".$post_params['kids']."' and b.baby ='".$babySeats."' and b.start_journey ='".$hidden_data['service_date']."' and b.hour ='".$hidden_data['journey_start']."' and b.arrival_time ='".$hidden_data['journey_end']."' and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
    $start_duplicate = $this->db->query($start_duplicate_qry);
    if ($start_duplicate->num_rows() > 0) {
      $error['start_duplicate'] = true;
    }

    if ($this->input->post('return_book_id')) {
      $return_book_id1 = $post_params['return_book_id'];
      $return_hidden_data1 = json_decode($post_params['return_journey_'.$return_book_id1], true);
      $return_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$start_from."' and b.end_at = '".$end_at."' and b.adults ='".$post_params['adults']."' and b.kids ='".$post_params['kids']."' and b.baby ='".$babySeats."' and b.start_journey ='".$return_hidden_data1['service_date']."' and b.hour ='".$return_hidden_data1['journey_start']."' and b.arrival_time ='".$return_hidden_data1['journey_end']."' and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
      $return_duplicate = $this->db->query($return_duplicate_qry);
      if ($return_duplicate->num_rows() > 0) {
        $error['return_duplicate'] = true;
      }
    }
  }
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
              $babySeats = (isset($extras_array[2]['extra_count']))?$extras_array[2]['extra_count']:0;
              if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
                  $book_role = 2;
              }
                  
              
              $client_array = array('name'=> $post_params['name'], 'surname'=>$post_params['surname'],
                                      'email'=>$post_params['email'], 'phone'=>$post_params['phone']
                                      , 'address'=>$post_params['address'], 'cp'=>$post_params['cp'], 'country'=>$post_params['client_country']
                                      , 'city'=>$post_params['city'], 'nationality'=>$post_params['nationality'], 'dni_passport'=>$post_params['dni_passport']
                                      , 'doc_no'=>$post_params['doc_no']);
              /*$book_array = array('booking_array' => $this->input->post('booking_details'), 'extra_array'=>$this->input->post('extras_array'), 'client_array' => json_encode($client_array));
              $this->db->set($book_array);
              $this->db->insert('bookings');*/
    $address_new = (in_array($post_params['start_from'], $terminal))?$post_params['end_at']:$post_params['start_from'];
              $start_from = (in_array($post_params['start_from'], $terminal))?$post_params['start_from']:$post_params['zone'];
              $end_at = (in_array($post_params['end_at'], $terminal))?$post_params['end_at']:$post_params['zone'];
    $address = $address_new;
    
    /*Flight time calculation*/
    $time_go = Date('H:i', strtotime($post_params['hours'].':'.$post_params['minutes']));
    $time_back = Date('H:i', strtotime($post_params['return_hours'].':'.$post_params['return_minutes']));
    
              $book_array = array('time_go'=>$time_go, 'time_back' => $time_back, 'hour'=>$hidden_data['journey_start'], 'start_from'=>$start_from, 'end_at'=>$end_at, 
                              'arrival_time'=>$hidden_data['journey_end'],
                              'price'=>$post_params['amount'], 'start_journey'=>$hidden_data['service_date']
                              ,'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'], 
                              'kids'=>$post_params['kids']
                              ,'extra_array'=>$post_params['extras_array'], 'calendar_id'=>$book_id, 'collaborator_id'=>$post_params['collaborators_id']
                              ,'book_status'=>'pending', 'passenger_price'=>$post_params['passenger_price'], 'book_role'=>$book_role, 'baby'=>$babySeats, 'collaborator_address_id' => $post_params['collaborator_address_id'], 'address' => $address, 'bcnarea_address_id' => $post_params['bcnarea_address_id']);
              if ($this->input->post('promotional_codes_id')) {
                  $book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
                  $book_array['reduction_value'] = $post_params['promotional_values'];
                  $book_array['promotional_value'] = $post_params['promotional_code_values'];
                  $book_array['promotional_type'] = $post_params['promotional_type'];
              }
              $this->db->set($book_array);
              $this->db->insert('booking');
              $bid = $this->db->insert_id();
              /*Seats entry*/
              $seats_array = array('calendar_id'=> $book_id, 'reference_id'=> $hidden_data['reference_id'], 'start_time'=> $hidden_data['journey_start'],
                              'end_time'=> $hidden_data['journey_end'], 'journey_date' => $hidden_data['service_date'], 'steps'=> $hidden_data['steps'],
                              'from_zone'=>$hidden_data['start_from'], 'to_zone'=> $hidden_data['end_at'], 'seats'=>$post_params['adults'] + $babySeats, 'book_id'=>$bid); 

              $this->db->set($seats_array)->insert('seats');
              $str = array();
              $str['book_id'] = $bid;
              $str['amt'] = $post_params['amount'];
              $return_id = 0;
              if ($this->input->post('return_book_id')) {
                  if ($post_params['return_book_id']) {
                      $return_book_id = $post_params['return_book_id'];
                      $return_hidden_data = json_decode($post_params['return_journey_'.$return_book_id], true);
                      $return_book_array = array('time_go'=>$time_go, 'time_back' => $time_back, 'hour'=>$return_hidden_data['journey_start'], 'start_from'=>$end_at, 'end_at'=>$start_from, 
                                  'arrival_time'=>$return_hidden_data['journey_end'],
                                  'price'=>$post_params['amount'], 'start_journey'=>$return_hidden_data['service_date']
                                  ,'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'], 
                                  'kids'=>$post_params['kids']
                                  ,'extra_array'=>$post_params['extras_array'], 'calendar_id'=>$return_book_id
                                  , 'collaborator_id'=>$post_params['collaborators_id'],'book_status'=>'pending', 
                                  'passenger_price'=>$post_params['passenger_price'], 'book_role'=>$book_role, 'baby'=>$babySeats, 'round_trip'=>1, 'collaborator_address_id' => $post_params['collaborator_address_id'], 'address' => $address, 'bcnarea_address_id' => $post_params['bcnarea_address_id']);
                      if ($this->input->post('promotional_codes_id')) {
                          $return_book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
                          $return_book_array['reduction_value'] = $post_params['promotional_values'];
                          $return_book_array['promotional_value'] = $post_params['promotional_code_values'];
                          $return_book_array['promotional_type'] = $post_params['promotional_type'];
                      }
                      $this->db->set($return_book_array);
                      $this->db->insert('booking');
                      $return_id = $this->db->insert_id();
                      
                      $return_seats_array = array('calendar_id'=> $return_book_id, 'reference_id'=> $return_hidden_data['reference_id'], 'start_time'=> $return_hidden_data['journey_start'],
                                      'end_time'=> $return_hidden_data['journey_end'], 'journey_date' => $return_hidden_data['service_date'], 'steps'=> $return_hidden_data['steps'],
                                      'from_zone'=>$return_hidden_data['start_from'], 'to_zone'=> $return_hidden_data['end_at'], 'seats'=>$post_params['adults'] + $babySeats, 'book_id'=>$return_id); 

                      $this->db->set($return_seats_array)->insert('seats');
                  }
              }
              
              $this->db->select('users.id as user_id, clients.id');
              $this->db->from('clients');
              $this->db->where('clients.id', $post_params['client_id']);
              $this->db->join('users', 'clients.id=users.client_id', 'left');
              $query = $this->db->get();
              $cid='';
              if ($post_params['client_id'] != '') {
                      $data = current($query->result_array());
                      $cid = $data['id'];
                      //$str['url'] .= '^'.$data['id'].'^'.$data['user_id'];
                      $this->db->set($client_array)->where('id', $post_params['client_id']);
                      $this->db->update('clients');
                      $user_data = array('first_name'=> $post_params['name'], 'last_name'=>$post_params['surname'],
                                      'email'=>$post_params['email']);
                      $this->db->set($user_data)->where('id',$data['user_id']);
                      $this->db->update('users');
              }
              else if ($this->input->post('save_extra')) {
                      $this->db->set($client_array);
                      $this->db->insert('clients');
                      $client_id = $this->db->insert_id();
                      //$str['url'] .= '^'.$client_id;
                      $cid = $client_id;
                      $user_data = array('role'=>4, 'first_name'=> $post_params['name'], 'last_name'=>$post_params['surname'],
                                      'email'=>$post_params['email'], 'password'=>md5($post_params['password']), 'secret_key'=>base64_encode($post_params['password'].'_pickngo'),
                                      'client_id'=>$client_id);
                      $this->db->set($user_data);
                      $this->db->insert('users');
                      $user_id = $this->db->insert_id();
                      //$str['url'] .= '^'.$user_id;
              }
              else{
                  $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $bid);
                  $this->db->update('booking');
                  if ($return_id != 0) {
                      $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $return_id);
                      $this->db->update('booking');
                  }
                  //$str['url'] .= '^0^0';
              }
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
    if ($post_params['paymentmethod'] == 'bank') {
      $str['payment_method'] = 'bank';
      $pay = 'bank';
    }
    if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
        if (isset($post_params['paymentmethod'])) {
          if ($post_params['paymentmethod'] == 'available_seats') {
              $cl_result = current($this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->result_array());
              $str['payment_method'] = 'seats';
              $pay = 'paid';
              $this->db->set(array('no_of_available_seats' => $cl_result['no_of_available_seats'] - $post_params['adults'] - $totBabySeats))->where('id', $this->details['collaborator_details']['id']);
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
    
    /*Sabadell payment start*/
    //include_once(APPPATH . "modules/layout/views/templates/apiRedsys.php");
    $this->load->library('apiRedsys');
    $ln = $this->uri->segment(1);
    $miObj = new apiRedsys;
    
    //$merchantCode = "336240668";
    $merchantCode = "336240668";
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
    
    $version="HMAC_SHA256_V1";
    //$key = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
    $key = 'MIwogh31NprCbvsoQY0fvVkHRt8Wcvia';
    
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
  public function ajaxreturncomplete() {
    if ($this->input->post()) {
      $post_params = $this->input->post();
      $mode = $post_params['mode'];
      if ($mode == 'login') {
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
      }
      else if ($mode == 'seatsAvailable') {

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
        }
        else{
          if ($post_params['end_at'] == 'Barcelona Airport Terminal 2') {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
          } else {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
          }
        }
        
        $seat_com = $this->db->get()->result_array();

        $seat_occupy = 0;
        foreach($seat_com as $data1) {
          $seat_occupy += $data1['seats'];
        }
        $seats = $hidden_data['seats'] - $seat_occupy;
        $total_seats = $post_params['seats'];
        if ($seats < $total_seats) {
          $error['error'] = true;
          $error['seats_error'] = true;
        }
        else{
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
        $book_id = $post_params['book_id'];
        //$book_details = json_decode($post_params['booking_details'], true);
        /* $this->db->set(array('seats' => $post_params['seats_'.$book_id] - ($post_params['adults'])))->where('id', $book_id);
        $this->db->update('calendars'); */
        
        /*Validation for client email and seats start*/
        $error = array('error'=>false, 'seats_error'=>false, 'return_seats_error'=>false, 'available_seats_error'=>false, 'baby_seats_error'=>false, 'return_baby_seats_error'=>false, 'start_duplicate' =>  false, 'return_duplicate' => false);
        if ($post_params['client_id'] == '') {
          if ($this->input->post('save_extra')) {
            $qry = $this->db->where('email', $post_params['email'])->get('users');
            if ($qry->num_rows()) {
              $error['error'] = true;
              $error['email_error'] = lang('exists_username');
            }
          }
        } else {
          $clients = current($this->db->where('client_id', $post_params['client_id'])->get('users')->result_array());
          if ($clients['email'] != $post_params['email']) {
            $qry = $this->db->where('email', $post_params['email'])->get('users');
            if ($qry->num_rows()) {
              $error['error'] = true;
              $error['email_error'] = lang('exists_username');
            }
          }
        }
        $hidden_data = json_decode($post_params['journey_'.$book_id], true);
        $terminal = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
        $step_list = array('Terminal 1', 'Terminal 2');
        if (in_array($post_params['start_from'],$terminal)) {
          if ($post_params['start_from'] == 'Barcelona Airport Terminal 1') {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
          } else {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
          }
        }
        else{
          if ($post_params['end_at'] == 'Barcelona Airport Terminal 2') {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
          } else {
            $this->db->from('seats')->where("calendar_id = ".$book_id." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
          }
        }
        
        $seat_com = $this->db->get()->result_array();
        $seat_occupy = 0;
        foreach($seat_com as $data1) {
          $seat_occupy += $data1['seats'];
        }
        $extras_array = json_decode($post_params['extras_array'], true);
        $totBabySeats = (isset($extras_array[2]['extra_count']))?$extras_array[2]['extra_count']:0;
        $seats = $hidden_data['seats'] - $seat_occupy;
        $total_seats = $post_params['adults'];
        if ($seats < $total_seats) {
          $error['error'] = true;
          $error['seats_error'] = true;
        }
        else{
          $baby_seats = $seats - $total_seats;
          if (isset($extras_array[2]['extra_count']) && $extras_array[2]['extra_count'] > $baby_seats) {
            $error['error'] = true;
            $error['baby_seats_error'] = true;
            $error['go_babay_seats'] = $baby_seats;
          }
        }
        if ($this->input->post('return_book_id')) {
          $step_list = array('Terminal 1', 'Terminal 2');
          $rhidden_data = json_decode($post_params['return_journey_'.$post_params['return_book_id']], true);

          if (in_array($post_params['start_from'],$terminal)) {
            if ($post_params['start_from'] == 'Barcelona Airport Terminal 2') {
              $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and (to_zone in ('".implode("','", $step_list)."') or from_zone='Terminal 1')");
            } else {
              $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and to_zone in ('".implode("','", $step_list)."')");
            }
          } else {
            if ($post_params['end_at'] == 'Barcelona Airport Terminal 1') {
              $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and (from_zone in ('".implode("','", $step_list)."') or to_zone='Terminal 2')");
            } else {
              $this->db->from('seats')->where("calendar_id = ".$post_params['return_book_id']." and is_active = 1 and from_zone in ('".implode("','", $step_list)."')");
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
          else{
            $baby_seats = $seats - $total_seats;
            if (isset($extras_array[2]['extra_count']) && $extras_array[2]['extra_count'] > $baby_seats) {
              $error['error'] = true;
              $error['return_baby_seats_error'] = true;
              $error['return_babay_seats'] = $baby_seats;
            }
          }
        }
        if (isset($post_params['paymentmethod']) && $post_params['paymentmethod'] == 'available_seats') {
          $cl_result = $this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->row();
          if ($cl_result->no_of_available_seats < ($total_seats + $totBabySeats)) {
            $error['error'] = true;
            $error['available_seats_error'] = true;
          }
        }

        /*Same booking validation start*/
        $start_from = (in_array($post_params['start_from'], $terminal))?$post_params['start_from']:$post_params['zone'];
        $end_at = (in_array($post_params['end_at'], $terminal))?$post_params['end_at']:$post_params['zone'];
        $babySeats = (isset($extras_array[2]['extra_count']))?$extras_array[2]['extra_count']:0;
        if ($post_params['duplicate_bool'] == 0) {
          $start_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$start_from."' and b.end_at = '".$end_at."' and b.adults ='".$post_params['adults']."' and b.kids ='".$post_params['kids']."' and b.baby ='".$babySeats."' and b.start_journey ='".$hidden_data['service_date']."' and b.hour ='".$hidden_data['journey_start']."' and b.arrival_time ='".$hidden_data['journey_end']."' and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
          $start_duplicate = $this->db->query($start_duplicate_qry);
          if ($start_duplicate->num_rows() > 0) {
            $error['start_duplicate'] = true;
          }

          if ($this->input->post('return_book_id')) {
            $return_book_id1 = $post_params['return_book_id'];
            $return_hidden_data1 = json_decode($post_params['return_journey_'.$return_book_id1], true);
            $return_duplicate_qry = "select * from tbl_booking as b left join tbl_clients c on b.client_id = c.id where b.start_from = '".$start_from."' and b.end_at = '".$end_at."' and b.adults ='".$post_params['adults']."' and b.kids ='".$post_params['kids']."' and b.baby ='".$babySeats."' and b.start_journey ='".$return_hidden_data1['service_date']."' and b.hour ='".$return_hidden_data1['journey_start']."' and b.arrival_time ='".$return_hidden_data1['journey_end']."' and (b.client_array like '%".$post_params['email']."%' or c.email = '".$post_params['email']."')";
            $return_duplicate = $this->db->query($return_duplicate_qry);
            if ($return_duplicate->num_rows() > 0) {
              $error['return_duplicate'] = true;
            }
          }
        }
        /*Same booking validation end*/
        /*Validation for client email and seats end*/
        
        if (!$error['error'] && !$error['start_duplicate'] && !$error['return_duplicate']) {
          $book_role = 4;
          
          if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
            $book_role = 2;
          }
            
          
          $client_array = array('name'=> $post_params['name'], 'surname'=>$post_params['surname'],
                      'email'=>$post_params['email'], 'phone'=>$post_params['phone']
                      , 'address'=>$post_params['address'], 'cp'=>$post_params['cp'], 'country'=>$post_params['client_country']
                      , 'city'=>$post_params['city'], 'nationality'=>$post_params['nationality'], 'dni_passport'=>$post_params['dni_passport']
                      , 'doc_no'=>$post_params['doc_no']);
          $book_array = array('hour'=>$hidden_data['journey_start'], 'start_from'=>$start_from, 'end_at'=>$end_at, 
                  'arrival_time'=>$hidden_data['journey_end'],
                  'price'=>$post_params['amount'], 'start_journey'=>$hidden_data['service_date']
                  ,'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'], 
                  'kids'=>$post_params['kids']
                  ,'extra_array'=>$post_params['extras_array'], 'calendar_id'=>$book_id, 'collaborator_id'=>$post_params['collaborators_id']
                  ,'book_status'=>'pending', 'passenger_price'=>$post_params['seats_price_'.$book_id], 'book_role'=>$book_role, 'baby'=>$babySeats);
          if ($this->input->post('promotional_codes_id')) {
            $book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
            $book_array['reduction_value'] = $post_params['promotional_values'];
            $book_array['promotional_value'] = $post_params['promotional_code_values'];
            $book_array['promotional_type'] = $post_params['promotional_type'];
          }
          $this->db->set($book_array);
          $this->db->insert('booking');
          $bid = $this->db->insert_id();
          /*Seats entry*/
          $seats_array = array('calendar_id'=> $book_id, 'reference_id'=> $hidden_data['reference_id'], 'start_time'=> $hidden_data['journey_start'],
                  'end_time'=> $hidden_data['journey_end'], 'journey_date' => $hidden_data['service_date'], 'steps'=> $hidden_data['steps'],
                  'from_zone'=>$hidden_data['start_from'], 'to_zone'=> $hidden_data['end_at'], 'seats'=>$post_params['adults'] + $babySeats, 'book_id'=>$bid); 

          $this->db->set($seats_array)->insert('seats');
          $str = array();
          $str['book_id'] = $bid;
          $str['amt'] = $post_params['amount'];
          $return_id = 0;
          if ($this->input->post('return_book_id')) {
            if ($post_params['return_book_id']) {
              $return_book_id = $post_params['return_book_id'];
              $return_hidden_data = json_decode($post_params['return_journey_'.$return_book_id], true);
              $return_book_array = array('hour'=>$return_hidden_data['journey_start'], 'start_from'=>$end_at, 'end_at'=>$start_from, 
                    'arrival_time'=>$return_hidden_data['journey_end'],
                    'price'=>$post_params['amount'], 'start_journey'=>$return_hidden_data['service_date']
                    ,'country'=>$post_params['country'], 'flight_no'=>$post_params['flight_no'], 'adults'=>$post_params['adults'], 
                    'kids'=>$post_params['kids']
                    ,'extra_array'=>$post_params['extras_array'], 'calendar_id'=>$return_book_id
                    , 'collaborator_id'=>$post_params['collaborators_id'],'book_status'=>'pending', 
                    'passenger_price'=>$post_params['seats_price_'.$book_id], 'book_role'=>$book_role, 'baby'=>$babySeats, 'round_trip'=>1);
              if ($this->input->post('promotional_codes_id')) {
                $return_book_array['promotional_code_id'] = $post_params['promotional_codes_id'];
                $return_book_array['reduction_value'] = $post_params['promotional_values'];
                $return_book_array['promotional_value'] = $post_params['promotional_code_values'];
                $return_book_array['promotional_type'] = $post_params['promotional_type'];
              }
              $this->db->set($return_book_array);
              $this->db->insert('booking');
              $return_id = $this->db->insert_id();
              
              $return_seats_array = array('calendar_id'=> $return_book_id, 'reference_id'=> $return_hidden_data['reference_id'], 'start_time'=> $return_hidden_data['journey_start'],
                      'end_time'=> $return_hidden_data['journey_end'], 'journey_date' => $return_hidden_data['service_date'], 'steps'=> $return_hidden_data['steps'],
                      'from_zone'=>$return_hidden_data['start_from'], 'to_zone'=> $return_hidden_data['end_at'], 'seats'=>$post_params['adults'] + $babySeats, 'book_id'=>$return_id); 

              $this->db->set($return_seats_array)->insert('seats');
            }
          }
          
          $this->db->select('users.id as user_id, clients.id');
          $this->db->from('clients');
          $this->db->where('clients.id', $post_params['client_id']);
          $this->db->join('users', 'clients.id=users.client_id', 'left');
          $query = $this->db->get();
          $cid='';
          if ($post_params['client_id'] != '') {
              $data = current($query->result_array());
              $cid = $data['id'];
              $this->db->set($client_array)->where('id', $post_params['client_id']);
              $this->db->update('clients');
              $user_data = array('first_name'=> $post_params['name'], 'last_name'=>$post_params['surname'],
                      'email'=>$post_params['email']);
              $this->db->set($user_data)->where('id',$data['user_id']);
              $this->db->update('users');
          } else if ($this->input->post('save_extra')) {
              $this->db->set($client_array);
              $this->db->insert('clients');
              $client_id = $this->db->insert_id();
              $cid = $client_id;
              $user_data = array('role'=>4, 'first_name'=> $post_params['name'], 'last_name'=>$post_params['surname'],
                      'email'=>$post_params['email'], 'password'=>md5($post_params['password']), 'secret_key'=>base64_encode($post_params['password'].'_pickngo'),
                      'client_id'=>$client_id);
              $this->db->set($user_data);
              $this->db->insert('users');
              $user_id = $this->db->insert_id();
          } else {
            $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $bid);
            $this->db->update('booking');
            if ($return_id != 0) {
              $this->db->set(array('client_array'=>json_encode($client_array)))->where('id', $return_id);
              $this->db->update('booking');
            }
          }
          if ($cid != '') {
            $this->db->set(array('client_id'=>$cid))->where('id', $bid);
            $this->db->update('booking');
            if ($return_id != 0) {
              $this->db->set(array('client_id'=>$cid))->where('id', $return_id);
              $this->db->update('booking');
            }
          }
          $str['online'] = true;
          $str['error'] = false;
          $pay = 'online';
          if ($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2) {
            if (isset($post_params['paymentmethod'])) {
              if ($post_params['paymentmethod'] == 'available_seats') {
                $cl_result = current($this->db->from('collaborators')->where('id',$this->details['collaborator_details']['id'])->get()->result_array());
                $str['online'] = false;
                $pay = 'paid';
                $this->db->set(array('no_of_available_seats' => $cl_result['no_of_available_seats'] - $post_params['adults'] - $totBabySeats))->where('id', $this->details['collaborator_details']['id']);
                $this->db->update('collaborators');
              }
              else if ($post_params['paymentmethod'] == 'online') {
                $str['online'] = true;
                $pay = 'online';
              }
              else if ($post_params['paymentmethod'] == 'cash') {
                $str['online'] = false;
                $pay = 'cash';
              }
            }
          }
          $this->db->set(array('payment_method'=>$pay, 'return_book_id'=>$return_id))->where('id', $bid);
          $this->db->update('booking');
          echo json_encode($str);
        } else {
          echo json_encode($error);
        }
      }
    }
  }
  
}
?>
