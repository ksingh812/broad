<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<!--	<h1 class="entry-title"><?php the_title(); ?></h1>- -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<!-- Meta Slider -->
		<?php echo do_shortcode('[metaslider id=441]'); ?>

		<div role="tabpanel">

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#musicals" aria-controls="musicals" role="tab" data-toggle="tab">Musicals</a></li>
			    <li role="presentation"><a href="#plays" aria-controls="plays" role="tab" data-toggle="tab">Plays</a></li>
			    <li role="presentation"><a href="#off" aria-controls="off" role="tab" data-toggle="tab">Off-Broadway</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="musicals"><?php echo do_shortcode( '[list-posts type="portfolio_page" category="musical" posts="5"]' ); ?></div>
			    <div role="tabpanel" class="tab-pane" id="plays"><?php echo do_shortcode( '[list-posts type="portfolio_page" category="play" posts="5"]' ); ?></div>
			    <div role="tabpanel" class="tab-pane" id="off"><?php echo do_shortcode( '[list-posts type="portfolio_page" category="off-broadway" posts="5"]' ); ?></div>
			  </div>

		</div>
		<div class="static-content">
			<?php the_content(); ?>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'inkness' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
