<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>管理员列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
						<table>
							<thead>
								<tr>
								   <th>编号</th>
								   <th>登陆名</th>
								   <th>创建时间</th>
								   <th>编辑</th>
								</tr>
							</thead>
							
							<tbody>
								
							<?php foreach($data_admin as $item): ?>
								<tr>
									<td><?php echo $item['id']; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['createtime']; ?></td>
									<td>
										<!-- Icons -->
										 <a href="<?php echo site_url('a_admin/edit').'/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
										<!-- <a href="<?php echo site_url('a_admin/delete').'/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除 <?php echo $item['name']; ?> 管理员');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a>-->
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							
							<tfoot>
								<tr>
									<td colspan="7">
									<?php echo $links; ?>
									
									</td>
								</tr>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div>