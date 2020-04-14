<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>分类列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
						<table>
							<thead>
								<tr>
								   <th>编号</th>
								   <th>标题</th>
								   <th>编辑</th>
								</tr>
							</thead>
							
							<tbody>
								
							<?php foreach($data_sort as $item): ?>
							<tr>
								<td><?php echo $item['id']; ?></td>
								
								<td><?php echo $item['title']; ?></td>
								<td>
								<a href="<?php echo site_url('a_links/edit').'/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
								
								</td>
							</tr>
							<?php endforeach; ?>
							
							</tbody>
							
							<tfoot>
								<tr>
									<td colspan="7">
										<?php //echo $links; ?>
									</td>
								</tr>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div>