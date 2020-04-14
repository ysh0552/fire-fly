<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
				
				<h3><?php echo $title_text; ?></h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
<div class="content-box-content"> 
	<div class="tab-content default-tab" id="tab1">
			  <form action="<?php echo site_url('a_ads/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
                    <input type="hidden" name="gid" value="<?php echo $id?$gid:'0'; ?>" />
                    <input type="hidden" name="title" value="<?php echo $id?$title:'首页轮播图'; ?>" />
                    
					
					<p>对应位置：<input type="text" name="titles" value="<?php echo $id?$title:'首页轮播图'; ?>" disabled="disabled" class="text-input medium-input datepicker" ><b style="color:red"> </b> <br/> </p>
			 		
					<p>链　接：<input type="text" name="links" value="<?php echo $id?$links:'#'; ?>"  class="text-input medium-input datepicker"/><b> 注意：开头http://</b></p>
					<p>排　序：<input type="text" name="sort" value="<?php echo $id?$sort:''; ?>"  class="text-input medium-input datepicker"/></p>
					

				    <p>上　传：<b>注意：只支持上传jpg,png,gif,bmp文件 图片尺寸(像素px)：<?php echo $title == '首页轮播图'?'1920x426':'128x128' ?> </b><div id="queue"></div>
				                  <input id="file_upload" name="file_upload" type="file"  multiple="true"/>
				                  <input type="hidden" name="upfile" id="upfile" value="<?php echo $id?$upfile:''; ?>" />
				                  <img id="imgs" src="<?php echo $id?base_url('upload').'/'.$upfile:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
				                   </p>

                     <p>
                    <textarea id="editor_id" name="content" style="height:400px;"><?php echo $id?$content:''; ?></textarea>
                    </p>
                    
					<p><input class="button" type="submit" value=" 保 存 "/>
                       <input class="button" type="button" value=" 返 回 " onclick="javascript:history.go(-1);" /></p>
			</form>
			


</div><!-- End tab1 -->
</div> <!-- End content-box-content -->
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
				var upfile=$('#upfile');
				
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