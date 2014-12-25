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
    <div id="wrap">       
        <nav class="navbar yamm navbar-default navbar-static-top" role="navigation" id="header"><!-- HEADER NAVSTART -->
          <div class="container">      
            <div class="col-xs-12 col-md-2 navbar-branding-container"> <!-- HEADER LEFT START--> 
              <div class="navbar-header">                                     
                <a class="navbar-brand pull-left" href="<?php bloginfo('url'); ?>">
                  <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"><!--LOGO-->
                </a> 
                  
                <button type="button" class="navbar-toggle-mobile navbar-toggle pull-right" data-toggle="collapse" data-target="#topnav"><!--MOBILE MENU --> 
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
                  
              </div>
      
            </div><!-- HEADER LEFT END--> 
              
            <div class="col-xs-12 col-md-10"><!--HEADER RIGHT START-->
                    <div class="row hidden-sm hidden-xs"><!-- UTILITY MENU START-->
                        <div class="col-sm-12">
                            <ul class="nav" id="utility-nav">
                                <li class="navbar-right"><?php get_search_form(); ?></li>
                                <li class="navbar-text navbar-right"><a href="/assist/" class="navbar-link"><span class="glyphicon glyphicon-comment"></span>  Remote Support</a></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon-earphone"></span>  1-800-719-3307</a></li>
                            </ul>
                        </div>
                    </div><!-- UTILITY MENU END-->
                    
                    <div class="row"><!-- PRIMARY MENU START -->
                        <div class="col-sm-12">
                            <div class="collapse navbar-collapse" id="topnav">
                                
                                    <ul class="nav navbar-nav navbar-right" id="primary">
  
										<!-- 4 -->                                       
                                        <li class="dropdown navbar-right">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Support</a>
                                            <ul class="dropdown-menu">
                                                    <?php
                                                    $menuParameters = array(
                                                        //'theme_location' => 'resources',
														'menu'            => 'Support',
                                                        'container'       => false,
                                                        'echo'            => false,
                                                        'items_wrap'      => '%3$s',
                                                        'depth'           => 0, 
                                                        'walker'          => ''
                                                    );
                                                    echo strip_tags(wp_nav_menu( $menuParameters ), '<li><a>' ); ?>
                                            </ul>
                                        </li>
                                        
                                        
                                          <!-- 3 -->
                                            <li class="dropdown navbar-right">
												<a href="#" data-toggle="dropdown" class="dropdown-toggle">Company</a>
												<ul class="dropdown-menu">
														<?php
														$menuParameters = array(
															'theme_location' => 'Company', 
															'container'       => false,
															'echo'            => false,
															'items_wrap'      => '%3$s',
															'depth'           => 0, 
															'walker'          => ''
														);
														echo strip_tags(wp_nav_menu( $menuParameters ), '<li><a>' ); ?>
												</ul>
											</li>
                                            
                                            <!-- 2 -->
                                            <li class="dropdown navbar-right">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Learning</a>
                                            <ul class="dropdown-menu">
                                                    <?php
                                                    $menuParameters = array(
                                                        'theme_location' => 'resources',
                                                        'container'       => false,
                                                        'echo'            => false,
                                                        'items_wrap'      => '%3$s',
                                                        'depth'           => 0, 
                                                        'walker'          => ''
                                                    );
                                                    echo strip_tags(wp_nav_menu( $menuParameters ), '<li><a>' ); ?>
                                            </ul>
											</li>
                                            
                                            <!-- 1 -->
                                            <li class="dropdown yamm-fw navbar-right">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Solutions & Services</a>
                                              <ul class="dropdown-menu">
                                                <li class="yamm-content">
                                                  <div class="row">
                                                    <div class="col-sm-4">
                                                       <h4>Business Applications</h4>
                                                         <?php wp_nav_menu( array(
                                                         'theme_location' => 'Business Solutions',
  														//'menu'            => 'Solutions and Services',
                                                           'echo'            => true,
                                                          'fallback_cb'     => 'wp_page_menu',
                                                          'depth'           => 1,
                                                          'walker'          => ''
                                                      )); ?></div>
                                                   <div class="col-sm-4"><h4>System Integration</h4>
                                                         <?php wp_nav_menu( array(
                                                         'theme_location' => 'System Integration',
  														//'menu'            => 'products',
                                                          'echo'            => true,
                                                          'fallback_cb'     => 'wp_page_menu',
                                                          'depth'           => 1,
                                                          'walker'          => ''
                                                      )); ?></div>
                                                   <div class="col-sm-4"><h4>Web Solutions</h4>
                                                       <?php wp_nav_menu( array(
                                                         'theme_location' => 'Web Solutions',
 														//'menu'            => 'products',
                                                         'echo'            => true,
                                                         'fallback_cb'     => 'wp_page_menu',
                                                         'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                                                         'depth'           => 1,
                                                         'walker'          => ''
                                                     )); ?>
                                                    </div>
                                                  </div>
												</li>
											</ul>                                
  
                        </div><!-- Collapse -->
                    </div><!-- PRIMARY MENU END -->                    
                </div>
           
            </div>
        </div><!--HEADER RIGHT END-->
        </nav><!-- HEADER NAV END -->        
  