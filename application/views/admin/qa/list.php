<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>内容列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> 
						<table>
							<thead>
								<tr>
								   <th>排序</th>
								   <th>标题</th>
								   <th>操作</th>
								</tr>
							</thead>
							
							<tbody>
								
							<?php foreach($qa_list as $item): ?>
								<tr>
									<td><?php echo $item['sort']; ?></td>
									<td><?php echo $item['title']; ?></td>
									<td>
										<!-- Icons -->
										 <a href="<?php echo site_url('a_qa/edit').'/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
										 <a onclick="javascript:return confirm('是否删除');" href="<?php echo site_url('a_qa/delete').'/'.$item['id']; ?>" title="删除"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete"  /></a>&nbsp;&nbsp;
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