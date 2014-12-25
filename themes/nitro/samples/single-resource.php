<?php get_header('resources'); ?>

  <div class="container" role="main">
      <div class="row">
		<!--- Start Body Content --->
		<div id="primary-content-resources" class="col-md-12 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			    </div>
			</div>
		</div>
		</div>    
	 
  </div>

<?php get_footer(); ?>