<div class="tab-pane jsTabPane" id="secondStep">
  <div class="tabbable-panel circle-show">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="stepClick disabled circletwo" data-class="secondStep"><span class="step">2</span>
							<a href="#secondStep">
							ROUTE SCHEDULE</a>
				</li>
			</ul>
		</div>
</div>
  <div id="secondStepLeft">
    <?php 
      $this->load->view('reservation_tab_common_left'); 
    ?>
  </div>
  <div class="col-sm-9 clear-pad-R Mob-pad-L">
			<form id="submitForm">
				<div class="panel pickbluebgtop">
					<div class="panel-heading pickbluebg"><?php echo lang('go_trip'); ?> </div> 
					<table class="table table-striped displayTable" id="startJourneyTable">
						<thead> 
							<tr>
								<th>&nbsp;</th>
								<th><?php echo lang('hour'); ?></th>
								<th><?php echo lang('source'); ?></th>
								<th><?php echo lang('designation'); ?></th>
								<th><?php echo lang('arrival_time'); ?></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table> 
				</div> 
				<div class="formErrorArrow formErrorArrowBottom" id="reserve_error" style="display:none;">
					<div class="formErrorContent"><?php echo lang('no_seats'); ?></div>
				</div>
				
				<div class="formErrorArrow formErrorArrowBottom" id="seats_error" style="display:none;">
					<div class="formErrorContent"><?php echo lang('seats_error'); ?></div>
				</div>
				<div class="panel" id="returnJourneyPanel" style="display:none;">  
					<div class="panel-heading pickbluebg"><?php echo lang('return_trip'); ?> </div> 
						<table class="table table-striped displayTable"  id="returnJourneyTable">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th><?php echo lang('hour'); ?></th>
									<th><?php echo lang('source'); ?></th>
									<th><?php echo lang('designation'); ?></th>
									<th><?php echo lang('arrival_time'); ?></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table> 
					</div> 
					<div class="formErrorArrow formErrorArrowBottom" id="return_reserve_error" style="display:none;">
						<div class="formErrorContent"><?php echo lang('no_seats'); ?></div>
					</div>
					
					<div class="formErrorArrow formErrorArrowBottom" id="return_seats_error" style="display:none;">
						<div class="formErrorContent"><?php echo lang('seats_error'); ?></div>
					</div>
				</form>
				<div class="pull-right">
					<button class="btn volver editpop"><?php echo lang('return'); ?></button>
					<button class="btn go goButton"><?php echo lang('next'); ?></button>
				</div>	
		</div>
</div>
						
