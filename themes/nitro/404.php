<?php get_header(); ?>
<div class="container" role="main">
    <div class="row">
		
		<!--- Start Body Content --->
		<div id="fourohfour" class="col-xs-12" role="main">                    
            <h1>404</h1>
            <h2>I'm sorry, could we help you find what you were looking for?</h2>

            
            <form role="search" method="get" class="search-form form-inline col-xs-12" action="<?php echo home_url( '/' ); ?>">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control input-lg" id="search-input" placeholder="Search" value="" name="s" title="Search">
                    
              </div>
            </form>


        </div>
          
    </div>    
</div>
<?php get_footer(); ?>