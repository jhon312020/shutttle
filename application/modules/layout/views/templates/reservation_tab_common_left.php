<div class="col-sm-3 mob-hide clear-pad-L" id="secondLeftStep">
			<p class="text-justify">
				<h4 style="font-weight:bold;color: #25387d;"><?php echo lang('summary'); ?> 
					<!-- <span data-toggle="modal" data-target="#myModal" class="pull-right orange editpop" style="cursor:pointer;text-transform:uppercase;"><?php //echo lang('edit'); ?></span> -->
				</h4> 
			</p>
			<?php
				$arrowDownClass = "";
				/*$leftSidebar = array(
					'source'=>'start_from',
					'designation'=>'end_at',
					'start_date'=>'start_journey',
					'flight_time'=>'flight_time',
					'end_date'=>'return_journey',
					'flightlanding_time'=>'flightlanding_time',
					'no_of_passengers'=>'adults',
					/*'country_origin'=>'country',
					'flight_no'=>'flight_no',
				);*/
				$leftSidebar = array(
					'from'=>'from_location_text',
					'to'=>'to_location_text',
					'trip_date'=>'trip_date_text',
					'trip_time'=>'departure_time_text',
					'return_date'=>'return_date_text',
					'return_time'=>'return_time_text',
					'no_of_passengers'=>'passengers_text'
					//'flight_no'=>'flight_no'
				);
				
				foreach ($leftSidebar as $key => $value) {
				?>
					<div class="<?php echo ($key == 'return_date' || $key == 'return_time')? 'jReturnDate':''; ?>">
            <span class="sumhead"><?php echo lang($key);?>: </span>
            <span class="duplicateList <?php echo $value; ?>"></span>
          </div>
				<?php		
				}
			?>
			<div class="jFlightNo">
	            <span class="sumhead"><?php echo lang('flight_no');?>: </span>
	            <span class="duplicateList flightNoValue"></span>
	        </div>
      <hr class="marginTB-10 orangeborder"> 
			<div class="resumen"><span class="sumhead"><?php echo lang('price'); ?>:</span>
				<span class="pull-right orange resumen"><span class="initialPrice">00.00</span> &euro;</span>
			</div>
			<div class="extras">
			</div>
			<p class="text-justify">
				<hr class="marginTB-10 orangeborder reduction" style="display:none;">
				<div class="resumen reduction" style="display:none;"><span class="sumhead"><?php echo lang('promotional_code'); ?>:</span> <span class="percentage_reduction"></span> <span class="pull-right orange resumen">
					<span class="price_reduction"></span> &euro;</span>
				</div>
			</p>
      <p class="text-justify">
				<hr class="marginTB-10 orangeborder">
				<h4 class="resumen">
        <span type="button" id="form-submit" class="btn-span pickbluebg paypalsubmit"><?php echo lang('total'); ?>: <span class="price_total">00.00</span> &euro;</span></span>
				</h4>
			</p>
		</div>

