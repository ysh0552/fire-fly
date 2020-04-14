<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>网站设置</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_setting/save');?>" method="post" id="form1"  />
					
					<input type="hidden" name="hid" value="<?php echo $data_sort[0]['id']; ?>"  />
                    
	  
			<!-- 		<p>首页标题：<input type="text" name="index_name" value="<?php echo $data_sort[0]['index_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>首页-关键词：<input type="text" name="index_keywords" value="<?php echo $data_sort[0]['index_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>首页-描　述：<input type="text" name="index_description" value="<?php echo $data_sort[0]['index_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
<hr>

					<p>简介标题：<input type="text" name="about_name" value="<?php echo $data_sort[0]['about_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>简介-关键词：<input type="text" name="about_keywords" value="<?php echo $data_sort[0]['about_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>简介-描　述：<input type="text" name="about_description" value="<?php echo $data_sort[0]['about_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>

<hr>

					<p>案例标题：<input type="text" name="case_name" value="<?php echo $data_sort[0]['case_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>案例-关键词：<input type="text" name="case_keywords" value="<?php echo $data_sort[0]['case_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>案例-描　述：<input type="text" name="case_description" value="<?php echo $data_sort[0]['case_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
<hr>

					<p>观点标题：<input type="text" name="thinks_name" value="<?php echo $data_sort[0]['thinks_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>观点-关键词：<input type="text" name="thinks_keywords" value="<?php echo $data_sort[0]['thinks_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>观点-描　述：<input type="text" name="thinks_description" value="<?php echo $data_sort[0]['thinks_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>

<hr>
					
					<p>服务标题：<input type="text" name="service_name" value="<?php echo $data_sort[0]['service_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>服务-关键词：<input type="text" name="service_keywords" value="<?php echo $data_sort[0]['service_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>服务-描　述：<input type="text" name="service_description" value="<?php echo $data_sort[0]['service_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>

<hr>

					<p>新闻标题：<input type="text" name="news_name" value="<?php echo $data_sort[0]['news_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>新闻-关键词：<input type="text" name="news_keywords" value="<?php echo $data_sort[0]['news_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>新闻-描　述：<input type="text" name="news_description" value="<?php echo $data_sort[0]['news_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
<hr> 

					<p>联系标题：<input type="text" name="contactus_name" value="<?php echo $data_sort[0]['contactus_name']; ?>"  class="text-input medium-input datepicker" /></p>

					<p>联系-关键词：<input type="text" name="contactus_keywords" value="<?php echo $data_sort[0]['contactus_keywords']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
                    
					<p>联系-描　述：<input type="text" name="contactus_description" value="<?php echo $data_sort[0]['contactus_description']; ?>"  class="text-input medium-input datepicker" /><b class="red"> 100字以内</b></p>
-->


	  			  <p>上　传：<b>注意：只支持上传jpg,png,gif,bmp文件 图片尺寸(像素px)：128x128 </b><div id="queue"></div>
                  <input id="file_upload" name="file_upload" type="file"  multiple="true"/>
                  <input type="hidden" name="upfile1" id="upfile1" value="<?php echo $data_sort[0]['upfile1']; ?>" />
                  <img id="imgs" src="<?php echo base_url('upload').'/'.$data_sort[0]['upfile1']; ?>" height="100" />
                   </p>
                
<hr>

				<p>联系地址：<input type="text" name="contect" value="<?php echo $data_sort[0]['contect']; ?>"  class="text-input medium-input datepicker" /></p>

				<p>版　权：<input type="text" name="copyright" value="<?php echo $data_sort[0]['copyright']; ?>"  class="text-input medium-input datepicker" /></p>

				<p><input class="button" type="submit" name="button" value="  保 存  " /></p>

			</form>
            
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script type="text/javascript">
	KindEditor.ready(function(K) {
		window.editor = K.create('.editor_id');
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
     
	</div> 
</div>