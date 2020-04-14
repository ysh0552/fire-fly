<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $title_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<form action="<?php echo site_url('a_learn/save'); ?>" method="post" enctype="multipart/form-data" >
			
				<input type="hidden" name="hid" value="<?php echo $id?$id:''; ?>" />
				<p>标　题：
				<input type="text" name="title" value="<?php echo $id?$title:'';?>" class="text-input medium-input datepicker" />
				</p>
				
                    
				<p>内　容：
					<textarea id="editor_id" name="content" cols="79" rows="15">
                         <?php echo $id?$content:'';?>
                    </textarea>
				</p>
				
				<p>
					<input class="button" type="submit" value="保存" />
					<input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
				</p>
				<div class="clear"></div>
				<!-- End .clear -->
				
			</form>
		</div>
		<!-- End #tab1 -->
		
	</div>
	<!-- End .content-box-content --> 
	
</div>
					<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script> 
					<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script> 
					<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script> 