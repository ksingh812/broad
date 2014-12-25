<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<!--<div id="primary-content" class="col-xs-12">
			<blockquote>
				<p>We dream as big as the world</p>
				<footer>Kuldeep</footer>
			</blockquote>
		</div>-->
		
		<div id="primary-content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="partners">
					<?php
					$args = array( 'post_type' => 'partner', 'posts_per_page' => -1);
					$loop = new WP_Query( $args );	
					$count = 0;
					 if ( $loop->have_posts() )
					{
					 while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<div class="section-content-square col-sm-6 col-md-4">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<img src="<?php echo $url;?>" >
						<div class="content-square-text">
							<h5 class="text-center"><?php echo get_the_title($ID); ?> </h5>
							<?php the_content(); ?>
						</div>
					</div>
					
				
					<?php endwhile; }?>
							
			    </div>
			</div>
		</div>
          
		<!-- Right Sidebar -->
		<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
				
				<?php 
				//ADD MENU
				$args = array(
                    'theme_location'  => '',
                    'menu'            => 'Company Information',
                    'items_wrap'      => '%3$s',
                    'depth'           => 2,
                    // ADDED NAVWALKER HERE                
                    'container'         => 'div',
                    'container_class'   => 'page-sidebar-nav',
                    'container_id'      => 'page-sidebar-nav',
                    'menu_class'        => 'list-group menu_class',
                    'fallback_cb'       => 'page_sidebar_navwalker::fallback',
                    'walker'            => new page_sidebar_navwalker()
                );
				wp_nav_menu( $args); ?>


			<?php 
				
				/*CALL TO ACTION" */
				get_template_part('part', 'calltoaction');	
				
				/* ABOUT NET@WORK - Meta box Values */
				$naw = get_post_meta( $post->ID, '_cd_naw_content', true );
				$naw_link= get_post_meta( $post->ID, '_cd_naw_content_link', true );
				/* If Meta Box is Empty */
				if ($naw !='' && $naw_link !='')
				{
			?>
			<br/>
			<div class="panel panel-default" id="sidebar-callout-about">
				<div class="panel-body">
					<h4>About Net@Work</h4>
					<?php 
						echo $naw;
						echo '<div class="clearfix">&nbsp;</div><a href="' .$naw_link. '" class="btn btn-xs btn-default">Learn More &raquo;</a>';
					?>
				</div>
			</div>
			<?php } 
				else
				{
					echo '<div class="panel panel-default" id="sidebar-callout-about"><div class="panel-body"><h4>About Net@Work</h4>';
					echo '<p>Net@Work is one of the leading authorized Sage 100 ERP partners, resellers and consultants. Our consultants and developers have extensive experience in Sage 100 ERP, as well as the full Sage ERP product portfolio, including installs, upgrades, conversions, customizations, support and training.</p>';
					echo '<div class="clearfix">&nbsp;</div><a href="/aboutus_1/" class="btn btn-xs btn-default">Learn More &raquo;</a></div></div>';
				}
				?>
		</div>
		</div>   	
	 
  </div>

<?php get_footer(); ?>