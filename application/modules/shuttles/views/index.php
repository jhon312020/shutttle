<style type="text/css">
	.datepicker1 {
		text-align: left !important;
	}
	.dataTables_filter > label {
		float: left !important;
	    position: relative;
	    left: -11px;
	}
	.date-input {
		height: 31px;
	    padding: 6px 12px;
	    font-size: 12px;
	    line-height: 1.42857143;
	    color: #555555;
	    background-color: #ffffff;
	    background-image: none;
	    border: 1px solid #ebebeb;
	    border-radius: 3px;
	}
</style>
<!-- <ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard'); ?>"><i class="entypo-home"></i><?php echo lang('home'); ?></a>
	</li>
	<li class="active">
		<strong><?php echo lang('shuttles'); ?></strong>
	</li>
</ol> -->
<div class="headerbar">
	<div class="clearfix">
		<h1 class="pull-left"><?php echo (isset($page_title))? lang($page_title):lang('booking_list'); ?></h1>
		<?php if (isset($show_pending_button) && $show_pending_button) { ?>
			<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/shuttles/pendings'); ?>">
				<i class="icon-plus icon-white"></i> <?php echo lang('pendings'); ?>
			</a>
		<?php } else { ?>
			<a class="btn btn-primary pull-right" href="<?php echo site_url('admin/shuttles/index'); ?>">
				<i class="icon-plus icon-white"></i> <?php echo lang('booking_list'); ?>
			</a>
		<?php } ?>
		<div id="dateSearch">			
			<form method="POST" id="dateRange" style="float: right;">
			<!--<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>-->
				<label>
					Select Date:
					
						<?php echo form_input('from_date', $fromDate != '' ?Date('d/m/Y', strtotime($fromDate)):'', 'class="form-control datepicker1 input-sm date-input"'); ?>
					
					<a href="<?php echo site_url('/admin/shuttles/index') ?>" class="btn btn-sm btn-primary pull-right" style="text-align:right !important;padding:5px 10px;font-size:13px;margin-left: 10px;"><i class="entypo-cancel-circled"></i></a>
					<button class='btn btn-sm btn-primary pull-right' style="font-size:13px;padding:5px 10px;margin-left: 10px;" type="submit">Go</button>
				</label>
			</form>			
		</div>
	</div>
</div>
<?php echo $this->layout->load_view('layout/alerts'); ?>

<?php echo $this->layout->load_view('shuttles/booking_list_table'); ?>