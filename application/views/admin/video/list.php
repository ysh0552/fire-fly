<div class="content-box"   ><!-- Start Content Box -->
		
				<div class="content-box-header">
					
					<h3>新闻列表</h3>
				
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab"> 
						<table>
							<thead>
								<tr>
                                   <th>图片</th>
								   <th>标题</th>
								   <th>创建时间</th>
								   <th>版本</th>
                                   <th>排序</th>
								   <th>编辑</th>
								</tr>
							</thead>
	
							<tbody>
							<?php $i=0; foreach($data_video as $item): ?>
							
								<tr <?php echo $i%2 == 0?'class="alt-row"':''; ?>>
                                <td><img src="<?php echo base_url('upload').'/'.$item['upfile1']; ?>" width="50" height="50" /></td>
									<td><?php echo $item['title']; ?></td>
                                   
									<td><?php echo $item['createtime']; ?></td>
                                    <td><?php echo $item['copy']; ?></td>
                                    <td><?php echo $item['sort']; ?></td>
									<td>
                                    <a href="<?php echo site_url('a_video/edit').'/'.$item['id']; ?>">编辑</a> | 
								    <a onclick="javascript:return confirm('是否删除');" href="<?php echo site_url('a_video/delete').'/'.$item['id']; ?>">删除</a>
							
									</td>
								</tr>
								<?php $i++; endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="7">
										<?php echo $pages; ?>
									</td>
								</tr>
							</tfoot>
							
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div>

