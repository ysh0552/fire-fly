<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>编辑</h3>
					
					<div class="clear"></div>
			
				</div> <!-- End .content-box-header -->
			
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_contact/save');?>" method="post" />
                    
					<input type="hidden" name="hid" value="<?php echo $id?$id:''; ?>" />

		

<p>上　传：<b>注意：只支持上传jpg,png,gif,bmp文件 图片尺寸(像素px)：456x239</b><div id="queue"></div>
<input id="file_upload" name="file_upload" type="file"  multiple="true"/>
<input type="hidden" name="address" id="address" value="<?php echo $id?$address:''; ?>" />
<img id="imgs" src="<?php echo $id?base_url('upload').'/'.$address:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
</p>


					
					<!-- <p>地址：<input type="text" name="address" value="<?php echo $id?$address:''; ?>"  class="text-input medium-input datepicker" /></p> -->
					<p>内容：<textarea id="editor_id" rows="30" name="content" /><?php echo $id?$content:''; ?></textarea></p>
					<p><input class="button" type="submit" value="<?php echo $buttonname; ?>"/>
					<?php if($id){ ?>
                      <!-- <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" /> -->
					<?php } ?>
					</p>
			</form>
            
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script>
        KindEditor.ready(function(K) {
        	window.editor = K.create('#editor_id');
        });
</script>

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
		   'buttonText': '上传图片',
			'swf'      : '<?php echo base_url('resources/uploadify/uploadify.swf'); ?>',
			'uploader' : '<?php echo site_url('uploadify/index2'); ?>',
	 'removeCompleted' : true,
	 'removeTimeout'   : 1,
	 'queueSizeLimit'  : 1,
	 'fileTypeDesc' :'只支持jpg,png,gif,bmp文件',
	 'fileTypeExts' :'*.jpg;*.png;*.gif;*.bmp',
			//上传到服务器，服务器返回相应信息到data里
            'onUploadSuccess':function(file,data,response){
				var imgs=$('#imgs');
				var upfile=$('#address');
				
				var fileType=new String(file.type);
				var lowerType=fileType.toLowerCase();
				//alert(fileType);
				if(lowerType == '.jpg' || lowerType =='.png' || lowerType =='.gif' || lowerType =='.bmp'){
					var imgsUrl="<?php echo base_url('upload'); ?>";
					imgs.attr('src',imgsUrl+'/'+data);
					imgs.attr('style','display:block');
				}
				
				if(upfile !=''){
					var url='<?php echo site_url('upload/del_file2'); ?>';
					$.post(url,{upfile:upfile.val()},function(datas){
						//alert(datas);
					});
				}
				upfile.val(data);
            }
		});
	});

</script>