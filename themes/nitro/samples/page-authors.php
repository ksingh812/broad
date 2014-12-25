<?php
############ AUTHORS PAGE #########
// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&order=DESC');
$users = array();
// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'subscriber', $currentUser->roles ))
	{
		$users[] = $currentUser;
	}
}
?>

<?php get_header(); ?>
<div class="container" role="main">
  <div class="row">
	
	<!--- Start Body Content --->
	<div id="primary-content" class="col-md-9 col-sm-8 col-xs-12">
		<div class="row">
			<div class="col-sm-12 col-xs-12" id="">
				<?php
					foreach($users as $user)
					{
						//ONLY ADD AUTHORS WITH POSTS
						if (count_user_posts($user->ID)> 0)
						{
						?>
						<div class="media">
							<a class="pull-left" href="<?php echo get_author_posts_url( $user->ID ); ?>">
							<?php echo get_avatar( $user->user_email, '128' ); ?>
							</a>
							<div class="media-body">
							<h2 class="media-heading"><a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->display_name; ?></a></h2>
							<?php echo get_user_meta($user->ID, 'description', true); ?>
							<a href="<?php echo get_author_posts_url( $user->ID ); ?>">View Author Posts</a>
						  </div>
						</div>
						<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	  
	<!-- Right Sidebar -->
	<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
			
			<?php 
				$args = array(
				'theme_location'  => '',
				'menu'            => 'Company information',
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
		<br/>
		<div class="panel panel-default" id="sidebar-callout-about"><div class="panel-body">
		<h4>About Net@Work</h4>
		<p>Net@Work is one of the leading authorized Sage 100 ERP partners, resellers and consultants. Our consultants and developers have extensive experience in Sage 100 ERP, as well as the full Sage ERP product portfolio, including installs, upgrades, conversions, customizations, support and training.</p>
		<div class="clearfix">&nbsp;</div><a href="/aboutus_1/" class="btn btn-xs btn-default">Learn More &raquo;</a></div></div>
			
	</div>
	</div>    
</div>

<?php get_footer(); ?>