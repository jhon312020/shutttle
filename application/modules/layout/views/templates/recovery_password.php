<?php
	$this->load->view('header');
?>
		<div class="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width:340px;margin:auto;">
			<div class="modal-dialog" role="document" style="margin-top:1% !important;">
				<div class="modal-content" style="box-shadow:none;">
          <?php $this->load->view('layout/alerts'); ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><?php echo lang('password_recovery'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="col-xs-12">
							<div class="row contacto">
								<form method="POST" class="validateForm">
									<input style="display:none" type="text" name="fakeusernameremembered"/>
									<input style="display:none" type="password" name="fakepassword"/>
								<br>
								<div class="form-group col-xs-12">
									<?php echo  form_input(array('name'=>'username', 'id'=>'username', 'type'=>'text', 'placeholder'=>lang('email'), 'class'=>'form-control')); ?>
								</div>
								<div class="form-group col-xs-12"><hr></div>
								<div class="form-group col-xs-12">
									<button type="submit" class="btn btn-primary btn-lg pickbluebg btn-block" style="font-size:41.67px;font-family:FuturaStdBold;"><?php echo lang('go'); ?></button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>
		
<?php $this->load->view('footer');?>
