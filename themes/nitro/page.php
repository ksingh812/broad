<?php get_header(); ?>
  <div class="container" role="main">
      <div class="row" id="primary-content">
		<!--- Start Body Content --->
		<div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			    </div>
			</div>
		</div>
		<!-- Right Sidebar -->
		<div class="col-lg-offset-1 col-md-3 col-sm-4 col-xs-12" id="sidebar">
			<?php get_sidebar(); ?>
		</div>
		</div>    
  </div>

<?php get_footer(); ?>