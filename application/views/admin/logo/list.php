<script type="text/javascript">
$(function(){
	$("a.preview").preview();	  
});
</script>

<div class="content-box"><!-- Start Content Box -->
		
				<div class="content-box-header">
					
					<h3>广告列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
						<table>
							<thead>
								<tr>
								   <th>图片</th>
								   <th>名称</th>
								   <th>编辑</th>
								</tr>
							</thead>
	
							<tbody>
							<?php foreach($data_logo as $item): ?>
								<tr>
									<td><a onclick="return false" class="preview" href="<?php
									echo base_url().'upload/logo/'.$item['upfile']; ?>">
									<img class="list_img" src="<?php
									echo base_url().'upload/logo/'.$item['upfile']; ?>" width="200" height="50" />
									</a>
									</td>
									<td><?php echo $item['title']; ?></td>
									<td>
									
                                    <!-- Icons -->
                                    <a href="<?php echo site_url().'/a_logo/edit/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
									
									<a href="<?php echo site_url().'/a_logo/delete/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除 “<?php echo $item['title']; ?>” 图');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							
							<tfoot>
								<tr>
									<td colspan="7">
										
									</td>
								</tr>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div>