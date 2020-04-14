
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $title_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
		
			<form action="<?php echo site_url('a_moving/save'); ?>" method="post" onsubmit="return checknum(this);" id="form1" >
				<input type="hidden" name="hid" value="<?php echo $id ? $data_event[0]['id']:'' ?>" />
			
				<p>标　题：
					<input type="text" name="title" value="<?php echo $id ? $data_event[0]['title'] : ''; ?>" class="text-input medium-input datepicker"/>
				</p>
                <p>关键词：<input type="text" name="keywords" title="关键词" value="<?php echo $id?$data_event[0]['keywords']:'';?>"  class="text-input medium-input datepicker" /></p>
                
                <p>描　述：<input type="text" name="description" title="描　述" value="<?php echo $id?$data_event[0]['description']:'';?>"  class="text-input medium-input datepicker" /></p>
                
                <p>发布者：
					<input type="text" name="author" value="<?php echo $id ? $data_event[0]['author'] : ''; ?>" class="text-input medium-input datepicker"/>
				</p>
                
                <p>来源：
					<input type="text" name="source" value="<?php echo $id ? $data_event[0]['source'] : ''; ?>" class="text-input medium-input datepicker"/>
				</p>
                
				<p>内　容：
					<textarea id="editor_id" name="content" cols="79" rows="15">
						<?php echo $id ? $data_event[0]['content'] : ''; ?>
					</textarea>
				</p>
			
				
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script> 
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script> 
<script>
	KindEditor.ready(function(K) {
			window.editor = K.create('#editor_id');
	});
</script>


<p><input class="button" type="submit" value="<?php echo $button_name; ?>" />
	<input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
</p>
				<div class="clear"></div>
				<!-- End .clear -->
			</form>
		</div>
		<!-- End #tab1 --> 
</div>	<!-- End .content-box-content --> 
	
</div>
