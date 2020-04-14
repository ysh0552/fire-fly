<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
				
				<h3><?php echo $title_text; ?></h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
<div class="content-box-content"> 
					
	<div class="tab-content default-tab" id="tab1">
					
					<form action="<?php echo site_url('a_video/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
                   
                    <p>排　序：<input type="text" name="sort" value="<?php echo $id?$sort:'';?>"  class="text-input medium-input datepicker" /><b class="red"> 填写整数</b></p>
					<p>标　题：<input type="text" name="title" value="<?php echo $id?$title:'';?>"  class="text-input medium-input datepicker" /></p>
					<p>版　本：<input type="text" name="copy" value="<?php echo $id?$copy:'';?>"  class="text-input medium-input datepicker" /></p>
              		
                    <p>上　传：<b class="red">注意：只支持上传jpg,png,gif,bmp文件 图片尺寸：60x60</b><div id="queue"></div>
                      <input id="file_upload1" name="file_upload1" type="file"  multiple="true"/>
                      <input type="hidden" name="upfile1" id="upfile1" value="<?php echo $id?$upfile1:''; ?>" />
                      <img id="imgs" src="<?php echo $id?base_url('upload').'/'.$upfile1:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
                    </p>
                    
					<p style="display:<?php if($id){ if($types == 2){ echo 'block'; }else{ echo 'none';} }else{ echo 'none'; }?>" id="links">视频链接：<input type="text" name="links" value="<?php echo $id?$links:'';?>"  class="text-input medium-input datepicker" /><b>注意：http://开头</b></p>
                   	<p>上　传：<b class="red">小于10M</b><div id="queue"></div>
                  <input id="file_upload" name="file_upload" type="file"  multiple="true">
                  文件名：<input readonly style="border:0; background:none;" name="upfile" id="upfile" type="text" value="<?php echo $id?$upfile:''; ?>" class="text-input medium-input datepicker" /><br/>
                  大小：<input readonly style="border:0; background:none;" name="big" id="big" type="text" value="<?php echo $id?$big:''; ?>" class="text-input medium-input datepicker" /><br/>
                  类型：<input readonly style="border:0; background:none;" name="types" id="types" type="text" value="<?php echo $id?$types:''; ?>" class="text-input medium-input datepicker" />
                  
                </p>
                    
					<p><input class="button" type="submit" value=" <?php echo $button_name; ?> "/>
                    <?php if($id){ ?>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" /></p>
                       <?php } ?>
			</form>
			
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script>
        KindEditor.ready(function(K) {
        	window.editor = K.create('#editor_id');
        });
</script>
</div><!-- End tab1 -->

</div> <!-- End content-box-content -->
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



	$('.types').click(function(){
		var types=$(this).val();
		
		if(types == 2){
			$('#links').show();
		}else{
			$('#links').hide();
		}
	});

</script>
