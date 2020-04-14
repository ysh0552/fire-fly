<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $title_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<form action="<?php echo site_url('a_con/save'); ?>" method="post" enctype="multipart/form-data" >
			
				<input type="hidden" name="hid" value="<?php echo $id?$id:''; ?>" />
            
                <p>上　传：<b class="red">注意：只支持上传jpg,png,gif,bmp文件 图片尺寸：838x91</b><div id="queue"></div>
                  <input id="file_upload1" name="file_upload1" type="file"  multiple="true"/>
                  <input type="hidden" name="upfile1" id="upfile1" value="<?php echo $id?$upfile1:''; ?>" />
                  <img id="imgs" src="<?php echo $id?base_url('upload').'/'.$upfile1:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
                </p>
                
				<p>内　容：
					<textarea id="editor_id" name="content" cols="79" rows="35">
                         <?php echo $id?$content:'';?>
                    </textarea>
				</p>
				
				<p>
					<input class="button" type="submit" value="    保 存    " />
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

<script src="<?php echo base_url('resources/uploadify/jquery.uploadify.min.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/uploadify/uploadify.css'); ?>">
<script type="text/javascript">
	<?php $timestamp = time();?>

$(function(){
		$('#file_upload1').uploadify({
			    'formData'  : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('YSH'.$timestamp);?>'
			},
		   'buttonText': '封面图片',
			'swf'      : '<?php echo base_url('resources/uploadify/uploadify.swf'); ?>',
			'uploader' : '<?php echo site_url('uploadify/index'); ?>',
	 'removeCompleted' : true,
	 'removeTimeout'   : 1,
	 'queueSizeLimit'  : 1,
	 'fileTypeDesc' :'只支持jpg,png,gif,bmp文件',
	 'fileTypeExts' :'*.jpg;*.png;*.gif;*.bmp',
			//上传到服务器，服务器返回相应信息到data里
            'onUploadSuccess':function(file,data,response){
				var imgs=$('#imgs');
				var upfile=$('#upfile1');
				var fileType=new String(file.type);
				var lowerType=fileType.toLowerCase();
				//alert(fileType);
				if(lowerType == '.jpg' || lowerType =='.png' || lowerType =='.gif' || lowerType =='.bmp'){
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




</script>