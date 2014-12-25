<?php $i=0; ?>
<?php $featuredCheck = false ?>
<?php get_header(); ?>

		
<div  id="main" class="container clearfix" role="main">
	<div class="row featuredItem">
		<div class="col-sm-4 col-md-3" id="sidebar">
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
				wp_nav_menu( $args ); 
			?>
		</div>
		<div class="col-sm-8 col-md-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(!$featuredCheck): ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
							<div class="item-img">
								<?php if(has_post_thumbnail()): ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(  ); ?></a><?php endif; ?>
							</div>

							<?php 
								$category = wp_get_post_terms($post->ID, 'resource_category', array("fields" => "all"));
								if($category[0]){
									echo '<a class="catTag" href="'.get_term_link($category[0]->term_id, $category[0]->taxonomy ).'">'.$category[0]->name.'</a>';
								}
							?>

							<div class="item-content">
								<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								
								<p class="meta">
									<span class="small"><?php _e("Posted on", "wpbootstrap"); ?> <time datetime="<?php echo the_time('F j, Y'); ?>" pubdate><?php the_time('F j, Y'); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp"></span>
									</br>
									<?php  $posttags = get_the_tags($post->ID);
										if ($posttags) {
											echo 'Tags: ';
											foreach($posttags as $tag) {
												echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>, ';
											}
										}
									?></span>
								</p>
							</div>
							
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_excerpt(); ?>
						</section> <!-- end article section -->
					
					</article> <!-- end article -->
				<?php else: ?>
					<?php break; ?>
				<?php endif; ?>
				<?php $featuredCheck = true; ?>
			<?php endwhile;endif; ?>
		</div>
	</div>

	<div class="row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-4 archive-row-item">
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<header>
						<div class="item-img">
							<?php if(has_post_thumbnail()): ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(  ); ?></a><?php endif; ?>
						</div>

						<?php 
							$category = wp_get_post_terms($post->ID, 'resource_category', array("fields" => "all"));
							if($category[0]){
							echo '<a class="catTag" href="'.get_term_link($category[0]->term_id, $category[0]->taxonomy ).'">'.$category[0]->name.'</a>';
							}
						?>

						<div class="item-content">
							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							
							<p class="meta">
								<span class="small"><?php _e("Posted on", "wpbootstrap"); ?> <time datetime="<?php echo the_time('F j, Y'); ?>" pubdate><?php the_time('F j, Y'); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp"></span>
								</br>
								<?php  $posttags = get_the_tags($post->ID);
									if ($posttags) {
										echo 'Tags: ';
										foreach($posttags as $tag) {
											echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>, ';
										}
									}
								?></span>
							</p>
						</div>
						
					</header> <!-- end article header -->
				
					<section class="post_content">
						<?php the_excerpt(); ?>
					</section> <!-- end article section -->
				
				</article> <!-- end article -->
			</div>
	<?php $i+=1;if($i%3 == 0): ?>
	</div>
	<div class="row">
	<?php endif; ?>
	<?php endwhile; ?>
	</div>
	
	<?php if (function_exists('page_navi')) { // if experimental feature is active ?>

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

</div> <!-- end #content -->


<?php get_footer(); ?>