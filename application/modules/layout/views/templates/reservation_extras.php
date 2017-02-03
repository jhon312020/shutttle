<div class="row">
  <h4 class="sub_sel_ext" style="padding-left: 13px;"><?php echo lang('select_your_extras'); ?></h4>
</div>
<?php
  $mat_count=1;
  foreach($booking as $book) {
    $title = ($lang == 'en')?$book['title']:$book['title_es'];
?>	
    <div class="row mybox-2" id="extraDiv_<?php echo $book['id']; ?>">
      <div class="col-sm-2 mycolwid2"><img src="<?php echo IMAGEPATH.'booking_extras/'.$book['image']; ?>"></div>
      <div class="col-sm-10 mycolwid10">
        <span class="orange txt-size-20"><?php echo $title; ?>: </span>
        <h5 class="pull-right" data-extra-name="<?php echo $mat_count; ?>" data-extra-title="<?php echo $title; ?>">
          <span class="my_right_price" data-extra-price="<?php echo $book['price']; ?>"> <?php echo $book['price'].'&euro; / '.(($book['type'])?lang('unit'):$title); ?></span> 
          <br><br> 
          <?php 
          if($book['type']){
          ?>
          <select size="1" class="mynumber_input">
          <?php foreach(range(1,10) as $sel) { ?>
          <option><?php echo $sel<10?'0'.$sel:$sel; ?></option>
          <?php } ?>
          </select>
          <?php } ?>
          <button class="btn btn-default btnnewsize"><span class="mob_hide_opc"><?php echo lang('add'); ?></span></button>
      </h5> 
    <br>
    <?php echo ($lang == 'en')?$book['subtitle']:$book['subtitle_es']; ?>
    <br><br> <!--<span class="more_info_click orange txt-size-14"><?php //echo lang('more_info'); ?>
    <div class="show_more_info orange txt-size-14 mar-top-20" style="display:none;">
    <?php //echo ($lang == 'en')?$book['description_en']:$book['description_es']; ?>
    </div></span> -->
  </div>
</div>				
<?php	
  $mat_count++;
}
?>

