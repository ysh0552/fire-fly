
<div style=" background:#f8f8f8;">
    <ul class="main newlist">

    <?php foreach ($down as $key => $value): ?>

      <li style=" cursor: pointer;" onclick="window.location.href='<?php echo site_url('news/newscon').'/'.$value['id']; ?>'">
            <img src="<?php echo base_url('upload').'/'.$value['upfile']; ?>">
            <span><?php echo $value['createtime']; ?></span>
            <span><?php echo $value['title']; ?></span>
            <span><?php echo hmSubstr(strip_tags($value['content']),50); ?></span>
      </li>
      
      <?php endforeach; ?>

      

    </ul>



</div>

