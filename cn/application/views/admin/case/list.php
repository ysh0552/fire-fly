<script type="text/javascript">
$(function(){
	$("a.preview").preview();	  
});
</script>

<div class="content-box"><!-- Start Content Box -->
  
  <div class="content-box-header">
    <h3>列表</h3>
    <div class="clear"></div>
  </div>
  <!-- End .content-box-header -->
  
  <div class="content-box-content">
    <div class="tab-content default-tab">
      <table>
        <thead>
          <tr>
            <th>图片</th>
            <th>标题</th>
            <th>首页是否显示</th>
            <th>排序</th>
            <th>编辑</th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach($data_case as $item): ?>
          <tr>
            <td>
                <a onclick="return false" class="preview" href="<?php echo base_url('upload').'/'.$item['curFile']; ?>">
                    <img src="<?php echo base_url('upload').'/'.$item['curFile']; ?>" height="20" />
                </a>
            </td>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['index'] == 1?'是':'否'; ?></td>
            <td><?php echo $item['num']; ?></td>
            <td><!-- Icons --> 
            <a href="<?php echo site_url().'/a_case/edit/'.$item['id']; ?>"><img src="<?php echo base_url('resources/admin/images/icons/pencil.png');?>" alt="编辑" /></a>&nbsp;&nbsp;
            <a onclick="javascript:return confirm('是否删除');"  href="<?php echo site_url().'/a_case/delete/'.$item['id']; ?>"><img src="<?php echo base_url('resources/admin/images/icons/cross.png');?>" alt="删除" /></a>
            
          </tr>
          <?php endforeach;  ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7"><?php echo $links; ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- End #tab1 --> 
    
  </div>
  <!-- End .content-box-content --> 
  
</div>
