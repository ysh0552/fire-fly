
<div style=" height:420px; background:url('<?php echo base_url('resources/images/002.jpg'); ?>') no-repeat scroll center 0 transparent;">
<div class="main">
   <div class="abouts">ABOUT FIRELY</div>
   <ul class="abouts_content">

      <li><?php echo strip_tags($contact[0]['content']); ?>
      </li>
      <li style="width:8%;"></li>
      <li><img src="<?php echo base_url('upload').'/'.$contact[0]['address']; ?>" width="456" height="239"></li>

   </ul>
</div>
</div>

<div style=" height:420px; background:url('<?php echo base_url('resources/images/003.jpg'); ?>') no-repeat scroll center 0 transparent;">
<div class="main">
   <ul class="icons">
  <?php foreach ($sort as $key => $value): ?>
      <li><a href="<?php echo site_url('products/index').'/'.$value['id']; ?>"><img src="<?php echo base_url('resources/images/icon_'.($key+1).'.png'); ?>"><span><?php echo $value['sortname']; ?></span></a></li>
  <?php endforeach; ?>
   </ul>
</div>
</div>



<div style=" height:420px; background:#f8f8f8;">
<div class="main">
   <div class="abouts">NEW</div>
   <ul class="abouts_content">

      <li><img src="<?php echo base_url('upload').'/'.$down[0]['upfile']; ?>"></li>
      <li style="width:8%;"></li>
      
      <li class="words"><?php echo strip_tags($down[0]['content']); ?>
      </li>

   </ul>
</div>
</div>

<div style=" height:420px; background:#6c6c6c;">

   <div class="main2">

<?php foreach ($case as $key => $value): ?>

      <a href="<?php echo site_url('cases/casecon').'/'.$value['id']; ?>"><img data-out="<?php echo base_url('upload').'/'.$value['curFile']; ?>" data-over="<?php echo base_url('resources/images/pic_3.png'); ?>" src="<?php echo base_url('upload').'/'.$value['curFile']; ?>" width="320" height="420"></a>
     
<?php endforeach; ?>

   </div>

<script type="text/javascript">
$('.main2 > a > img').mouseover(function(event) {
   $(this).attr('src',$(this).attr('data-over'));
});
$('.main2 > a > img').mouseout(function(event) {
   $(this).attr('src',$(this).attr('data-out'));
});
</script>


</div>


<div style=" height:420px; background:#f8f8f8;">

<div class="main">
<div class="abouts">TECHNOLOGY</div>

   <ul class="logos">
   <?php foreach ($word1 as $key => $value): ?>
      <li><img src="<?php echo base_url('upload').'/'.$value['upfile']; ?>" width="182" height="182"></li>
   <?php endforeach; ?> 
   </ul>
</div>

</div>

