<?php
  $this->load->view('layout/templates/header');
?>
<div class="container bodypad">
  <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default ">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo lang('login_title');?></h3>
    </div>
    <div class="panel-body">
      <?php $this->load->view('layout/alerts'); ?>
        <div class="row">
            <form method="POST" class="validateForm">
              <input style="display:none" type="password" name="password"/>
              <div class="form-group col-xs-12">
                <?php echo  form_input(array('name'=>'username', 'id'=>'username', 'type'=>'text', 'placeholder'=>lang('email'), 'class'=>'form-control')); ?>
              </div>
              <div class="form-group col-xs-12">
                <?php echo  form_input(array('name'=>'password', 'id'=>'password', 'type'=>'password', 'placeholder'=>lang('password'), 'class'=>'form-control')); ?>
              </div>
            <div class="form-group col-xs-12"></div>
            <div class="form-group col-xs-12 col-xs-6 col-md-offset-3">
              <button type="submit" class="btn btn-block" style=""><?php echo lang('go'); ?></button>
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/templates/footer');?>
