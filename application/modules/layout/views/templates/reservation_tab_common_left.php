<?php
	//echo $lang;
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	//echo $ln;die;
	if(!$ln || $ln == ""){	$ln = "es"; }
?>
<div class="col-sm-3 mob-hide" id="secondLeftStep">
			<p class="text-justify">
				<H4 class="resumen" style='text-transform:uppercase;'><?php echo lang('summary'); ?> 
					<span data-toggle="modal" data-target="#myModal" class="pull-right orange editpop" style="cursor:pointer;text-transform:uppercase;"><?php echo lang('edit'); ?></span>
				</H4> 
				<hr class="marginTB-10 orangeborder">
			</p>
			<?php
				$arrowDownClass = "<span class='pull-right glyphicon glyphicon-chevron-down orange'></span>";
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
					<h4 style='text-transform:uppercase;'><?php echo lang($key).' '.$arrowDownClass ?></h4>
					<p class="duplicateList" style='text-transform:uppercase;' data-id="<?php echo $value; ?>"></p>
				<?php		
				}
			?>
			
			<hr class="marginTB-10 orangeborder"> 
			<H4 class="resumen" style="text-transform:uppercase;"><?php echo lang('price'); ?> 
				<span class="pull-right orange resumen"><span id="initialPrice">0</span> &euro;</span>
			</H4>
			<div class="extras">
			</div>
			<p class="text-justify">
				<hr class="marginTB-10 orangeborder reduction" style="display:none;">
				<H4 class="resumen reduction" style="display:none;">Promotional code <span id="percentage_reduction"></span> <span class="pull-right orange resumen">
					<span id="price_reduction"></span> &euro;</span>
				</H4>
			</p>
			<p class="text-justify">
				<hr class="marginTB-10 orangeborder">
				<H4 class="resumen"><?php echo lang('total'); ?> <span class="pull-right orange resumen">
					<span id="price_total">0</span> &euro;</span>
				</H4>
			</p>
		</div>

