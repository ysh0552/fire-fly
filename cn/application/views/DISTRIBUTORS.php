<div style=" height:180px; background:#648333;">
   <div class="main main_flex">
      <span>分銷商</span>
   </div>
</div>

<?php $str = $this->uri->segment(3);  ?>

<div style=" background:#f8f8f8;">
   <div class="main" style="padding-bottom:50px; width:1000px;">
      <div class="ind_title">
         <a href="<?php echo site_url('distributors/index/42'); ?>" <?php echo $str == 42?'class="ind_on"':''; ?> >歐洲</a>
         <a href="<?php echo site_url('distributors/index/43'); ?>" <?php echo $str == 43?'class="ind_on"':''; ?>>美洲</a>
         <a href="<?php echo site_url('distributors/index/44'); ?>" <?php echo $str == 44?'class="ind_on"':''; ?>>中東</a>
         <a href="<?php echo site_url('distributors/index/45'); ?>" <?php echo $str == 45?'class="ind_on"':''; ?>>非洲</a>
         <a href="<?php echo site_url('distributors/index/46'); ?>" <?php echo $str == 46?'class="ind_on"':''; ?>>亞洲/大洋洲</a>
      </div>

      <ul class="ind_ico">

      <?php foreach ($data_news as $key => $value):?>
         <li onclick="window.location.href='<?php echo site_url('distributors/newscon').'/'.$value['id']; ?>'"><img src="<?php echo base_url('upload').'/'.$value['upfile']; ?>" width="113" height="78"><span><?php echo $value['title']; ?></span></li>
      <?php endforeach; ?>
     
      </ul>
   </div>
</div>