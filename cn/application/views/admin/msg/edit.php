

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>联系方式</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_msg/save');?>" method="post" id="form1"  enctype="multipart/form-data" />
					
					
					<p>联系方式：<textarea class="editor_id" name="contact"><?php echo $contact[0]['contact']; ?></textarea></p>
					<p>底部的联系方式：<textarea class="editor_id" name="contact2"><?php echo $contact[0]['contact2']; ?></textarea></p>
					
					<p><input class="button" type="submit" value="保存"/>
					
					</p>
			</form>
	</div> 
</div>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script>
        KindEditor.ready(function(K) {
        	window.editor = K.create('.editor_id');
        });
</script>
