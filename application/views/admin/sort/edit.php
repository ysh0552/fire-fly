

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><?php echo $title_text; ?></h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_sort/save');?>" method="post" id="form1"  enctype="multipart/form-data" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
			
					<p>分类名：<input type="text" name="sortname" value="<?php echo $id?$data_sort[0]['sortname']:''; ?>"  class="text-input medium-input datepicker" /></p>
					
					<p><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
					<?php if($id){ ?>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
					<?php } ?>
					</p>
			</form>
	</div> 
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
		   'buttonText': '一级类图片',
			'swf'      : '<?php echo base_url('resources/uploadify/uploadify.swf'); ?>',
			'uploader' : '<?php echo site_url('upload/index'); ?>',
	 'removeCompleted' : true,
	 'removeTimeout'   : 1,
	 'queueSizeLimit'  : 1,
	 'fileTypeDesc' :'只支持jpg,png,gif,bmp文件',
	 'fileTypeExts' :'*.jpg;*.png;*.gif;*.bmp',
			//上传到服务器，服务器返回相应信息到data里
            'onUploadSuccess':function(file,data,response){
				var imgs=$('#imgs');
				var upfile=$('#upfile');
				
				
				var fileType=file.type;
				//alert(fileType);
				if(fileType =='.JPG' || fileType == '.jpg' || fileType =='.png' || fileType =='.PNG' || fileType =='.gif' || fileType == '.GIF' || fileType =='.bmp' || fileType == '.BMP')
				{
				
					var imgsUrl="<?php echo base_url('upload'); ?>";
					imgs.attr('src',imgsUrl+'/'+data);
					imgs.attr('style','display:block');
				}
				
				if(upfile !=''){
					var url='<?php echo site_url('upload/del_file'); ?>';
					$.post(url,{upfile:upfile.val()},function(datas){
						//alert(datas);
					});
				}
				upfile.val(data);
            }
		});
	});
	
	
	$('#sid').change(function(){
	var sid=$('#sid').val();
	if(sid != 0){
		$('#up').hide();
		$('#imgs').hide();
		$('#file_upload').hide();
		
	}else{
		$('#up').show();
		$('#imgs').show();
		$('#file_upload').show();

	}
			
	});
</script>