<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="row">
			<div class="page-section-custom text-center" id="page-section-work"> <!--PAGE WRAPER -->
			
				<!-- @TODO: BANNER/STATEMENT --> 		
			
				<!-- START PORTFOLIO LOOP -->
				<?php
					//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					//$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 10, 'paged' => $paged);
					$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1);
					$loop = new WP_Query( $args );	
					$count = 0;
					 if ( $loop->have_posts() )
					{
					 while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<?php get_template_part( 'part', 'web-portfolio-item' ); ?>

				<?php endwhile; ?>
				<!-- Pagination LINKS Disabled
				<span class="next"><?php //next_posts_link( 'Older posts', $loop->max_num_pages ); ?></span>
				<span class="prev"><?php //previous_posts_link( 'Newer posts', $loop->max_num_pages ); ?></span> -->
				<?php } //endif	?>
				 </div>
				  </div>
	 </div><!--END-ROW-->     
  </div><!--END-MAIN-->

<div id="footer-callout-web">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3>Are you ready to grow your online business? <a href="#" class="btn btn-primary btn-lg pull-right">TALK TO A SPECIALIST</a></h3>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>