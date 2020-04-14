<script type="text/javascript">
	function checknum(form1){
	if(form1.sid.value == 0){
		alert('请选择分类');
		return false;
	}
}
</script>
<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $title_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
		
        
        
			<form action="<?php echo site_url('a_article/save'); ?>" method="post" onsubmit="return checknum(this);" id="form1" >
				<input type="hidden" name="hid" value="<?php echo $id ? $data_event[0]['id']:'' ?>" />
				<p>选择分类：
                	<select id="sid" name="sid">
                    	<option value="0">选择分类</option>
                <?php $caseSort=$this->sort_model->user_sid_select(1); 
					foreach($caseSort as $item){
						echo '<option value="'.$item['id'].'">'.$item['sortname'].'</option>';
					}
				?>		
                    </select>
               
                首页显示:<input type="radio" name="index" value="1" <?php if($id) echo $data_event[0]['index'] == 1?'checked="checked"':''; ?>/>是
                <input type="radio" name="index" value="0" <?php if($id){ echo $data_event[0]['index'] == 0?'checked="checked"':'';}else{echo 'checked="checked"';} ?>/>否</p>
                
                
                <script type="text/javascript">
                	$('#sid').val(<?php echo $id ? $data_event[0]['sid']:'0' ?>);
                </script>
                
                <p>标　题：
					<input type="text" name="title" value="<?php echo $id ? $data_event[0]['title'] : ''; ?>" class="text-input medium-input datepicker"/>
				</p>

                <p>关键词：<input type="text" name="keywords" title="关键词" value="<?php echo $id?$data_event[0]['keywords']:'';?>"  class="text-input medium-input datepicker" /></p>
                
                <p>描　述：<textarea style="height:100px;" name="description" title="描　述" ><?php echo $id?$data_event[0]['description']:'';?></textarea>
            
                
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
