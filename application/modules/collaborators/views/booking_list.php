  <div class="row" id="reserva01">
    <div class="col-md-12">
      <div class="panel minimal minimal-gray">
        <div class="panel-heading headerbar" style="margin-top:0px;">
          <h1 style="margin-bottom:2px;"><?php echo lang('booking_list'); ?></h1>
        </div>
        <div class="panel-body">
          <table class="table table-bordered datatable data_table">
              <thead>
                <tr>
                  <th><?php echo lang('reference'); ?></th>
                  <th><?php echo lang('name'); ?></th>
                  <th><?php echo lang('date'); ?></th>
                  <th><?php echo lang('hour'); ?></th>
                  <th style="width: 10%;"><?php echo lang('from'); ?></th>
                  <th style="width: 10%;"><?php echo lang('to'); ?></th>
                  <th><?php echo lang('price'); ?></th>
                  <th><?php echo lang('passengers'); ?></th>
                  <th style="width: 15%;"><?php echo lang('payment_method'); ?></th>
                  <th style="width: 25%;"><?php echo lang('options'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($booking_array as $book) {
                  $clients = false;
                  $arr = array('Barcelona Airport Terminal 1', 'Barcelona Airport Terminal 2');
                  if($book['client_id'])
                    $clients = true;
                  else
                    $json = json_decode($book['client_array'],true);

                  $address = $book['mainaddress'] != '' && $book['mainaddress'] != null ? $book['mainaddress'] : $book['col_address'];
                  
                  $start_from = (in_array($book['start_from'], $arr))?$book['start_from']:$book['name'].' - '.$address;
                  $end_at = (in_array($book['end_at'], $arr))?$book['end_at']:$book['name'].' - '.$address;
                  if($book['bcnarea_address_id'] != '' && $book['bcnarea_address_id'] != '0') {
                    if(!in_array($book['start_from'], $arr))
                      $book['book_address'];
                    if(!in_array($book['end_at'], $arr))
                      $end_at = $book['book_address'];
                  }

                ?>
                  <tr>
                    <td style="color:#F27D00;"><?php 
                    if ($book['version'] == 1) {
                      echo 'SHT-'.date('dmY',strtotime($book['start_journey'])).'-'.sprintf("%02d", $book['round_trip'] == 1?$res[$book['id']]:$book['id']);
                    } else {
                      echo $book['reference_id'].'-'.sprintf("%02d", $book['round_trip'] == 1?$res[$book['id']]:$book['id']); 
                    }
                    ?></td>
                    <td><?php echo $clients?$book['first_name'].' '.$book['surname']:$json['name'].' '.$json['surname']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($book['start_journey'])); ?></td>
                    <td><?php echo date('H:i', strtotime($book['hour'])).'h'; ?></td>
                    <td><?php 
                    if ($book['version'] == 1) {
                      echo $book['start_from']; 
                    } else {
                      echo (in_array($book['start_from'], $arr))?$book['start_from']:$book['name'].' - '.$address; 
                    }
                    ?></td>
                    <td><?php 
                    if ($book['version'] == 1) {
                      echo $book['end_at']; 
                    } else {
                      echo (in_array($book['end_at'], $arr))?$book['end_at']:$book['name'].' - '.$address; 
                    }
                    ?></td>
                    <td><?php echo $book['price']; ?></td>
                    <td><?php echo $book['adults'] + $book['kids']; ?></td>
                    <td><?php 
                      if($book['book_status'] == 'completed' || $book['book_status'] == 'pending')
                        echo lang('online');
                      else if($book['book_status'] == 'cash')
                        echo lang('cash_payment');
                      else if($book['book_status'] == 'paid')
                        echo lang('pre_paid');

                     ?></td>
                    <td>
                      <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/shuttles/view/' . $book['id']); ?>">
                        <i class="entypo-eye"></i>
                      </a>
                      <a class="btn btn-primary edit btn-sm" href="<?php echo site_url('admin/shuttles/form/' . $book['id']); ?>">
                        <i class="entypo-pencil"></i>
                      </a>
                      <a class="btn btn-info btn-sm" href="javascript:void(0);" style="<?php echo $book['journey_completed'] == 1?'background-color: rgb(109, 224, 109) !important;border-color: rgb(109, 224, 109) !important;':'background-color: #e5900f !important;border-color: #e5900f !important;'; ?>">
                        <i class="entypo-check"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/shuttles/delete/' .$book['id']); ?>" onclick="return confirm('<?php echo lang('delete_record_warning'); ?>');" >
                        <i class="entypo-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>  
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
