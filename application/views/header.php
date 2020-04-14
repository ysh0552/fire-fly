<!DOCTYPE html>
<html>
   <head>
      <title>HOME</title>
      <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/style.css?1222') ?>">
   </head>

<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.jslides.js') ?>"></script>

<body>

<?php $url =$this->uri->segment(1); ?>
<div class="top">
<div class="top_en"><a href="#">EN</a> | <a href="<?php echo 'http://www.fire-fly.hk/cn' ?>">CN</a></div>
   <a href="<?php echo site_url('index') ?>" class="top-left"><img src="<?php echo base_url('resources/images/logo.jpg'); ?>"></a>
   <div class="top-right">
      <a <?php echo $url == 'environment'?'class="navon"':''; ?> href="<?php echo site_url('environment') ?>" >ENVIRONMENT</a>
      <a <?php echo $url == 'technology'?'class="navon"':''; ?> href="<?php echo site_url('technology') ?>">TECHNOLOGY</a>
      <a <?php echo $url == 'distributors'?'class="navon"':''; ?> href="<?php echo site_url('distributors/index/42'); ?>">DISTRIBUTORS</a>
      <a <?php echo $url == 'products'?'class="navon"':''; ?> href="<?php echo site_url('products') ?>">PRODUCTS</a>
      <a <?php echo $url == 'industries'?'class="navon"':''; ?> href="<?php echo site_url('industries') ?>">INDUSTRIES</a>
      <a <?php echo $url == 'cases'?'class="navon"':''; ?> href="<?php echo site_url('cases') ?>">CASE</a>
      <a <?php echo $url == 'news'?'class="navon"':''; ?> href="<?php echo site_url('news') ?>">NEWS</a>
      <a <?php echo $url == 'about'?'class="navon"':''; ?> href="<?php echo site_url('about') ?>">ABOUT</a>
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