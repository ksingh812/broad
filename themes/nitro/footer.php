</div><!-- END CONTENT -->
</div><!-- END WRAP-->

    <div id="footer" class="affix-bottom small">
      <div class="container">
		<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 ">
                <?php dynamic_sidebar( 'footer1' ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer2' ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer3' ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php dynamic_sidebar( 'footer4' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <p class="text-right">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2014 Net@Work</p>
            </div>
        </div>
      </div>
    </div>


<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>

    </div>
  </body>
</html>