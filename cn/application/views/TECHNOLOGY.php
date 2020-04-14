
<div style=" height:180px; background:#648333;">

   <div class="main main_flex">
      <span>技術</span>
   </div>

</div>

<?php foreach ($word1 as $key => $value): ?>

<div style=" height:420px; background:#<?php echo $key%2 == 0?'f7f7f7':'e9e9e9'; ?>;">
   <ul class="main main_flex list">
      <li><img src="<?php echo base_url('upload').'/'.$value['upfile']; ?>" width="239" height="240"></li>
      <li class="listinfo"><?php echo $value['content']; ?></li>
   </ul>
</div>
<?php endforeach; ?>
