<style>
a:hover {
  text-decoration: none;
}
a.active {
  font-weight: bold;
  font-size:16px;
}
.active {
  height: auto;
}
.ui-autocomplete {
  padding-left:10px !important;
}
</style>
<style>
/* Spinner input */ 
.spinner .form-control {
  position: absolute;
  z-index: 0;
}
.input-group-btn-vertical {
  position: relative;
  white-space: nowrap;
  width: 1%;
  vertical-align: middle;
  display: table-cell;
  height: 45px;
  padding-right: 5px;
}
.input-group-btn-vertical > .btn:hover {
  background: none;
}
.input-group-btn-vertical > .btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%;
  padding: 8px;
  margin-left: -1px;
  position: relative;
  border-radius: 0;
  height:22.5px;
  border:none;
  background: none;
}
.input-group-btn-vertical > .btn:last-child {
  margin-top: -2px;
}
.input-group-btn-vertical i{
  position: absolute;
  top: 0;
  left: 4px;
}
.formErrorContent {
  color:red;
}
</style>
<form action="<?php echo site_url($lang).'/reservation'; ?>" method="post" id="firstStepForm" class="validateForm">
  <div class="row">
    <div id="firstPageError" class="col-md-12"><div class="formErrorContent" style="padding-left:5px;"></div></div>
    <div class="col-md-12">
      <div class="col-md-6 col-pad-0">
        <div class="col-md-4">
          <?php
            if ($this->details['collaborator_details']) {
              echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden', 'value'=>$this->details['collaborator_details']['id']));
            } else {
              echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden'));  
            }
          ?>
          <input type="hidden" id="from_location_id" name="from_location_id" />
          <input type="hidden"  name="mode" value="firstStep" />
          <input type="text" id="from_location" name="from_location" class="form-control validate[required]" placeholder="<?php echo lang('from'); ?>" data-errormessage-value-missing="<?php echo lang('require_field'); ?>" />
        </div>
        <div class="col-md-4">
          <input type="hidden" id="to_location_id" name="to_location_id" />
          <input type="text" id="to_location" name="to_location" class="form-control validate[required]" placeholder="<?php echo lang('to'); ?>" data-errormessage-value-missing="<?php echo lang('require_field'); ?>" />
        </div>
        <div class="col-md-4">
        <input type="text" id="location_address" name="location_address" class="form-control" placeholder="<?php echo lang('Address, Hotel, Location'); ?>…"  />
        </div>
      </div>
      <div class="col-md-6 col-pad-0">
        <div class="col-md-4" id="start_journey_div">
        <?php echo form_input(array('name'=>'start_journey', 'id'=>'date1', 'placeholder'=>lang('Day Go'), 'class'=>'form-control zd-25 validate[required]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -35px; left: -5px;color:#27357C;" ><i class="fa fa-calendar" onClick="$('#date1').focus();"></i></span>
        </div>
        <div class="col-md-4" id="return_journey_div">
          <?php echo form_input(array('name'=>'return_journey', 'id'=>'date2', 'placeholder'=>lang('Day Back'), 'class'=>'form-control zd-23 validate[required]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -35px; left: -5px;color:#27357C;" ><i class="fa fa-calendar" onClick="$('#date2').focus();"></i></span>
        </div>
        <div class="col-md-2">
          <div class="input-group spinner">
                    <input type="text" id="adults" name="adults" class="form-control validate[required, min[1]]" value="1" min="1" >
                    <div class="input-group-btn-vertical" >
                      <button class="btn btn-default" type="button" style="color:#27357C"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button" style="color:#27357C"><i class="fa fa-caret-down"></i></button>
                    </div>
          </div>
        </div>
        <div class="col-md-2">
          <?php echo form_input(array('name'=>'flight_no', 'id'=>'flight_no', 'placeholder'=>lang('flight_no_home'), 'class'=>'form-control zd-23', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4" >
      <div class="col-md-5" style="border-right:2px solid #27357C">
        <a href="javascript:;" class="active" id="jsRoundTrip" style="color:#27357C">
            <?php echo lang('round_trip'); ?>
        </a>
      </div>
      <div class="col-md-6" style="padding-left:20px" >
        <a href="javascript:;" id="jsOneWay" style="color:#27357C">
            <?php echo lang('one_way'); ?>
        </a>
      </div>
    </div>
    <div class="col-md-6 col-md-offset-1">
      <button type="button" class="btn" style="font-size: 20px;" id="firstbutton"><?php echo lang('book_now'); ?></button>
    </div>
  </div>
</form>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
input.form-control{
  margin-bottom:5px;
  border-color:white;
}
.col-md-2,.col-md-3,.col-md-4 {
  padding-left: 5px;
  padding-right: 5px;
}
.col-pad-0 {
 padding-left: 0px;
  padding-right: 0px; 
}
.form-control {
  background-color: white;
  color:#27357C;
}

input[type="text"]::-webkit-input-placeholder {
  color: #27357C !important;
}

input[type="text"]:-moz-placeholder { /* Firefox 18- */
  color: #27357C !important;
}

input[type="text"]::-moz-placeholder {  /* Firefox 19+ */
  color: #27357C !important;
}

input[type="text"]:-ms-input-placeholder {  
  color: #27357C !important;
}

button.btn {
  background-color: #27357C;
}
button.btn:hover {
  color:#27357C !important;
}
</style>