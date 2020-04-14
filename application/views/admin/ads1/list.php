<div class="content-box"><!-- Start Content Box -->
		
				<div class="content-box-header">
					
					<h3>列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
						<table>
							<thead>
								<tr>
								   <th>对应页面</th>
								   <th>图片</th>
                                   <th>排序</th>
								   <th>编辑</th>
								</tr>
							</thead>
	
							<tbody>
							<?php foreach($data_ads as $item): ?>
							
								<tr>
									<td><?php echo $item['title']; ?></td>
									<td><a onclick="return false" href="<?php
								echo base_url('upload').$item['upfile']; ?>">
								<img class="list_img" src="<?php
								echo base_url().'upload/'.$item['upfile']; ?>" width="50" height="50" />
								</a>
								</td>
								    <td><?php echo $item['sort']; ?></td>
									<td>
										<!-- Icons -->
                                        
	<a href="<?php echo site_url().'/a_ads1/edit/'.$item['id']; ?>" title="修改"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
                                
                             <a href="<?php echo site_url().'/a_ads1/delete/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除 “<?php echo $item['title']; ?>” ');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a>
                                    
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div>