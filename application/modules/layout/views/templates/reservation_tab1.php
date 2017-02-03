<div class="tab-pane active" id="firstStep">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row">
            <a href="#" class="active" id="jsRoundTrip">
              <div class="col-xs-6 tabone">
                ROUND TRIP
              </div>
            </a>
            <a href="#" id="jsSingleTrip">
              <div class="col-xs-6 tabone">
                ONE WAY
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
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label><?php echo lang('start_trip'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <?php 
                      echo form_dropdown('start_from1', $start_from, null, 'class="form-control validate[required] book-select" onchange="addPlaceInput(this);"  data-errormessage-value-missing="'.lang('require_field').'"'); 
                      echo  form_input(array('name'=>'zone', 'id'=>'zone', 'type'=>'hidden'));
                      echo  form_input(array('name'=>'collaborators_id', 'id'=>'collaborators_id', 'type'=>'hidden'));
                      echo  form_input(array('name'=>'collaborator_address_id', 'id'=>'collaborator_address_id', 'type'=>'hidden'));
                      echo  form_input(array('name'=>'bcnarea_address_id', 'id'=>'bcnarea_address_id', 'type'=>'hidden'));
                    ?>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form" id="start_journey_div">
                    <input type="text" class="form-control validate[required]" name="start_from" id="autoCompletePlace" placeholder="<?php echo lang('from'); ?>"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
                  </div>
                  <div class="form-group col-sm-2 clear-pad-form" id="postal_div">
                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="<?php echo lang('postal_code'); ?>"  data-errormessage-value-missing="<?php echo lang('require_field')?>">
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form jsStartJourney">
                     <?php echo form_input(array('name'=>'start_journey', 'id'=>'date1', 'placeholder'=>lang('landing_time'), 'class'=>'form-control zd-25 validate[required, funcCall[validHumanDate]]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label><?php echo lang('end_trip'); ?></label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form" id="return_journey_div">
                    <?php echo form_dropdown('end_at', $terminal_array, null, 'class="form-control validate[required] book-select" id="end_at" data-errormessage-value-missing="'.lang('require_field').'"'); ?>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form jsReturnJourney">
                   <?php echo form_input(array('name'=>'return_journey', 'id'=>'date2', 'placeholder'=>lang('flight_time'), 'class'=>'form-control zd-23 validate[required, funcCall[validHumanDate]]', 'data-errormessage-value-missing'=>lang('require_field'))); ?>
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label>people:</label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <?php echo form_dropdown('adults', $adults, null, 'class="form-control validate[required] book-select"  data-errormessage-value-missing="'.lang('require_field').'"'); ?>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <?php echo form_dropdown('kids', $kids, null, 'class="form-control book-select"'); ?>
                  </div>
                </div>
                <button type="button" class="btn" style="float:right" id="firstbutton">BOOK NOW</button>
              </form>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>