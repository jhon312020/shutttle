<div class="tab-pane jsTabPane" id="secondStep">
  <div class="tabbable-panel circle-show">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="stepClick disabled circletwo" data-class="secondStep"><span class="step">2</span>
							<a href="#secondStep">
							SELECT YOUR CAR</a>
				</li>
			</ul>
		</div>
	</div>

	<div>
		<div class="panel pickbluebgtop border-2">
			<div class="panel-heading pickbluebg"><?php echo lang('reservation'); ?> </div>
			<div class="panel-body" style="font-size:14px !important;">
				<div class="col-md-3 trip_detail">
					<table>
						<tr><td><i class="fa fa-calendar icon-style"></i></td>
						<td>
							<b><?php echo lang('trip_date'); ?>:</b> <span class="trip_date_text"></span><br/>
							<p class="jReturnDate"><b><?php echo lang('return_date'); ?>:</b> <span class="return_date_text"></span></p>
						</td></tr>
					</table>
				</div>
				<div class="col-md-3 trip_detail">
					<table>
					<tr><td><i class="fa fa-clock-o icon-style"></i></td>
					<td>
					<b><?php echo lang('trip_time'); ?>:</b> <span class="departure_time_text"></span> hs.<br/>
					<p class="jReturnDate"><b><?php echo lang('return_time'); ?>:</b> <span class="return_time_text"></span> hs.</p>
					</td></tr>
					</table>
				</div>
				<div class="col-md-4 trip_detail">
					<table>
					<tr><td><i class="fa fa-map-signs icon-style"></i></td>
					<td>
					<b><?php echo lang('from'); ?>:</b> <span class="from_location_text"></span><br/>
					<b><?php echo lang('to'); ?>:</b> <span class="to_location_text"></span>
					</td></tr>
					</table>
				</div>
				<div class="col-md-2 trip_detail">
					<table>
					<tr><td><i class="fa fa-user-o icon-style"></i></td>
					<td>
					<p style="margin-top:10px;"><b><?php echo lang('passengers'); ?>:</b> <span class="passengers_text"></span></p>
					</td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div id="vehicle_list">

	</div>
</div>
<style>
	.panel-body {
		font-size: 13px;
	}
	#vehicle_list td {
		padding: 5px;
		font-size: 13px;
	}
	.icon-style {
		color: #EA5B55;
    padding: 5px;
    font-size: 25px !important;
	}
	.trip_detail td{
		padding-left:0px !important;
		padding-right:0px !important;
		font-size: 13px !important;
	}
	.extras_div {
		display: none;
		border-top:1px solid #25377d;
		padding: 10px;
		margin-top:10px;
	}
	.amount_text {
		color: #EA5B55;
    font-size: 40px;
    font-weight: bold;
    line-height: 1;
	}
	.vehicle_title {
		color:#EA5B55;
		font-size: 20px;
	}
	.car_part2 td {
		padding-top: 10px !important;
		padding-bottom: 10px !important;
	}
	.border-2{
		border:2px solid #25377d;
	}
	.secondStepClick {
		width:100px;font-size:13px;padding:0px;height:30px;
	}
@media (min-width: 1199px){
	.circleone {
	    padding-left: 4%;
	    padding-right: 4.5%;
	}
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />