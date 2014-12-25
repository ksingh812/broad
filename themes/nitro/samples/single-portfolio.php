<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
  
  <article>
	<!--- Start Body Content --->
		<div class="container" id="primary-content" role="main">
			<div class="row portfolio-single-header">
				<div class="col-sm-6 col-xs-12 section-content-square" >
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					<!--<img class="" src="http://nitro.durichitayat.net/uploads/2014/04/eastdil-porfolio.png" alt="porfolio-eastdil" />-->
				</div>
				<div class="col-sm-6 col-xs-12 section-content-square"  >
					<div class="portfolio-single-title">
						
							<h1>The Project Title</h1>
							<h3>Client</h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p><!--Excerpt-->
							
							<div class="footer-links-share">
                				<a href="#"><span class="icon icon-facebook"></span></a>
                				<a href="#"><span class="icon icon-twitter"></span></a> 
                				<a href="#"><span class="icon icon-youtube"></span></a>
                				<a href="#"><span class="icon icon-linkedin"></span></a> 
                				<a href="#"><span class="icon icon-googleplus"></span></a>            
                			</div>
                			
                			<p><?php $naw_url = get_post_meta( $post->ID, '_cd_naw_url', true );
								if ('' != $naw_url)	{ ?>
								<a href="<?php echo $naw_url; ?>" target="_blank" class=""><span class="glyphicon glyphicon-link"></span>View Project</a>
							</p> <?php } ?>
					
					</div>
				</div>
			</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="portfolio-single-content"><?php the_content('<p class="serif">Read the rest of this page »</p>'); ?></div>						
				</div>
			</div>
		</div>
	</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>