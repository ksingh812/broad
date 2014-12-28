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
				$the_query = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'portfolio_page' ) ); 
			?>
			<ul class="list-inline button-group" id="filters" >  
				<li><a class="button is-checked" data-filter="*">All Shows</a></li>
				<?php $posttags = get_terms('portfolio_category');?>
				<?php if (!empty( $posttags ) && !is_wp_error( $posttags )):?>
					<?php foreach($posttags as $tag):?>
						<li><a class="button" data-filter=".<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
					 <?php endforeach; ?>			
				<?php endif;?>
			</ul>
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
							<!-- <div class="post-meta"><?php the_title(); ?> <br/>
								<span class="tkt"><i class="fa fa-ticket"></i> Buy Tickets</span>
							</div> -->
							</a>
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
<style type="text/css">#filters li{text-transform:uppercase;} #filters li:first-child a{padding-left:0px;} .element-item ul li a:hover,.element-item ul li a:focus{text-decoration:none;}</style>
<script src="http://isotope.metafizzy.co/isotope.pkgd.min.js"></script>
<script>
//Image Filter Plugin
//Use window load function instead of document ready here for better performance!!
jQuery(window).load(function() {
	// init Isotope
	var jQuerycontainer = jQuery('.isotope').isotope({
		itemSelector: '.element-item',
		layoutMode: 'fitRows',
		getSortData: {
			name: '.name',
			symbol: '.symbol',
			number: '.number parseInt',
			category: '[data-category]',
			weight: function( itemElem ) {
			var weight = jQuery( itemElem ).find('.weight').text();
			return parseFloat( weight.replace( /[\(\)]/g, '') );
			}
		}
	});

	// filter functions
	var filterFns = {
		// show if number is greater than 50
		numberGreaterThan50: function() {
			var number = jQuery(this).find('.number').text();
			return parseInt( number, 10 ) > 50;
		},
		// show if name ends with -ium
		ium: function() {
			var name = jQuery(this).find('.name').text();
			return name.match( /iumjQuery/ );
		}
	};

	// bind filter button click
	jQuery('#filters').on( 'click', '.button', function() {
		var filterValue = jQuery( this ).attr('data-filter');
		// use filterFn if matches value
		filterValue = filterFns[ filterValue ] || filterValue;
		jQuerycontainer.isotope({ filter: filterValue });
	});
  
	// change is-checked class on buttons
	jQuery('.button-group').each( function( i, buttonGroup ) {
		var jQuerybuttonGroup = jQuery( buttonGroup );
		jQuerybuttonGroup.on( 'click', '.button', function() {
			jQuerybuttonGroup.find('.is-checked').removeClass('is-checked');
			jQuery( this ).addClass('is-checked');
		});
	});	  
});
//Image Filter Plugin End	
</script>