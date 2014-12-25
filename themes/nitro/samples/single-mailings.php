<?php get_header(); ?>

<div id="primary-content" class="container" role="main">
    <div class="row">
        
        <div class="col-xs-12">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>    
                <p class="lead"><?php the_content('<p class="serif">Read the rest of this page »</p>'); ?></p>
            <?php endwhile; endif; ?>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>