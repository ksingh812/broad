<?php get_header(); ?>

<div id="primary-content" class="container" role="main">
    <div class="row">       
        <div class="col-xs-12">         
            <div class="page-header"><p class="lead">Search Results</p></div>        
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>         
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'typical' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>     
                        <?php the_excerpt(); ?>                  
                        <p><?php if ( count( get_the_category() ) ) : ?>
                        <?php printf( __( 'Posted in %2$s', 'typical' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?> <span aria-hidden="true">&#x2767;</span>
                        <?php endif; ?>
                        <?php $tags_list = get_the_tag_list( '', ', ' );
                            if ( $tags_list ): ?>
                        <?php printf( __( 'Tagged %2$s', 'typical' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> <span aria-hidden="true">&#x2767;</span>
                        <?php endif; ?>
                        </p>
                    </div>
               </div>
            <?php endwhile; // end of the loop. ?>           
        </div>
    </div>
</div>

<?php get_footer(); ?>