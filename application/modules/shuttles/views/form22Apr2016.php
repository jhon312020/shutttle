<style>
.control-label{
	text-align:left !important;
}
.custom-combobox{
	width:100%;
}
td{
	border:none !important;
	line-height: 1.42857;
	padding-bottom:5px;
	vertical-align: top;
	font-size:12px !important;
}
.well {
	border:1px dotted #88758d;
	padding: 19px;
	margin-bottom: 20px;
}
body {
	font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
	line-height: normal;
	font-size: 12px;
	color: #58385f;
}
</style>
<?php
$extra_array = json_decode($bookings['extra_array'], true);	
?>
<div class="row">
	<?php 
	echo $this->layout->load_view('layout/alerts'); 
	foreach($error as $er){
	?>	
	<div class="alert alert-danger"><?php echo $er; ?></div>
	<?php	
	}
	?>

</div>
<form method="post" class="form-horizontal">
	<div class="row" id="reserva01">
		<div class="col-md-12">
			<?php /*<div class="panel minimal minimal-gray">
				<div class="panel-heading headerbar" style="margin-top:0px;">
					<h1 style="margin-bottom:2px;">Booking Information</h1>
					<?php 
						
						echo '<span style="color:#F27D00;font-size:18px;">';
						echo lang('no_es').' Reference: '. $calendars['reference_id'].' - '.$this->mdl_shuttles->form_value('id');
						echo '</span>';
						echo form_input(array('name'=>'zone', 'value'=>$this->mdl_shuttles->form_value('zone'), 'type'=>'hidden', 'id'=>'zone'));
					?>
				</div>
				<div class="panel-body">
					<!--<div class="form-group">
						<label class="col-sm-3 control-label pull-left"><?php echo lang('from'); ?>: </label>
						<div class="col-sm-9">
							<?php echo form_dropdown('start_from1', $start_from, $this->mdl_shuttles->form_value('start_from1'), 'class="form-control" onchange="addPlaceInput(this);" id="startFromDropDown"');?>
						</div>
					</div>-->
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('from'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo $start_from1; ?></span>: </label>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('date_go'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo Date('d/m/Y', strtotime($this->mdl_shuttles->form_value('start_journey'))); ?></span>: </label>
					</div>
					<?php if(isset($return_booking)) { ?>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('date_back'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo Date('d/m/Y', strtotime($return_booking['return_journey'])); ?></span>: </label>
					</div>	
					<?php } ?>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('country'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo  $this->mdl_shuttles->form_value('country'); ?></span>: </label>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('flight_no'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo  $this->mdl_shuttles->form_value('flight_no'); ?></span>: </label>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('hour'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo  $this->mdl_shuttles->form_value('hour'); ?></span>: </label>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label"><span style="color: #F27D00;"><?php echo lang('kids'); ?></span>:&nbsp;&nbsp;&nbsp;<span><?php echo  $this->mdl_shuttles->form_value('kids'); ?></span>: </label>
					</div>
					<?php
					$extra_array = json_decode($this->mdl_shuttles->form_value('extra_array'), true);
					if(count($extra_array) > 0){
					?>					
					<div class="headerbar">
						<h1 style="color:#D383A3;">Extras</h1><hr/>
					</div>
					<?php
					foreach($extra_array as $extra){
					?>
					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo $extra['extra_name']; ?>: </label>
						<div class="col-sm-9">
							<?php echo form_input('ex_luggage', $extra['extra_count'], 'class="form-control"');?>
						</div>
					</div>
					<?php
					}
					}
					?>
					<hr/>
					<div class="headerbar">
						<?php echo form_hidden('price', $this->mdl_shuttles->form_value('price')); ?>
						<h1>Price<span class="pull-right" style="font-weight:normal;" id="price-display"><?php echo $this->mdl_shuttles->form_value('price'); ?> &euro;</span></h1>
					</div>
				</div>
			</div>
			*/?>
		<table class="well" style="margin:0px!important; padding:0px!important;width:100%;">
			<tbody>
				<tr style="width:100%;margin:0px!important;padding:0px!important;">
					<td style="width:40%;padding-top:15px;">
						<span style="font-size:15px;padding-left:10px;color:#f58847;"><?php echo lang('no_reference'); ?></span><br>
						<span style="font-size:15px;color:#58385f;padding-left:10px;font-weight:bold;"><?php echo $book_reference; ?></span>
					</td>
					<!-- <td style="width:25%;padding-top:15px;">
						
						<span><?php echo lang('thanks_booking'); ?></span>
					</td>
					<td style="width:35%;padding-right:10px;padding-top:15px;">
						<p><?php echo lang('print_booking'); ?>
						<button type="button" class="btn btn-primary btn-md print" style="float:right;background-color:#391B38;color:#fff;" onClick="Function();">
							<span class="glyphicon glyphicon-print"></span> Print
						</button></p>
					</td>-->
				</tr>
			</tbody>
		</table>
		<table style=" padding:0px !important;margin:-3px !important;width:100%;">
			<tr>
				<td style="padding-right:10px !important; width:50% !important;padding-top:10px;">
					<?php if($bookings['book_role'] == 2){ ?>
					<div class="well" style="margin:0px !important; padding-top:10px !important;">
						<table  style="width:100%;">
							<thead>
								<tr>
									<td style="font-size: 14px !important;color:#f18545;"><?php echo lang('collaborator_name'); ?></td>
									<td style="font-size: 15px !important;text-align:right; padding-right:15px;font-weight:bold;"><?php echo $bookings['collaborator_name']; ?></td>
								</tr>
							</thead>
						</table>
					</div>
					<?php } ?>
					<div class="well" style="margin:0px!important;padding:10px !important;<?php echo ($bookings['book_role'] == 2)?'margin-top:15px!important;':''; ?>">
						<table style="width:100%;">
							<thead>
								<tr>
									<td colspan=4 style="margin:10px!important; padding:0px !important;padding-bottom:15px !important;font-size:15px !important;border-bottom: 1px dotted #f18545 !important;color:#f18545;"><?php echo lang('booking_information'); ?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="padding-top:15px;color:#f18545;"><?php echo lang('from'); ?>:</td>
									<td style="padding-top:15px;" colspan=3><?php echo $bookings['start_from']; ?></td>
								</tr>
								<tr>
									<td style="color:#f18545;"><?php echo lang('to'); ?>:</td>
									<td colspan=3><?php echo $bookings['end_at']; ?></td>
								</tr>
								<tr>
									<td style="color:#f18545;"><?php echo lang('date_go'); ?>:</td>
									<td><?php echo Date('d/m/Y', strtotime($bookings['start_journey'])); ?></td>
									<td style="color:#f18545;"><?php echo lang('hour_go'); ?>:</td>
									<td><?php echo Date('H:i', strtotime($bookings['hour'])).'h'; ?></td>
								</tr>
								<?php
								if(isset($return_bookings)){
								?>
								<tr>
									<td style="color:#f18545;"><?php echo lang('date_back'); ?></td>
									<td><?php echo Date('d/m/Y', strtotime($return_bookings['start_journey'])); ?></td>
									<td style="color:#f18545;"><?php echo lang('hour_back'); ?>:</td>
									<td><?php echo Date('H:i', strtotime($return_bookings['hour'])).'h'; ?></td>
								</tr>
								<?php } ?>
								<tr>
									<td style="color:#f18545;"><?php echo lang('country'); ?>:</td>
									<td><?php echo $countries[$bookings['country']]; ?></td>
									<td style="color:#f18545;"><?php echo lang('flight_no'); ?>:</td>
									<td><?php echo $bookings['flight_no']; ?></td>
								</tr>
								<tr>
									<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #f18545!important;color:#f18545;"><?php echo lang('adults'); ?>:</td>
									<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #f18545!important;"><?php echo $bookings['adults']; ?></td>
									<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #f18545!important;color:#f18545;"><?php echo lang('kids'); ?>:</td>
									<td style="padding-bottom: 10px !important; border-bottom: 1px dotted #f18545!important;"><?php echo $bookings['kids']; ?></td>
								</tr>
								<tr>
									<td style="color:#f18545;padding-top:10px;"><?php echo lang('passengers'); ?>:</td>
									<td style="padding-top:10px;"></td>
									<td style="padding-top:10px;"></td>
									<td style="padding-top:10px;"><?php echo $bookings['passenger_price']; ?>&euro;</td>
								</tr>
								<!-- <tr>
									<td style="color:#f18545;"><?php //echo lang('baby'); ?>:</td>
									<td colspan=3><?php //echo $bookings['baby']; ?></td>
								</tr> -->
							</tbody>
						</table>
					</div>
					<div class="well" style="margin:0px!important; margin-top:15px !important;padding:10px !important;">
						<table class="table" style="width:100%;">
							<thead>
								<tr>
									<td style="padding-bottom: 10px !important; font-size: 15px !important; border-bottom: 1px dotted #f18545!important; color:#f18545;">Extras</td>
									<td style="padding-bottom: 10px; font-size: 15px!important; border-bottom: 1px dotted #f18545 !important;font-weight:bold;"></td>
									<td style="padding-bottom: 10px;padding-right:25px; font-size: 15px!important; border-bottom: 1px dotted #f18545 !important;font-weight:bold;"><span style="float:right;"><?php echo (count($extra_array) > 0)?lang('yes'):lang('no'); ?></span></td>
								</tr>
							</thead>
							<tbody>
								<?php
								$count=1;
								if(count($extra_array) > 0){
									foreach($extra_array as $ex){
								?>
								<tr>
									<td style="<?php echo ($count == 1)?'padding-top:15px;':''; ?>color:#f18545;"><?php echo $ex['extra_name']; ?>:</td>
									<td style="<?php echo ($count == 1)?'padding-top:15px;':''; ?>">* <?php echo $ex['extra_count']; ?></td>
									<td style="<?php echo ($count == 1)?'padding-top:15px;':''; ?>float:right;padding-right:25px;"><?php echo $ex['extra_value']; ?> &euro;</td>
								</tr>
								<?php
									$count++;
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<?php if($bookings['promotional_code_id']){ ?>
					<div class="well" style="margin:0px!important; margin-top:15px !important;padding:10px !important;">
						<table class="table" style="width:100%;">
							<thead>
								<tr>
									<td style="padding-bottom: 10px !important; font-size: 15px !important; border-bottom: 1px dotted #f18545!important; color:#f18545;"><?php echo lang('deduction'); ?></td>
									<td colspan="3" style="padding-bottom: 10px; font-size: 15px!important; border-bottom: 1px dotted #f18545 !important;font-weight:bold;"><?php echo lang('yes'); ?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="padding-top:15px;color:#f18545;"><?php echo ($bookings['promotional_type'] == 'price')?'Promotional code deduction price':'Promotional code deduction '.$bookings['promotional_value'].' %'; ?>:</td>
									<td style="padding-top:15px;padding-right:-15px;"><?php echo $bookings['reduction_value']; ?> &euro;</td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php } ?>
					<div class="well" style="margin:0px !important; margin-top:15px!important; padding-top:10px !important;">
						<table  style="width:100%;">
							<thead>
								<tr>
									<td style="font-size: 14px !important;color:#f18545;"><?php echo lang('price'); ?></td>
									<td style="font-size: 15px !important;text-align:right; padding-right:15px;font-weight:bold;"><?php echo $bookings['price']; ?> &euro;</td>
								</tr>
							</thead>
						</table>
					</div>
					<div class="well" style="margin:0px !important; margin-top:15px!important; padding-top:10px !important;">
						<table  style="width:100%;">
							<thead>
								<tr>
									<td style="font-size: 14px !important;color:#f18545;"><?php echo lang('payment_status'); ?></td>
									<td style="font-size: 15px !important;text-align:right; padding-right:15px;font-weight:bold;">
									<?php
										if($bookings['book_status'] == 'completed')
											echo lang('completed');
										else if($bookings['book_status'] == 'pending')
											echo lang('pending'); 
										else if($bookings['book_status'] == 'cash')
											echo lang('cash_payment');
										else if($bookings['book_status'] == 'paid')
											echo lang('pre_paid');
									?>
									
									</td>
								</tr>
							</thead>
						</table>
					</div>
				</td>
				<td style="padding-top:10px;">
						<div class="well" style="margin:0px !important;padding:10px !important;">
							<table style="width:100%;" id="displayClient">
								<thead>
									<tr>
										<td colspan=2 style="margin:10px!important; padding:0px !important;padding-bottom:15px !important;font-size:15px !important;border-bottom: 1px dotted #f18545 !important;color:#f18545;"><?php echo lang('personal_information'); ?>
										<?php if(!isset($edit)) { ?>
											<a class="btn btn-primary edit btn-sm" href="javascript:void(0);" style="float:right;padding:1px 4px;" onClick="showClient();">
												<i class="entypo-pencil"></i>
											</a>
										<?php } ?>
										</td>
										
									</tr>
								</thead>
								<tbody>
									<?php
										$key = array('name', 'surname', 'email', 'phone', 'address', 'postcode', 'country', 'city', 'nationality', 'id_or_passport', 'number_of_document');
										$i=0;
										foreach($clients as $ckey=>$cvalue){
										?>
										<tr>
											<td style="<?php echo ($i == 0)?'padding-top:15px;':''; ?>color:#f18545;"><?php $lang_key = $key[$i]; echo lang($key[$i]); ?>:</td>
											<td style="<?php echo ($i == 0)?'padding-top:15px;':''; ?>"><?php echo ($ckey == 'dni_passport')?lang('dni_'.$cvalue):$cvalue; ?></td>
										</tr>
										<?php
										$i++;
										}
									?>
								</tbody>
							</table>
				<fieldset id="editClient" style="display:none;">
                <legend><?php echo lang('account_information'); ?></legend>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('name'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $this->mdl_clients->form_value('name'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('surname'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $this->mdl_clients->form_value('surname'); ?>">
                    </div>
					</div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('email_address'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $this->mdl_clients->form_value('email'); ?>">
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('phone'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $this->mdl_clients->form_value('phone'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('address'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $this->mdl_clients->form_value('address'); ?>">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('cp'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $this->mdl_clients->form_value('cp'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('country'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="country" id="country" value="<?php echo $this->mdl_clients->form_value('country'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('city'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="city" id="city" value="<?php echo $this->mdl_clients->form_value('city'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('nationality'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $this->mdl_clients->form_value('nationality'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('dni_passport'); ?>: </label>
                    <div class="col-sm-5">
                        <select name="dni_passport" id="dni_passport" class="form-control" >
							<?php
							$pass = array('id'=>lang('dni_id'), 'passport'=>lang('dni_passport'));
							foreach($pass as $key=>$value){
								echo '<option value="'.$key.'" '.(($key==$this->mdl_clients->form_value('name'))?"selected":"").'>'.$value.'</option>';
							}
							?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo lang('doc_no'); ?>: </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="doc_no" id="doc_no" value="<?php echo $this->mdl_clients->form_value('doc_no'); ?>">
                    </div>
                </div>
				<?php /*if($user_array) { ?>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo lang('password'); ?>: </label>
					<div class="col-sm-5">
						<?php echo form_input(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'type'=>'password', 'value'=>$this->mdl_clients->form_value('password'), 'style'=>'padding-right:30px;', 'autocomplete'=>"off")); ?>
						<span style="position: relative; cursor: pointer; float: right; top: -22px; left: -5px;" class="glyphicon glyphicon-eye-open showpassword"></span>
					</div>
				</div>
				<?php } */ ?>
            </fieldset>
						</div>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<div id="saveButtons" style="display:none;">
		<div class="pull-right">
			<button class="btn btn-primary" name="btn_submit" value="1"><i class="icon-ok icon-white"></i> Save</button>
			<input type="button" class="btn btn-danger cancelButton" name="cancel" value="Cancel">
		</div>	
	</div>
	<div id="printButton">
		<div class="pull-right">
			<a href="javascript:void(0);" class="btn btn-primary btn-md print" style="float:right;background-color:#391B38;color:#fff;" onClick="Function();">
				<span class="glyphicon glyphicon-print"></span> Print
			</a>
		</div>	
	</div>
</form>
<script type="text/javascript">
$('.showpassword').click(function(){
	if($(this).hasClass('glyphicon-eye-open')){
		$(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
		$('#password').attr('type', 'text');
	}
	else{
		$(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
		$('#password').attr('type', 'password');
	}
});
function showClient(){
	$('#editClient').show();
	$('#displayClient').hide();
	$('#saveButtons').show();
	$('#printButton').hide();
}
$('.cancelButton').click(function(){
	$('#saveButtons').hide();
	$('#printButton').show();	
	$('#editClient').hide();
	$('#displayClient').show();
});
if($('.alert-danger').length != 0){
	$('#editClient').show();
	$('#displayClient').hide();
	$('#saveButtons').show();
	$('#printButton').hide();
}
function Function(){
	var e = $('#reserva01').clone();
	$('button#saveButtons', e).remove();
	$('button#printButton', e).remove();
	$('fieldset', e).remove();
	
	var content = e.html();
	var printWindow = window.open('', '', 'height=400,width=800');
		printWindow.document.write('<html><head><title>DIV Contents</title>');
			   printWindow.document.write('<style>'+
	'td{'+
		'border:none !important;'+
		'padding-bottom:5px;'+
		'line-height: 1.42857;'+
		'vertical-align: top;'+
		'font-size:12px !important;'+
	'}'+
	'.well {'+
		'border:1px dotted #88758d;'+
		'padding: 19px;'+
		'margin-bottom: 20px;'+
	'}'+
	'body {'+
		'font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;'+
		'line-height: normal;'+
		'font-size: 12px;'+
		'color: #58385f;'+
	'}'+
'</style>')

		printWindow.document.write('</head><body>');
		printWindow.document.write(content);
		
		printWindow.document.write('</body></html>');
		printWindow.document.close();
		
		
		printWindow.document.close();
		printWindow.print();
}
</script>
