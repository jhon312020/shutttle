<style>
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
</style>
<div class="tab-pane jsTabPane active" id="firstStep">
  <div class="tabbable-panel circle-show">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="active stepClick circleone" data-class="firstStep"><span class="step">1</span>
					<a href="#firstStep">
					<?php echo lang('choose_your_route'); ?></a>
				</li>
			</ul>
		</div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row">
            <a href="#" class="active" id="jsRoundTrip">
              <div class="col-xs-6 tabone">
                <?php echo lang('round_trip'); ?>
              </div>
            </a>
            <a href="#" id="jsSingleTrip">
              <div class="col-xs-6 tabone">
                <?php echo lang('one_way'); ?>
              </div>
            </a>
          </div>
        </div>
        <p class='jsRoundTripMessage' style='text-align:center;'>* <?php echo lang('trip_alert');?> </p>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 clear-pad-RL">
              <form id="firstStepForm" action="" method="post" role="form" style="display: block;" class="validateForm">
                <input type="hidden" name="mode" value="firstStep">
                <input type="hidden" name="hours" value="00">
                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                <input type="hidden" name="minutes" value="00">
                <input type="hidden" name="return_hours" value="23">
                <input type="hidden" name="return_minutes" value="00">
                <input type="hidden" name="country" value="India">
                <input type="hidden" name="vehicle_id" id="vehicle_id" value="0">
                <!--<input type="hidden" name="flight_no" value="00">-->
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1" style="padding-top: 10px;"><?php echo lang('Where'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form" id="start_journey_div">
                    <?php 
                      echo  form_input(array('name'=>'zone', 'id'=>'zone', 'type'=>'hidden'));
                      if ($this->details['collaborator_details']) {
                        echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden', 'value'=>$this->details['collaborator_details']['id']));
                      } else {
                        echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden'));  
                      }
                      
                      echo  form_input(array('name'=>'collaborator_address_id', 'id'=>'collaborator_address_id', 'type'=>'hidden'));
                      echo  form_input(array('name'=>'bcnarea_address_id', 'id'=>'bcnarea_address_id', 'type'=>'hidden'));
                    ?>
                    <input type="hidden" id="from_location_id" name="from_location_id" />
                    <input type="text" id="from_location" name="from_location" class="form-control validate[required]" placeholder="<?php echo lang('from'); ?>" />
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form" id="return_journey_div">
                    <input type="hidden" id="to_location_id" name="to_location_id" />
                    <input type="text" id="to_location" name="to_location" class="form-control validate[required]" placeholder="<?php echo lang('to'); ?>" />
                  </div>
                  <div class="form-group col-sm-5 clear-pad-form" id="return_journey_div">
                    <input type="text" id="location_address" name="location_address" class="form-control" placeholder="<?php echo lang('Address, Hotel, Location'); ?>…" />
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1" style="padding-top: 10px;"><?php echo lang('When'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form jsStartJourney">
                     <?php echo form_input(array('name'=>'start_journey', 'id'=>'date1', 'placeholder'=>lang('Day Go'), 'class'=>'form-control zd-25 validate[required]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -28px; left: -5px;color:white;" ><i class="fa fa-calendar" onClick="$('#date1').focus();"></i></span>
                  </div>
                  <div class="jsReturnJourney">
                    <div class="form-group col-sm-3 clear-pad-form">
                     <?php echo form_input(array('name'=>'return_journey', 'id'=>'date2', 'placeholder'=>lang('Day Back'), 'class'=>'form-control zd-23 validate[required, funcCall[validHumanDate]]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -28px; left: -5px;color:white;" ><i class="fa fa-calendar" onClick="$('#date2').focus();"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1" style="padding-top: 10px;"><?php echo lang('people'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                  <div class="input-group spinner">
                    <input type="text" id="adults" name="adults" class="form-control validate[required, min[1]]" value="1" min="1" >
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                    <?php //echo form_dropdown('adults', $adults, null, 'class="form-control validate[required] book-select"  data-errormessage-value-missing="'.lang('require_field').'"'); ?>
                    
                  </div>
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1" style="padding-top: 10px;"><?php echo lang('flight_no'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <?php echo form_input(array('name'=>'flight_no', 'id'=>'flight_no', 'placeholder'=>lang('flight_no'), 'class'=>'form-control zd-23', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                  </div>
                </div>
                <div class="row row-eq-height vert-align">
                  <div class="col-sm-9">
                    <div class="formErrorArrow formErrorArrowBottom" id="firstPageError">
                      <span>* </span>
                      <span class="formErrorContent">
                          
                      </span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <button type="button" class="btn" style="float:right;font-size: 26px;" id="firstbutton"><?php echo lang('book_now'); ?></button>
                  </div>
                </div>
              </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>