
<div style=" height:180px; background:#648333;">
   <div class="main main_flex">
      <span>INDUSTRIES</span>
   </div>
</div>



<div style=" background:#f8f8f8; padding:50px 0;">
   <div class="main">
      <div class="indus">
      <?php foreach ($ind as $key => $value) :?>
         <a href="<?php echo site_url('industries/indcon').'/'.$value['id']; ?>"><img src="<?php echo base_url('upload').'/'.$value['upfile'] ?>"><span><?php echo $value['title']; ?></span></a>
      <?php endforeach; ?>

      </div>
   </div>
</div>
