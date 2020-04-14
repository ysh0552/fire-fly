<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
				
				<h3><?php echo $title_text; ?></h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
<div class="content-box-content"> 
					
	<div class="tab-content default-tab" id="tab1">
				
					<form action="<?php echo site_url('a_case/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" onsubmit="return checkinfo(this);" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
					<p>

                         <!-- 分　类：
                    <select id="sort" name="sort">
                    	<option value="1">行业分类</option>
                    	<option value="2">专业分类</option>
                    </select>
                    <script type="text/javascript">
                    $('#sort').val(<?php echo $id?$sort:''; ?>);
                    </script>
                     -->
                    &nbsp;&nbsp;首页是否显示：
                    <label>
                    	<input type="radio" value="1" name="index" <?php if($id){ echo $index == 1?'checked':''; }else{ echo 'checked'; }  ?>>是
                    </label>
                    
                    <label>
                    	<input type="radio" value="0" name="index" <?php if($id){ echo $index == 0?'checked':''; }?> >否
                    </label>
                   
                    </p>
                    
                    
					<p>排　序：<input type="text" name="num"  value="<?php echo $id?$num:'';?>"  class="text-input medium-input datepicker" /><b>数字越大排越前</b></p>
					
					<p>标　题：<input type="text" name="title" value="<?php echo $id?$title:'';?>"  class="text-input medium-input datepicker" /></p>
                    <p>描  述：<input type="text" name="content" value="<?php echo $id?$content:'';?>"  class="text-input medium-input datepicker" /><b>换行使用 " | " <br/> </b></p>
              

<p>上　传：<b>注意：只支持上传jpg,png,gif,bmp文件 图片尺寸(像素px)：320x420 </b><div id="queue"></div>
<input id="file_upload" name="file_upload" type="file"  multiple="true"/>
<input type="hidden" name="curFile" id="curFile" value="<?php echo $id?$curFile:''; ?>" />
<img id="imgs" src="<?php echo $id?base_url('upload').'/'.$curFile:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
</p>


                    <p>详细内容：<textarea name="content2" class="editor_id"><?php echo $id?$content2:''; ?></textarea></p>

				<p>
                         <input class="button" type="submit" value="<?php echo $button_name; ?>"/>
                         <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
                    </p>
			</form>
            
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script>
KindEditor.ready(function(K) {
	window.editor = K.create('.editor_id');
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
				var upfile=$('#curFile');
				
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


