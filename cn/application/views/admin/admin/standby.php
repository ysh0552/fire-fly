<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3><?php echo $this->uri->segment(3)=='1'?'专业团队':'金融产品'; ?></h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				<div class="content-box-content"> 
					<form action="<?php echo site_url('a_standby/save');?>" method="post" id="form1"  />
					<input type="hidden" name="hid" value="<?php echo $this->uri->segment(3); ?>"  />
					<p><textarea id="editor_id" name="content" rows="20"><?php echo $data_sort[0]['content']; ?></textarea></p>
                    <p>
                    	<input class="button" type="submit" name="button" value="    保 存    " />
                    </p>
			</form>
            
	<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
    <script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
        });
    </script>
	</div> 
</div>