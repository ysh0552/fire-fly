<!DOCTYPE html>
<html>
   <head>
      <title>首頁</title>
      <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/style.css') ?>?<?php echo time(); ?>">
   </head>

<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.jslides.js') ?>"></script>

<body>

<?php $url =$this->uri->segment(1); ?>
<div class="top">
<div class="top_en"><a href="http://www.fire-fly.hk">EN</a> | <a href="#">CN</a></div>
   <a href="<?php echo site_url('index') ?>" class="top-left"><img src="<?php echo base_url('resources/images/logo.jpg'); ?>"></a>
   <div class="top-right">
      <a <?php echo $url == 'environment'?'class="navon"':''; ?> href="<?php echo site_url('environment') ?>" >環境</a>
      <a <?php echo $url == 'technology'?'class="navon"':''; ?> href="<?php echo site_url('technology') ?>">技術</a>
      <a <?php echo $url == 'distributors'?'class="navon"':''; ?> href="<?php echo site_url('distributors/index/42'); ?>">分銷商</a>
      <a <?php echo $url == 'products'?'class="navon"':''; ?> href="<?php echo site_url('products') ?>">產品</a>
      <a <?php echo $url == 'industries'?'class="navon"':''; ?> href="<?php echo site_url('industries') ?>">行業</a>
      <a <?php echo $url == 'cases'?'class="navon"':''; ?> href="<?php echo site_url('cases') ?>">案例</a>
      <a <?php echo $url == 'news'?'class="navon"':''; ?> href="<?php echo site_url('news') ?>">新聞</a>
      <a <?php echo $url == 'about'?'class="navon"':''; ?> href="<?php echo site_url('about') ?>">關於</a>
   </div>
</div>

<!--slide-->
<div id="full-screen-slider">
   <ul id="slides">

   <?php foreach ($ads as $key => $value):?>
      <li style="background:url('<?php echo base_url('upload').'/'.$value['upfile'] ?>') no-repeat center top"><a href="<?php echo $value['links'] ?>"></a></li>
   <?php endforeach; ?>

   </ul>
</div>