<?php get_header(); ?>
<div class="jumbotron" id="blog-hero">
	<div class="container">
		<?php
			$args = array(
			'posts_per_page' => 1,
			'post__in'  => get_option( 'sticky_posts' ),
			);
			$query = new WP_Query( $args );
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		<div class="col-md-4">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $url;?>" width="100%" height="auto"></a>
		</div>
		<div class="col-md-8"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
  		<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md pull-right">Learn More <span class="glyphicon glyphicon-chevron-right triggered"></span></a></p>
		</div>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</div>
<div class="container">			
			<div  id="primary-content" class="container clearfix row">
			     <div id="main" class="col-md-9 col-sm-8 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts Categorized:", "wpbootstrap"); ?></span> <?php single_cat_title(); ?>
						</h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "wpbootstrap"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "wpbootstrap"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "wpbootstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>
					</div>
					<div class="row">
					<?php 
					/* <----- DO NOT DELETE ---->
					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('ignore_sticky_posts=1&showposts=10'.'&paged='.$paged);
					*/
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					'posts_per_page' => 10,
					'post__not_in' => get_option( 'sticky_posts' ), 
					'paged' => $paged);
					
					$wp_query = new WP_Query($args);
					if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
					</div>
					<div class="col-md-8">
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta"><span class="small"><?php _e("Posted on", "wpbootstrap"); ?> <time datetime="<?php echo the_time('F j, Y'); ?>" pubdate><?php the_time('F j, Y'); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp"></span>
							</p>
							
						
						</header> <!-- end article header -->
					
						<section class="post_content">
						
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							<div class="itemTagsBlock">
							<ul>
							<?php  $posttags = get_the_tags($post->ID);
									if ($posttags) {
										echo '<li><span class="glyphicon glyphicon-tags"></span></li>';
										foreach($posttags as $tag) {
											echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> </li> ';
										}
									}
							?></span>
							</ul>
							</div>
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					<hr>
					</div>
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>

						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="pager">
								<li class="previous"><?php next_posts_link(_e('', "wpbootstrap")) ?></li>
								<li class="next"><?php previous_posts_link(_e('', "wpbootstrap")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
					<?php 
				//ADD MENU
				/*$args = array(
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
				wp_nav_menu( $args); */?>
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
				
			</div> <!-- end #content -->
        </div> <!-- END-CONTAINER-->

<?php
wp_reset_query();
 get_footer(); ?>