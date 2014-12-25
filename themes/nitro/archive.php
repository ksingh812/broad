<?php get_header(); ?>

<div class="container">			
			<div  id="main" class="container clearfix row">
			     <div id="primary-content" class="col-md-9 col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="row archive-row-item">
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
					</div>
					<div class="col-md-8">
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta"><span class="small"><?php _e("Posted on", "wpbootstrap"); ?> <time datetime="<?php echo the_time('F j, Y'); ?>" pubdate><?php the_time('F j, Y'); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp"></span>
							</br>
							Tags:
							<?php  $posttags = get_the_tags($post->ID);
									if ($posttags) {
										foreach($posttags as $tag) {
											echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> , ';
										}
									}
							?></span>
							</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_excerpt(); ?>
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					<hr>
					</div>
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

<?php get_footer(); ?>