<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head><!--HEAD START-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="author" content="">
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head><!--HEAD END-->
    
<body class="custom-background woocommerce">
  <div class="outter-container">
    <div id="wrap">       
        <nav class="navbar navbar-default" role="navigation" id="header">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="/wp-content/themes/nitro/images/logo.png"></a> <!--LOGO-->
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  
			  <ul class="nav navbar-nav navbar-right">
				<?php wp_nav_menu( array('menu' => 'Primary','container'=> '','items_wrap' => '%3$s')); ?>
			  </ul>
			</div><!-- /.navbar-collapse -->

		  </div><!-- /.container-fluid -->
		</nav>

          
        <div id="content">   
                   
        <!-- BREADCRUMBS -->
        <?php if ( function_exists('yoast_breadcrumb') ) { ?>
        <div id="breadcrumbs-banner">
          <div class="container">
                
                <?php yoast_breadcrumb('<p id="breadcrumbs" class="small">','</p>'); ?>
               
          </div>
        </div>
        <?php  } ?>