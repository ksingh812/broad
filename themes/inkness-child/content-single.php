<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php inkness_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="col-md-4">
			<?php if (has_post_thumbnail() ) : ?>
			<div class="featured-image-single">
				<?php
					the_post_thumbnail();
					?>
			</div>
			<?php endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'inkness' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<div class="col-md-8">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<div id="ticket-table">
			<div class="table-responsive">				
				<script type="text/javascript">// <![CDATA[
				function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://tickets.tickethub.co/ResultsTicket.aspx'; }
				// ]]></script>
				<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php the_title(); ?>&amp;style=0&amp;mxrslts=50">// <![CDATA[
				<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
				// ]]></script>
			</div>
			<a style="margin-top:20px;" class="qbutton  medium normal" title="<?php the_title(); ?> Tickets" target="_self" href="http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=<?php the_title(); ?>">MORE TICKETS</a>
		</div>
	
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
