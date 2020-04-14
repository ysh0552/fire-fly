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
            <th>地址</th>
            <th>内容</th>
            <th>编辑</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($contact as $item): ?>
          <tr>
            <td><?php echo $item['address']; ?></td>
            <td><?php echo $item['content']; ?></td>
            <td><a href="<?php echo site_url('a_contact/edit').'/'.$item['id']; ?>" title="编辑">编辑</a>
        <!--   | <a href="<?php echo site_url('a_contact/delete').'/'.$item['id']; ?>" title="删除" onclick="javascript:return confirm('是否删除');">删除</a></td>-->
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- End #tab1 --> 
    
  </div>
  <!-- End .content-box-content --> 
  
</div>
