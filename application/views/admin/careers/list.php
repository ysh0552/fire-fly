<script>
	$('.ajax_fpage').click(function(e){
	var url = $(this).attr(href);
	alert(1);
			$.get(url,{},function(res){
				  $('#show_what_table').html(res);
			});
	event.preventDefault();
	});
</script>

<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3>文章列表</h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<table>
				<thead>
					<tr>
						<th>编号</th>
						<th>标题</th>
						<th>创建时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
			
					<?php foreach($data_careers as $item): ?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['title']; ?></td>
						<td><?php echo $item['createtime']; ?></td>
						<td><!-- Icons --> 
							<a href="<?php echo site_url('a_careers/edit').'/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp; 
                            <a href="<?php echo site_url('a_careers/delete').'/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a></td>
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
		</div>
		<!-- End #tab1 -->
	</div>
	<!-- End .content-box-content --> 
	
</div>
