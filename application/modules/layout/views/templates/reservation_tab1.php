<style>
.active {
  height: auto;
}
.ui-autocomplete {
  padding-left:10px !important;
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
                    <label class="no-bold-step1"><?php echo lang('starts_or_ends'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form" id="start_journey_div">
                    <?php 
                      echo  form_input(array('name'=>'zone', 'id'=>'zone', 'type'=>'hidden'));
                      echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden'));
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
                    <input type="text" id="location_address" name="location_address" class="form-control" placeholder="Address, Hotel, Location…" />
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1"><?php echo str_replace(' ','<br>',lang('day_trip')); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form jsStartJourney">
                     <?php echo form_input(array('name'=>'start_journey', 'id'=>'date1', 'placeholder'=>lang('day_go'), 'class'=>'form-control zd-25 validate[required]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -28px; left: -5px;color:white;" ><i class="fa fa-calendar" onClick="$('#date1').focus();"></i></span>
                  </div>
                  <div class="jsReturnJourney">
                    <div class="form-group col-sm-3 clear-pad-form">
                     <?php echo form_input(array('name'=>'return_journey', 'id'=>'date2', 'placeholder'=>lang('day_back'), 'class'=>'form-control zd-23 validate[required, funcCall[validHumanDate]]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                     <span style="position: relative; cursor: pointer; float: right; top: -28px; left: -5px;color:white;" ><i class="fa fa-calendar" onClick="$('#date2').focus();"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label class="no-bold-step1" style="padding-top: 10px;"><?php echo lang('people'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <?php //echo form_dropdown('adults', $adults, null, 'class="form-control validate[required] book-select"  data-errormessage-value-missing="'.lang('require_field').'"'); ?>
                    <?php echo form_input(array('name'=>'adults', 'type'=>'number', 'min'=>1, 'id'=>'adults', 'value'=>1, 'class'=>'form-control validate[required] min[1]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
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