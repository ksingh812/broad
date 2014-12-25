<?php get_header(); ?>

<div class="container">			
			<div  id="primary-content" class="container clearfix row">
			     <div id="main" class="col-md-9 col-sm-8 clearfix" role="main">
				
					<div class="page-header">
						<!-- STORE AUTHO INFORMATION -->
						<?php 
							$author_name = get_the_author_meta('display_name');
							$author_bio = get_the_author_meta('description'); 
							$author_google = get_the_author_meta($field = 'googleplus');
							$author_twitter = get_the_author_meta($field = 'twitter');
							$author_facebook = get_the_author_meta($field = 'facebook');
						?>
						<div class="media">
							<a class="pull-left" href="#">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
							</a>
							<div class="media-body">
							<h1 class="media-heading"><?php echo $author_name;?></h1>
							<?php echo $author_bio;?>
							
							<span class="social">
								<br/><br/>Follow : 
								<?php if ($author_google !='') : ?>
								<a href="<?php echo $author_google; ?>" target="_blank"><span class="icon icon-googleplus"></span></a>
								<?php endif ?>
								<?php if ($author_twitter !='') : ?>
								<a href="http://www.twitter.com/<?php echo $author_twitter; ?>" target="_blank"><span class="icon icon-twitter"></span></a>
								<?php endif ?>
								<?php if ($author_facebook !='') : ?>
								<a href="<?php echo $author_facebook; ?>" target="_blank"><span class="icon icon-facebook"></span></a>
								<?php endif ?>
							</span>
						  </div>
						</div>
					</div>
					<h5>
						<span><?php _e("Posts By:", "wpbootstrap"); ?></span> <?php echo $author_name;?>
					</h5>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta"><?php _e("Posted", "wpbootstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('Y-m-j'); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp"></span></p>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
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
				wp_nav_menu( $args); ?>
				
				<!-- DISPLAY CATEGORIES -->
				<h5>Categories: </h5>
				<?php wp_list_categories(array('title_li' => __(''))); ?>
				
				<!-- DISPLAY AUTHORS -->
				<h5>Authors: </h5>
				<?php wp_list_authors(); ?>
				
				</div>
			</div> <!-- end #content -->
        </div> <!-- END-CONTAINER-->

<?php get_footer(); ?>