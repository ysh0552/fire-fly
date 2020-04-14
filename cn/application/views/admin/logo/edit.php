<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
				
				<h3><?php echo $title_text; ?></h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->

<div class="content-box-content"> 

	<div class="tab-content default-tab" id="tab1">

		
					<form action="<?php echo site_url('a_logo/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" onsubmit="return check(this);" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
					
                
                    
  
					<p>标　题：<input type="text" name="title" title="标 题" value="<?php echo $id?$title:'';?>"  class="text-input medium-input datepicker" /></p>
					<p>链　接：<input placeholder="注意：要http://开头" type="text" name="links" title="链　接" value="<?php echo $id?$links:'';?>"  class="text-input medium-input datepicker" /><b style="color:#F00;">注意：要http://开头</b></p>

					<p>上传图片：
					<input type="file" name="upfile" /><b>（图片不能大于2M）</b></p>
					<input type="hidden" name="file_path" value="<?php echo $id?$upfile:''; ?>" />
					<p>
					<?php echo $id?'当前图片：':''; ?>
						<?php if($id){  ?>
							<img src="<?php echo base_url().'/upload/logo/'.$upfile;?>" width="200" height="100" />
						<?php } ?>
					</p>
					<p><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" /></p>
</form>
			

</div><!-- End tab1 -->

<div class="tab-content" id="tab2" style="display:none;"> 
	sadf
</div>	<!-- End tab2 -->
			
</div> <!-- End content-box-content -->
</div>


