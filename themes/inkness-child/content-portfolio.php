<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content row">
		<div class="col-md-3">
			<?php if ( has_post_thumbnail($post->ID) ) 
			{
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<?php
			}
			else
			{
				$url = '/wp-content/uploads/2014/11/tickethub-thumbnail.png';
			}
			?>
			<img src="<?php echo $url; ?>" width="250px" height="auto"/>
			<div class="meta">
				<?php //Returns All Term Items for "portfolio_category"
					$term_list = wp_get_post_terms($post->ID, 'portfolio_category', array("fields" => "all"));
					$output;
					foreach ($term_list as $term)
					{
						$output .= $term->name . ", ";
					}
					echo rtrim($output, ', ');;
				?>
			</div>
			<!-- POST CONTENT -->
			<?php the_content(); ?>
		</div>
		<div class="col-md-9">
			<div class="row" id="ticket-table">
				<div class="table-responsive">				
					<script type="text/javascript">// <![CDATA[
					function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://ticket.broadwayplay.nyc/ResultsTicket.aspx'; }
					// ]]></script>
					<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php the_title(); ?>&amp;style=0&amp;mxrslts=50">// <![CDATA[
					<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
					// ]]></script></div><a style="margin-top:20px;" class="qbutton  medium normal" title="<?php the_title(); ?> Tickets" target="_self" href="http://ticket.broadwayplay.nyc/ResultsGeneral.aspx?stype=0&kwds=<?php the_title(); ?>">MORE TICKETS</a>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
	
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'inkness' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'inkness' ) );

			if ( ! inkness_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'inkness' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'inkness' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
