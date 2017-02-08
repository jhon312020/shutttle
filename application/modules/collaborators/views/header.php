<?php if($this->session->userdata('user_name') && $this->session->userdata('user_type') == 2){  ?>
<div class="top_col_menu">
    <?php if($this->session->userdata('user_type') == 2) { ?>
      <a class="bannera" href="<?php echo site_url($lang.'/bookings'); ?>">Booking History</a>
      <span class="top_pipe bannera">|</span>
      <a class="bannera" href="<?php echo site_url($lang.'/collaborators/changepassword'); ?>">Change Password</a>
    <?php }  
      if(isset($collaborator_details['available_seats']) && $collaborator_details['available_seats'] == 'activate') { ?>
      <?php } ?>
      <?php if(isset($collaborator_details['available_seats'])) { ?>
        <span>Available seats: <?php echo $collaborator_details['no_of_available_seats'];?></span>
        <span class="top_pipe">|</span>
      <?php } ?>
      <span><?php echo $this->session->userdata('user_name'); ?></span>
      <span class="top_pipe">|</span>
      <a href="<?php echo site_url($lang.'/collaborators/logout'); ?>" class="pad-right-zero">Logout<i class="entypo-logout pad-right-zero mar-right-zero"></i></a>
    </ul>
</div>
<?php } ?>
