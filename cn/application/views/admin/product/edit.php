

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
				
				<h3><?php echo $title_text; ?></h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
					
<div class="content-box-content"> 
	
	<div class="tab-content default-tab" id="tab1">
		<script type="text/javascript">
			function checkinfo()
			{
				if($('#sid').val()==0){
					alert('请选择分类！');
					return false;
				}
			}
		</script>			
					<form action="<?php echo site_url('a_product/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" onsubmit="return checkinfo(this);" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />

			  		<p>分　类：<select id="sid" name="sid">
                   
                    <?php $sort1=$this->sort_model->user_select();
					foreach($sort1 as $item){ ?>
                    	<option value="<?php echo $item['id']; ?>"><?php echo $item['sortname']; ?></option>
                    <?php } ?>
                    </select>
					 <script type="text/javascript"> $('#sid').val('<?php echo $sid; ?>');</script>	
                    </p>


					<p>排　序：<input placeholder="填写整数，数字小排在前面" type="text" name="sequence" title="排序" value="<?php echo $id?$sequence:'';?>"  class="text-input medium-input datepicker" /><b>(填写整数，数字小排在前面)</b></p>
					<p>名　称：<input type="text" name="title" title="名称" value="<?php echo $id?$title:'';?>"  class="text-input medium-input datepicker" /></p>
                    
				

                    

<p>上　传：<b>注意：只支持上传jpg,png,gif,bmp文件 图片尺寸(像素px)：456x239 </b><div id="queue"></div>
<input id="file_upload" name="file_upload" type="file"  multiple="true"/>
<input type="hidden" name="upfile" id="upfile" value="<?php echo $id?$upfile:''; ?>" />
<img id="imgs" src="<?php echo $id?base_url('upload').'/'.$upfile:''; ?>" <?php if(!$id){echo ' style="display:none;"';} ?> height="100" />
</p>
                    
				

					
					<p>产品参数：
						<textarea class="editor_id" name="content3" cols="79" rows="30">
						<?php echo $id?$content3:''; ?>
						</textarea>
					</p>
				
					
					
					<p><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" /></p>
			</form>
			
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script type="text/javascript">
var editor;
	KindEditor.ready(function(K) {
		editor = K.create('.pro_id', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : ['|','multiimage','|','fullscreen','|','clearhtml']
		});
	});
	
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