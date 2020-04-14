

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><?php echo $title_text; ?></h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_sort2/save');?>" method="post" id="form1"  enctype="multipart/form-data" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
			
                    <script type="text/javascript">$('#sid').val(<?php echo $id?$data_sort2[0]['sid']:''; ?>);</script>
					<p>分类名：<input type="text" name="sort2name" value="<?php echo $id?$data_sort2[0]['sort2name']:''; ?>"  class="text-input medium-input datepicker" /></p>
					
					<p><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
					<?php if($id){ ?>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
					<?php } ?>
					</p>
			</form>
	</div> 
</div>