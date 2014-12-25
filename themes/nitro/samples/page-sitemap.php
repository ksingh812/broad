<?php get_header(); ?>

<div class="container">			
			<div  id="primary-content" class="container clearfix row">
			     <div id="main" class="col-md-9 col-sm-8 clearfix" role="main">
												
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				
						<section class="post_content">
					
							<ul><?php wp_list_pages('title_li='); ?></ul>
					
						</section> <!-- end article section -->
					
					</article> <!-- end article -->		
				</div> <!-- end #main -->
				<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
					
				</div>
			</div> <!-- end #content -->
        </div> <!-- END-CONTAINER-->

<?php get_footer(); ?>