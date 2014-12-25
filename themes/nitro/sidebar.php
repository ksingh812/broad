<div id="sidebar1" class="col-sm-4" role="complementary">
	
	<!-- GET ARCHIVE SIDEBAR -->
    <?php if ( is_active_sidebar( 'default' ) ) : ?>
		
        <?php dynamic_sidebar( 'default' ); ?>

    <?php else : ?>

        <!-- This content shows up if there are no widgets defined in the backend. -->
        
        <div class="alert alert-message">
        
            <p><?php _e("Please activate some Widgets","wpbootstrap"); ?>.</p>
        
        </div>

    <?php endif; ?>

</div>