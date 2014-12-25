<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Inkness
 */
?>
	</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="container">
			<div class="col-md-4 col-xs-12">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="col-md-4 col-xs-12">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="col-md-4 col-xs-12">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		</div> 
	</footer><!-- #colophon -->	
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(window).scroll(function(){
    if(jQuery(document).scrollTop() > 0) {
        jQuery('#header-top').addClass('navbar-fixed-top');
    } else {
        jQuery('#header-top').removeClass('navbar-fixed-top');
    }
});
jQuery(document).ready(function(){
            jQuery('.tn_results').addClass('table table-striped');
			jQuery('.tn_results_tickets_text a').addClass('tkt-btn');
			jQuery('.tn_results_tickets_text a').html('<i class="fa fa-ticket"></i> <span class="tkt-text">Tickets</span>');
});
</script>
</body>
</html>