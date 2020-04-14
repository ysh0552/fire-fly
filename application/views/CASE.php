<div style=" height:180px; background:#648333;">
   <div class="main main_flex">
      <span>CASE STUDIES</span>
   </div>
</div>

<div style=" padding:47px 0; background:#f8f8f8;">
   <div class="main main_flex flex_wrap">
   <?php foreach ($data_case as $key => $value): ?>
      <a href="<?php echo site_url('cases/casecon').'/'.$value['id']; ?>"><img data-out="<?php echo base_url('upload').'/'.$value['curFile']; ?>" data-over="<?php echo base_url('resources/images/pic_3.png'); ?>" src="<?php echo base_url('upload').'/'.$value['curFile']; ?>" width="320" height="420"></a>
   <?php endforeach; ?>
   </div>
</div>

<script type="text/javascript">
$('.flex_wrap > a > img').mouseover(function(event) {
   $(this).attr('src',$(this).attr('data-over'));
});
$('.flex_wrap > a > img').mouseout(function(event) {
   $(this).attr('src',$(this).attr('data-out'));
});
</script>
