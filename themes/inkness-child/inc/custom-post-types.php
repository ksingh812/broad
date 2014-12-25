<?php
/** Define custom post types **/

/* Create Portfolio post type */

if (!function_exists('create_post_type')) {
function create_post_type() {
	register_post_type( 'portfolio_page',
		array(
			'labels' => array(
				'name' => __( 'Portfolio','qode' ),
				'singular_name' => __( 'Portfolio Item','qode' ),
				'add_item' => __('New Portfolio Item','qode'),
                'add_new_item' => __('Add New Portfolio Item','qode'),
                'edit_item' => __('Edit Portfolio Item','qode')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'tickets'),
			'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'post_tag'),
			'taxonomies' => array('post_tag'),
		)
	);
}
}
add_action( 'init', 'create_post_type' );

/* Create Portfolio Categories */

add_action( 'after_setup_theme', 'create_portfolio_taxonomies', 0 );
if (!function_exists('create_portfolio_taxonomies')) {
function create_portfolio_taxonomies() 
{
   $labels = array(
    'name' => __( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Portfolio Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Categories','qode' ),
    'all_items' => __( 'All Portfolio Categories','qode' ),
    'parent_item' => __( 'Parent Portfolio Category','qode' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:','qode' ),
    'edit_item' => __( 'Edit Portfolio Category','qode' ), 
    'update_item' => __( 'Update Portfolio Category','qode' ),
    'add_new_item' => __( 'Add New Portfolio Category','qode' ),
    'new_item_name' => __( 'New Portfolio Category Name','qode' ),
    'menu_name' => __( 'Portfolio Categories','qode' ),
  );     

  register_taxonomy('portfolio_category',array('portfolio_page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-category' ),
	'show_admin_column' => true,
  ));

}
}


/* Flush permalinks */

function rewrite_rules_on_theme_activation() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'rewrite_rules_on_theme_activation' );


?>