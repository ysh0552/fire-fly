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
								   <th>编号</th>
								   <th>姓名</th>
								   <th>留言时间</th>
								   <th>编辑</th>
								</tr>
							</thead>
							
							<tbody>
<link href="<?php echo base_url('resources/admin/css/showbox.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('resources/scripts/showbox.js'); ?>"></script>
							<?php foreach($msg as $item): ?>
							<tr>
								<td><?php echo $item['id']; ?></td>
								<td><?php echo $item['name']; ?></td>
								<td><?php echo $item['createtime']; ?></td>
								
								<td>
								<a class="thickbox" href="<?php echo site_url().'/a_msginfo/index/'.$item['id'].'/?TB_iframe=true&height=600&width=800';?>" title="查看" onclick="return false;"><img src="<?php echo base_url('resources/admin/images/icons/1.png');?>" alt="Delete" />&nbsp;&nbsp;
								<a href="<?php echo site_url('a_msg/delete').'/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a>
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