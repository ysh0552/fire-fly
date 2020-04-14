<div class="content-box"><!-- Start Content Box -->
  
  <div class="content-box-header">
    <h3>列表</h3>
    <div class="clear"></div>
  </div>
  <!-- End .content-box-header -->
  
  <div class="content-box-content">
    <div class="tab-content default-tab" id="tab1">
      <table>
        <thead>
          <tr>
            <th>标题</th>
            <th>类型</th>
            <th>大小</th>
            <th>创建时间</th>
            <th>编辑</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data_solutions as $item): ?>
          <tr>
            <td><img src="<?php echo base_url().'upload/solutions/'.$item['curFile']; ?>" width="69" height="66" /><?php echo $item['title']; ?></td>
            
            <td><?php echo $item['index'] == 1?'是':'否'; ?></td>
            <td><?php  
				$info=$this->sort_model->user_select($item['sid']);
				if($info)
				{
					echo $info[0]['sortname'];
				}else{
					echo '未分类';
				}
				?></td>
            <td><?php echo $item['createtime']; ?></td>

            <td><!-- Icons --> 
				<a href="<?php echo site_url().'/a_solutions/edit/'.$item['id']; ?>" title="编辑"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="Edit" /></a>&nbsp;&nbsp;
				<a href="<?php echo site_url().'/a_solutions/delete/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除');"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="Delete" /></a>

            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- End #tab1 --> 
  </div>
  <!-- End .content-box-content --> 
</div>