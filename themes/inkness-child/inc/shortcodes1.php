<?php

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'naw_post_shortcode' );
function naw_post_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'tag' => 'featured',
        'fabric' => '',
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'tag' => $tag,
        'fabric' => $fabric,
        'category_name' => $category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
             <ul class="eventlist">
               <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<li>
						 <div itemscope itemtype="http://schema.org/Event">
							 <a itemprop="url" href="<?php the_permalink();?>" title="<?php the_title(); ?> Tickets"><?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?> <img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="thumb" /><span itemprop="name"><?php the_title(); ?></span><span itemprop="offers" style="float:right;"><i class="icon-ticket"></i></span></a>
						 </div>
						 </li>
	<?php endwhile; ?>
            </ul>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

?>