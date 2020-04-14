

<div style=" height:420px; background:url('<?php echo base_url('resources/images/001 (1).jpg'); ?>') no-repeat scroll center 0 transparent;">
<div class="main">
   <ul class="icons">
  <?php foreach ($sort as $key => $value): ?>
      <li><a href="<?php echo site_url('products/index').'/'.$value['id']; ?>"><img src="<?php echo base_url('resources/images/icon_'.($key+1).'.png'); ?>"><span><?php echo $value['sortname']; ?></span></a></li>
  <?php endforeach; ?>
   </ul>
</div>
</div>



<div style="  background:#f8f8f8;">
   <div class="main">
         <div class="pro_titles">FIRELY</div>
         <ul class="pro_list">
          <?php foreach ($data_pro as $key => $value): ?>  
            <li><a href="<?php echo site_url('products/procontent').'/'.$value['id']; ?>"><img src="<?php echo base_url('upload').'/'.$value['upfile']; ?>" width="456" height="239"></a></li>
          <?php endforeach; ?>
         </ul>
   </div>

</div>

