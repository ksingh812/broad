<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			    </div>
			</div>
		</div>
          
		<!-- Right Sidebar -->
		<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
		<?php /*				
				$args = array(
                    'theme_location'  => '',
                    'menu'            => 'Company Information',
                    'items_wrap'      => '%3$s',
                    'depth'           => 2,
                    // ADDED NAVWALKER HERE                
                    'container'         => 'div',
                    'container_class'   => 'page-sidebar-nav',
                    'container_id'      => 'page-sidebar-nav',
                    'menu_class'        => 'list-group menu_class',
                    'fallback_cb'       => 'page_sidebar_navwalker::fallback',
                    'walker'            => new page_sidebar_navwalker()
                );
				wp_nav_menu( $args); */ ?>
				<span class="blog-sidebar">
				<!-- DISPLAY CATEGORIES -->
				<h5>Categories: </h5>
				<?php wp_list_categories(array('title_li' => __(''))); ?>
				
				<!-- DISPLAY AUTHORS -->
				<h5>Authors: </h5>
				<?php wp_list_authors(); ?>
				
				<!-- DISPLAY ARCHIVES -->
				<h5>Archives: </h5>
				<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 15, 'title_li' => __('') ) ); ?>
				</span>
		</div>
		</div>    
	 
  </div>

<?php get_footer(); ?>