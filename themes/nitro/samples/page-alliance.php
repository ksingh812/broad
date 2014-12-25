<?php get_header(regional); ?>
<div class="page-custom-hero jumbotron" id="web-solutions-hero">
	<div class="container">
		<h2 class="hero-title">Partner Alliance Program</h2><p>&nbsp;</p>
  		<p class="hero-content">A Partnership that Works. A Partnership that Wins.</p><p>&nbsp;</p>
	</div>
</div>
  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-md-8 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			    </div>
			</div>
		</div>
          
		<!-- Right Sidebar -->
		<div class="col-md-4 col-sm-4 col-xs-12" id="sidebar">
		<h4>Request Our Alliance Program Guide</h4>
			<?php gravity_form(148, false, false, false, '', false); ?>	
				
		</div>
		</div>    
  </div>

<?php get_footer(); ?>