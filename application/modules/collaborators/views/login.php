<?php
  $this->load->view('layout/templates/header');
?>
<style>
body{
  font-family: 'Gothambook';
}
.input-group-addon {
  color:white;
  background: #4577d8;
  border:none;
  border-radius: 0px;
  font-size:20px;
}
.form-control {
  padding-left: 0px;
}
.form-control:focus {
    border: none;
    box-shadow: none;
}
</style>
<div class="container bodypad">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default" style="color:white;border-radius:0px;background:url('<?php echo base_url().'assets/cc/images/captions/reserva.jpg'?>')">
    <div class="panel-body">
      <?php $this->load->view('layout/alerts'); ?>
        <div class="row" style="color:white;">
            <div class="col-md-12"><span style="font-size:18px;">Member Login</span><hr style="color:#ccc;"/></div>
            <form method="POST" class="col-md-6 col-md-offset-3 validateForm">
              <input style="display:none" type="password" name="password"/>
              <div class="form-group col-xs-12">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <?php echo  form_input(array('name'=>'username', 'id'=>'username', 'type'=>'text', 'placeholder'=>lang('email'), 'class'=>'form-control')); ?>
                  </div>
              </div>
              <div class="form-group col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-lock" style="font-size:25px;"></i>
                    </div>
                    <?php echo  form_input(array('name'=>'password', 'id'=>'password', 'type'=>'password', 'placeholder'=>lang('password'), 'class'=>'form-control')); ?>
                </div>
              </div>
              <div id="select_ida" class="form-group col-xs-12" style="text-align:center;">
									<u><a href="<?php echo site_url($lang).'/recovery_password/collaborators' ?>" style="color:white;"><?php echo lang('password_recovery'); ?></a></u>
								</div>
            <div class="form-group col-xs-12"></div>
            <div class="form-group col-xs-12 col-xs-6 col-md-offset-4">
              <button type="submit" class="btn" style="width: 100px;padding: 5px;font-size: 24px;"><?php echo lang('button_go'); ?></button>
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?php $this->load->view('layout/templates/footer');?>
