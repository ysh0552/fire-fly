

<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><?php echo $title_text; ?></h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_links/save');?>" method="post" id="form1"  enctype="multipart/form-data" />
					<input type="hidden" name="id" value="<?php echo $id?$id:''; ?>" />
					
					<p>超链接：<input type="text" name="links" value="<?php echo $id?$data_sort[0]['links']:'#'; ?>"  class="text-input medium-input datepicker" /></p>
					
					<p><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
					<?php if($id){ ?>
                       <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
					<?php } ?>
					</p>
			</form>
	</div> 
</div>