<div class="col-sm-3 mob-hide" id="secondLeftStep">
			<p class="text-justify">
				<h4 style="font-weight:bold;color: #25387d;"><?php echo lang('summary'); ?> 
					<!-- <span data-toggle="modal" data-target="#myModal" class="pull-right orange editpop" style="cursor:pointer;text-transform:uppercase;"><?php //echo lang('edit'); ?></span> -->
				</h4> 
			</p>
			<?php
				$arrowDownClass = "";
				$leftSidebar = array(
					'source'=>'start_from',
					'designation'=>'end_at',
					'start_date'=>'start_journey',
					'end_date'=>'return_journey',
					'no_of_passengers'=>'adults',
					'country_origin'=>'country',
					'flight_no'=>'flight_no',
					'flight_time'=>'flight_time',
					'flightlanding_time'=>'flightlanding_time',
				);
				foreach ($leftSidebar as $key => $value) {
				?>
					<div>
            <span class="sumhead"><?php echo lang($key);?>: </span>
            <span class="duplicateList" style='color: #25387d;' data-id="<?php echo $value; ?>"></span>
          </div>
				<?php		
				}
			?>
			
			<div style="padding-top:15px;"> 
				<button type="button" id="form-submit" class="btn btn-lg pickbluebg paypalsubmit"><?php echo lang('price'); ?>: <span class="initialPrice">00.00</span> &euro;</span></button>
			</div>
			<div class="extras">
			</div>
			<p class="text-justify">
				<hr class="marginTB-10 orangeborder reduction" style="display:none;">
				<h4 class="resumen reduction" style="display:none;">Promotional code <span id="percentage_reduction"></span> <span class="pull-right orange resumen">
					<span id="price_reduction"></span> &euro;</span>
				</h4>
			</p>
		</div>

