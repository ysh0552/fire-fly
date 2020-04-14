<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>后台管理</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/reset.css');?>" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/style.css');?>" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/invalid.css');?>" type="text/css" media="screen" />
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="/resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/jquery-1.4.4.min.js');?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/jquery.imagePreview.1.0.js');?>"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/simpla.jquery.configuration.js');?>"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/facebox.js');?>"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/jquery.wysiwyg.js');?>"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/jquery.datePicker.js');?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url('resources/scripts/jquery.date.js');?>"></script>
		<!--[if IE]><script type="text/javascript" src="/resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo base_url('/resources/admin/images/icons/admin_ico.ico'); ?>" type="image/x-icon"/>
	
</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->

				<!-- Logo (221px wide) -->
				<a href="#"><img id="logo" src="<?php echo base_url('resources/admin/images/logo.png');?>" alt="后台管理系统" /></a>
			  
				<!-- Sidebar Profile links -->
				
				<div id="profile-links">
					<p><a target="_blank" href="<?php echo site_url('index'); ?>">【前台页面】</a></p>
					当前用户：<a><?php echo $user_n; ?></a>
					<input type="hidden" name="user_n" value="<?php echo $user_n; ?>" /> | 
					<a href="<?php echo site_url('a_login/login_out'); ?>" title="退 出">退 出</a>
				</div>
				
				<ul id="main-nav"> <!-- Accordion Menu -->
					<li>
						<a href="#" class="nav-top-item" > <!-- Add the class "current" to current menu item -->
							常规管理
						</a>
                        <ul>
                        <?php $str=$this->uri->segment(1); ?>  
                        
                        
                        <li><a <?php echo $str=='a_ads'?'class="current"':''; ?> href="<?php echo site_url('a_ads'); ?>" >环境/首页轮播图</a></li>

                        <li><a <?php echo $str=='a_word1'?'class="current"':''; ?>  href="<?php echo site_url('a_word1'); ?>" >技术</a></li>

	                    <li><a <?php echo $str=='a_news'?'class="current"':''; ?>  href="<?php echo site_url('a_news'); ?>" >分销商</a></li>

	                    <li><a <?php echo $str=='a_product'?'class="current"':''; ?> href="<?php echo site_url('a_product'); ?>" >产品</a></li>
	                    
					    <li><a <?php echo $str=='a_ads1'?'class="current"':''; ?>  href="<?php echo site_url('a_ads1'); ?>" >工业</a></li> 
	                  
	                    <li><a <?php echo $str=='a_sort'?'class="current"':''; ?> href="<?php echo site_url('a_sort'); ?>" >产品分类</a></li>
                        <li><a <?php echo $str=='a_case'?'class="current"':''; ?> href="<?php echo site_url('a_case'); ?>" >案例</a></li>

	                    <li><a <?php echo $str=='a_down'?'class="current"':''; ?> href="<?php echo site_url('a_down'); ?>" >新闻</a></li>

					    <li><a <?php echo $str=='a_contact'?'class="current"':''; ?>  href="<?php echo site_url('a_contact/edit/8'); ?>" >关于</a></li> 


						

                        </ul>

               	   </li>
				 	<li>
						<a href="#" class="nav-top-item" >
							设置中心
						</a>
						<ul>
							<li><a <?php echo $str=='a_setting'?'class="current"':''; ?>  href="<?php echo site_url('a_setting/index/2'); ?>" >网站设置</a></li>
							<li><a <?php echo $str=='a_admin'?'class="current"':''; ?>  href="<?php echo site_url('a_admin'); ?>" >管理员</a></li>
                		</ul>
					</li> 
			</ul> <!-- End #main-nav -->
	
			</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
<div class="clear"></div> <!-- End .clear -->