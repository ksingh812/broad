<?php get_header(); ?>
	<div class="container wrapper">
		<?php // the query
			$the_query = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'team', 'order' => 'ASC' ) ); 
		?>		
		<ul class="list-inline button-group" id="filters" >  
			<li><a class="button is-checked btn" data-filter="*">Show all</a></li>
			<?php $posttags = get_terms('team_tag');?>
			<?php if ($posttags):?>
				<?php foreach($posttags as $tag):?>
					<li><a class="button btn" data-filter=".<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
				 <?php endforeach; ?>			
			<?php endif;?>
		</ul>
		<div class="row isotope" id="portfolio-list">
			<?php if ( $the_query->have_posts() ) : ?>
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $team_tags = get_the_terms($post->ID,'team_tag'); ?>
					<?php foreach($team_tags as $team_tag):?>
						<?php $team_class.= ' '.$team_tag->slug;?>
					<?php endforeach;?>
					<div id="element-item<?php echo $the_query->current_post+1?>" class="element-item col-lg-3 col-md-3 col-sm-3 form-group<?php echo $team_class; ?>" data-category="<?php echo trim($team_class); ?>">
						<a href="<?php echo get_permalink(); ?>">
							<?php the_post_thumbnail('full',array('class' => 'img-responsive')); ?>			
						</a>
						<?php the_title()?>
					</div>	
					<?php $team_class = '';?>					
				<?php endwhile; ?>
				<!-- end of the loop -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>			
		</div>				
	</div> <!-- /container -->
<?php get_footer(); ?>
<style type="text/css">#filters li{text-transform:uppercase;} #filters li:first-child a{padding-left:0px;}</style>
<script src="http://isotope.metafizzy.co/isotope.pkgd.min.js"></script>
<script>
//Image Filter Plugin
//Use window load function instead of document ready here for better performance!!
jQuery(window).load(function() {
	// init Isotope
	var jQuerycontainer = jQuery('.isotope').isotope({
		itemSelector: '.element-item',
		layoutMode: 'masonry',
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