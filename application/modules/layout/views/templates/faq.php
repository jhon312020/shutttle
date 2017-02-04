<?php
	$this->load->view('header');
?>
	<div class="container bodypad" id="faq">
	<hr class="mob-show mob-hr-line">
		<div class="row faq">
			<div class="col-sm-4"></div>
			<div class="col-sm-8">
				<?php
				?>
				<h1 class="pickblue" style="text-align:center"><?php echo $content['content']; ?></h1>
				<p><?php echo $content['subcontent']; ?></p>
				<span class="mysub_title">
				<?php
				$last = end($bottom_data);
				$engCategory = array('category1' => 'Before my reservation', 'category2' => 'The day of my reservation', 'category3' => 'After my booking');
				$spanCategory = array('category1' => 'Antes de mi reserva', 'category2' => 'el día de mi viaje', 'category3' => 'después de mi viaje');
				$cat1 = array_filter($bottom_data, function($el) { return $el->category == 'category1'; });
				$cat2 = array_filter($bottom_data, function($el) { return $el->category == 'category2'; });
				$cat3 = array_filter($bottom_data, function($el) { return $el->category == 'category3'; });
				//foreach($engCategory as $key=>$value){
				?>
				<!-- <a href="#<?php //echo $key; ?>" class="orange"><?php //echo ($lang == 'en')?$engCategory[$key]:$spanCategory[$key]; ?></a> --> <?php //echo ($key != 'category3')?' / ':''; ?> 
				<?php	
				//}
				?>
        <br/>
				</span></p>
			</div>
		</div>
		<?php
		if(count($cat1) > 0){
		?>
		<div class="row faq">
			<div class="col-sm-4"><h2><?php echo ($lang == 'en')?$engCategory['category1']:$spanCategory['category1']; ?></h2></div>
			<div class="col-sm-8" id="category1">
			<div id="accordion" style="border-bottom: 1px solid #E96B68;padding-bottom:10px;margin-bottom:30px;">
			<ul class="ques">
		<?php
		foreach($cat1 as $data){
		?>
			<li data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id; ?>"><span><?php echo ($lang == 'es')?$data->question_es:$data->question; ?></span>
				<ul id="collapse<?php echo $data->id; ?>" class="ans panel-collapse collapse">
					<li><?php echo ($lang == 'es')?$data->answer_es:$data->answer; ?></li>
				</ul>
			</li>
		<?php
		}
		?>
			</ul>
			</div>
			</div>
		</div>
		<?php
		}
		?>
		<?php
		if(count($cat2) > 0){
		?>
		<div class="row faq">
			<div class="col-sm-4"><h2><?php echo ($lang == 'en')?$engCategory['category2']:$spanCategory['category2']; ?></h2></div>
			<div class="col-sm-8" id="category2">
			<div id="accordion" style="border-bottom: 1px solid #E96B68;padding-bottom:10px;margin-bottom:30px;">
			<ul class="ques">
		<?php
		foreach($cat2 as $data){
		?>
			<li data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id; ?>"><span><?php echo ($lang == 'es')?$data->question_es:$data->question; ?></span>
				<ul id="collapse<?php echo $data->id; ?>" class="ans panel-collapse collapse">
					<li><?php echo ($lang == 'es')?$data->answer_es:$data->answer; ?></li>
				</ul>
			</li>
		<?php
		}
		?>
			</ul>
			</div>
			</div>
		</div>
		<?php
		}
		?>
		<?php
		if(count($cat3) > 0){
		?>
		<div class="row faq">
			<div class="col-sm-4"><h2><?php echo ($lang == 'en')?$engCategory['category3']:$spanCategory['category3']; ?></h2></div>
			<div class="col-sm-8" id="category3">
			<div id="accordion" >
			<ul class="ques">
		<?php
		foreach($cat3 as $data){
		?>
			<li data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id; ?>"><span><?php echo ($lang == 'es')?$data->question_es:$data->question; ?></span>
				<ul id="collapse<?php echo $data->id; ?>" class="ans panel-collapse collapse">
					<li><?php echo ($lang == 'es')?$data->answer_es:$data->answer; ?></li>
				</ul>
			</li>
		<?php
		}
		?>
			</ul>
			</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>

<?php $this->load->view('footer');?>
