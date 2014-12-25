<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-sm-9 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<?php
					//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					//$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 10, 'paged' => $paged);
					$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1);
					$loop = new WP_Query( $args );	
					
					 if ( $loop->have_posts() )
					{
					 while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="col-sm-4 col-xs-12">
						<div class="thumbnail">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							$thumb = the_post_thumbnail(array(300,220));
							}  
							$naw_url = get_post_meta( $post->ID, '_cd_naw_url', true );
							if ('' != $naw_url)
							{
								$siteurl = '<a href="' .$naw_url. '" target="_blank" class="btn btn-info btn-xs" role="button">Visit Site </a>';
							}
							else
							{
								$siteurl = '';
							}
							?>
							<img data-src="<?php echo $thumb; ?>">
						  <div class="caption">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php the_excerpt(); ?></p>
							<p><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-xs" role="button">Read More!</a> &nbsp; <?php echo $siteurl; ?></p>
						  </div>
						</div>
					</div>
				<?php endwhile; ?>
				<!-- Pagination LINKS Disabled
				<span class="next"><?php //next_posts_link( 'Older posts', $loop->max_num_pages ); ?></span>
				<span class="prev"><?php //previous_posts_link( 'Newer posts', $loop->max_num_pages ); ?></span> -->
				<?php
				} 
				?>
				</div>
			</div>
		</div>
    	<!-- Right Sidebar -->
		<div class="col-sm-3 col-xs-12" id="sidebar">
				
			<div class="panel panel-default">
			  <div class="panel-heading"><b>Contact Us</b></div>
			  <div class="panel-body">
				<b>Call Us:</b> 1-800-719-3307<br/>
				<b>Email:</b> websales@netatwork.com
			  </div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading"><b>The Net@Work Advantage</b></div>
			  <div class="panel-body">
				Net@Work brings the combined resources and talent of its 150+ designers, developers, business analysts and network engineers to ensure that your website can integrate with your entire business process. As Computer Reseller News stated in its August 2006 issue, Net@Work is the “new Super VAR,” providing its clients with “end-to-end IT solutions - from business applications and e-commerce solutions to custom application development to network infrastructure.”
			  </div>
			</div>
		</div>
	</div>     
  </div>

<?php get_footer(); ?>