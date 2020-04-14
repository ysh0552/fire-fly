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
		<h3>列表</h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
            <div class="notification attention png_bg">
                <div>
                    分类：
                    <?php
                    $sort=$this->sort_model->user_sid_select(1);
                    foreach($sort as $item){
                        echo ' |  <a style=" font-weight:bold; " href="'.site_url().'/a_article/index/'.$item['id'].'">'.$item['sortname'].'</a> ';
                        
                    }
                    ?>
                </div>
            </div>
           	<table>
				<thead>
					<tr>
						<th>编号</th>
						<th>标题</th>
                        <th>分类</th>
                        <th>首页显示</th>
						<th>创建时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
			
					<?php foreach($data_moving as $item): ?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><a target="_blank" href="<?php echo site_url().'/dynamic/caseInner/'.$item['id']; ?>"><?php echo hmStrlen($item['title'])>50?hmSubstr($item['title'],50):$item['title'];  ?></a></td>
						<td><?php
						$info=$this->sort_model->user_select($item['sid']); 
						if($info ==false)
						{
							echo '未分类';
						}else{
							echo $info[0]['sortname'];
						}
						
						
						?></td>
						<td onclick="show(<?php echo $item['id']; ?>)" id="show<?php echo $item['id']; ?>" style="cursor:pointer; color:#00F;"><?php echo $item['index']==1?'是':'否'; ?></td>
						<td><?php echo $item['createtime']; ?></td>
						<td><!-- Icons --> 
							<a href="<?php echo site_url('A_article/edit').'/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp; 
                            <a href="<?php echo site_url('A_article/delete').'/'.$item['id'].'/'.$this->uri->segment(3); ?>" title="删除" onclick="javascript:return confirm('是否删除');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
                <script type="text/javascript">
                function show(id)
				{
					var url='<?php echo site_url('jquery/ajaxShow'); ?>';
					var show=$('#show'+id).html();
					if(show == '是'){
						var index=0;
						show='否';
					}else{
						var index=1;
						show='是';
					}
					
					
					$.get(url,{id:id,index:index},
					function(data){
						$('#show'+id).html(show);
					});
				}
                
                </script>
                
                
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
