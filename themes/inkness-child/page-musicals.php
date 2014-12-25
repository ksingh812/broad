<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Inkness
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">
			<?php // the query
				$the_query = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'portfolio_page', 'portfolio_category' => 'musical' ) ); 
			?>
			<div class="row isotope" id="portfolio-list">
			<?php if ( $the_query->have_posts() ) : ?>
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $member_categorys = get_the_terms($post->ID,'portfolio_category'); ?>
					<?php foreach($member_categorys as $member_category):?>
						<?php $team_class.= ' '.$member_category->slug;?>
					<?php endforeach;?>
						<?php if ( has_post_thumbnail($post->ID) ) 
							{
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<img src="<?php echo $url; ?>" class="img-responsive wp-post-image" alt="<?php the_title()?>" />
							<?php
							}
							else
							{
								$url = '/wp-content/uploads/2014/11/tickethub-thumbnail.png';
							}
							?>
					<div id="element-item<?php echo $the_query->current_post+1?>" class="<?php echo trim($team_class); ?> element-item col-md-2 form-group" data-category="<?php echo trim($team_class); ?>">
						<article id="broadway">
							<a href="<?php echo get_permalink(); ?>">
							<img src="<?php echo $url; ?>" class="post-img">
							<div class="post-meta"><?php the_title(); ?> <br/>
							<span class="tkt"><i class="fa fa-ticket"></i> Buy Tickets</span>
							</div></a>
						</article>
					</div>
									
					<?php $team_class = '';?>					
				<?php endwhile; ?>
				<!-- end of the loop -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>	
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>