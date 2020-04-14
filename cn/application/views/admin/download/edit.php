<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $title_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<form action="<?php echo site_url('a_download/save'); ?>" method="post" enctype="multipart/form-data" >
				<input type="hidden" name="hid" value="<?php echo $id?$id:''; ?>" />
				<p>排　序：<input type="text" name="sort" value="<?php echo $id?$sort:'';?>" class="text-input medium-input datepicker" /></p>
				<p>标　题：<input type="text" name="title" value="<?php echo $id?$title:'';?>" class="text-input medium-input datepicker" /></p>
				<p>支持平台：<input type="text" name="platform" value="<?php echo $id?$platform:'';?>" class="text-input medium-input datepicker" /></p>
				<p>说明：<input type="text" name="explain" value="<?php echo $id?$explain:'';?>" class="text-input medium-input datepicker" /></p>
                    
				<p>上　传：<div id="queue"></div>
                  <input id="file_upload" name="file_upload" type="file"  multiple="true">
                  文件名：<input readonly style="border:0; background:none;" name="upfile" id="upfile" type="text" value="<?php echo $id?$upfile:''; ?>" class="text-input medium-input datepicker" /><br/>
                  大小：<input readonly style="border:0; background:none;" name="big" id="big" type="text" value="<?php echo $id?$big:''; ?>" class="text-input medium-input datepicker" /><br/>
                  类型：<input readonly style="border:0; background:none;" name="types" id="types" type="text" value="<?php echo $id?$types:''; ?>" class="text-input medium-input datepicker" />

                </p>
				
				<p>
					<input class="button" type="submit" value=" 保 存 " />
                    <?php if($id){ ?>
					<input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
                    <?php } ?>
				</p>
				<div class="clear"></div>
				<!-- End .clear -->
				
			</form>
		</div>
		<!-- End #tab1 -->
		
	</div>
	<!-- End .content-box-content --> 
	
</div>
<script src="<?php echo base_url('resources/uploadify/jquery.uploadify.min.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/uploadify/uploadify.css'); ?>">
<script type="text/javascript">

	<?php $timestamp = time();?>
	$(function(){
		$('#file_upload').uploadify({
			    'formData'  : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('YSH'.$timestamp);?>'
			},
		   'buttonText': '上传文件',
			'swf'      : '<?php echo base_url('resources/uploadify/uploadify.swf'); ?>',
			'uploader' : '<?php echo site_url('uploadify/index'); ?>',
	 'removeCompleted' : true,
	 'queueSizeLimit'  : 1,
	// 'fileTypeDesc' :'选择PDF文件',
	// 'fileTypeExts' :'*.pdf',
	        'onDialogClose':function(queueData){
				var upFile=$('#upfile').val();
				var url='<?php echo site_url('uploadify/del_file'); ?>';
				$.post(url,{upfile:upFile},function(data){
					//alert(data);
					});
				
			},
			//上传到服务器，服务器返回相应信息到data里
            'onUploadSuccess':function(file,data,response){
				$('#upfile').val(data);
				var fileSize=file.size/1024;
				var newFileSize=Math.round(fileSize*100)/100;
				$('#big').val(newFileSize+'KB');
				$('#types').val(file.type+'文件');
            }
		});
	});


</script>
