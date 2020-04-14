<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>内容编辑</h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<form action="<?php echo site_url('a_business/save'); ?>" method="post" >
				<p><input type="text" name="title" value="<?php echo $title; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
                
				<p><input type="text" name="t1" value="<?php echo $t1; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
				<p><textarea name="c1" cols="8" rows="8"><?php echo $c1; ?></textarea></p>
                
				<p><input type="text" name="t2" value="<?php echo $t2; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
				<p><textarea name="c2" cols="8" rows="8"><?php echo $c2; ?></textarea></p>
                
				<p><input type="text" name="t3" value="<?php echo $t3; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
				<p><textarea name="c3" cols="8" rows="8"><?php echo $c3; ?></textarea></p>
                
				<p><input type="text" name="t4" value="<?php echo $t4; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
				<p><textarea name="c4" cols="8" rows="8"><?php echo $c4; ?></textarea></p>
                
				<p><input type="text" name="t5" value="<?php echo $t5; ?>" maxlength="100" class="text-input medium-input datepicker"/></p>
				<p><textarea name="c5" cols="8" rows="8"><?php echo $c5; ?></textarea></p>
                
				<p style="position:fixed; height:50px; line-height:50px; background:#FFF; width:100%; border:solid 1px #ccc; margin-left:-50px; padding:20px; bottom:0;"><input class="button" type="submit" value=" 保 存 " /></p>
				<div class="clear"></div>
				<!-- End .clear -->
			</form>
		</div>
		<!-- End #tab1 -->
	</div>
	<!-- End .content-box-content --> 
</div>