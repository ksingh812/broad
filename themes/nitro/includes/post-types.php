<?php 

	#PRESS-POST-TYPE
    function press_custom_init() {
        $args = array( 
            'label'  => 'Press',
            'public' => true,
			'taxonomies' => array('post_tag'),
            'supports' => array( 'title', 'editor', 'post_tag' ),
			'has_archive' => true,            
        );
        register_post_type( 'press', $args );
    }
    add_action( 'init', 'press_custom_init' );
    
    
    #SUCCESSSTORY-POST-TYPE
    function successstory_custom_init() {
        $args = array( 
            'label'  => 'Success Story',
            'public' => true,
            'taxonomies' => array('post_tag'),
            'supports' => array( 'title', 'editor', 'post_tag' ),
			'has_archive' => true,
            
        );
        register_post_type( 'successstory', $args );
    }
    add_action( 'init', 'successstory_custom_init' );
    
    
    #CALLTOACTION-POST-TYPE
    function calltoaction_custom_init() {
        $args = array( 
            'label'  => 'Call To Action',
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'has_archive' => false,
			'taxonomies' => array('post_tag'),
            'supports' => array( 'title', 'editor', 'post-format', 'post_tag' ),
			'has_archive' => true,
        );
        register_post_type( 'calltoaction', $args );
    }
    add_action( 'init', 'calltoaction_custom_init' );
    
	#PORTFOLIO-POST-TYPE
	function portfolio_custom_init() {
		$args = array( 
			'label'  => 'Case Studies',
			'public' => true,
			'taxonomies' => array('post_tag', 'case-studies'),
			'supports' => array( 'title', 'editor', 'post_tag','thumbnail' ) ,
			'has_archive' => true,	
            'rewrite' => array(
            				'slug' => 'case-studies',
            				'with_front' => true
            			),
		);
		register_post_type( 'portfolio', $args );
	}
	add_action( 'init', 'portfolio_custom_init' );


	function portfolio_taxonomy_init() {
			register_taxonomy(
			'case-study',
			'portfolio',
			array(
				'label' => __( 'Product / Service' ),
				'rewrite' => array( 
					'slug' => 'case-study',
					'with_front' => false 
				),
				'hierarchical' => true,
			)
		);
	}
	add_action( 'init', 'portfolio_taxonomy_init' );



	#CAREER-POST-TYPE
	function career_custom_init() {
		$args = array( 
			'label'  => 'Careers',
			'public' => true,
			'taxonomies' => array('post_tag'),
			'supports' => array( 'title', 'editor', 'post_tag') ,
			'has_archive' => true,	
		);
		register_post_type( 'career', $args );
	}
	add_action( 'init', 'career_custom_init' );
	
	#PARTNERS-POST-TYPE
	function partner_custom_init() {
		$args = array( 
			'label'  => 'Partners',
			'public' => true,
			'taxonomies' => array('post_tag'),
			'supports' => array( 'title', 'editor', 'post_tag', 'thumbnail') ,
			'has_archive' => true,
			'rewrite' => array('slug' => 'partners'),			
		);
		register_post_type( 'partner', $args );
	}
	add_action( 'init', 'partner_custom_init' );
	
	#RESOURCES-POST-TYPE
	function resource_custom_init() {
		$args = array( 
			'label'  => 'Whitepapers',
			'public' => true,
			'taxonomies' => array('resource_category','post_tag'),
			'supports' => array( 'title', 'editor', 'post_tag', 'thumbnail' ) ,
			'rewrite' => array( 'slug' => 'whitepapers' ),
			'has_archive' => true,	
		);
		register_post_type( 'resource', $args );
	}
	add_action( 'init', 'resource_custom_init' );
	#RESOURCES CUSTOM TAXONMY
	function resource_category_init() {
	// create a new taxonomy
	register_taxonomy(
		'resource_category',
		'resource',
		array(
			'hierarchical' => true,
			'label' => __( 'Whitepaper Category' ),
			'query_var' => true,
			'rewrite' => array( 'slug' => 'whitepaper-category' ),
			)
		);
	}
	add_action( 'init', 'resource_category_init' );
	
	#TEAM-POST-TYPE
	add_action( 'init', 'team_custom_init' );
	function team_custom_init() {
		$labels = array(
			'name'               => 'Team',
		);

		$args = array(
			'labels'             => $labels,
			'public'			 => true,
			'show_in_menu'       => true,
			'has_archive'        => true,
			'supports'           => array('title', 'editor','thumbnail'),
			'taxonomies' 		 => array('team_tag','team_category')
		);

		register_post_type( 'team', $args );
	}
	#TEAM CUSTOM TAXONMY	
	function team_category_init() {
		// create a new taxonomy
		register_taxonomy(
			'team_category',
			'team',
			array(
				'hierarchical' => true,
				'label' => __( 'Team Category' ),
				'query_var' => true,
				'show_admin_column' => true
			)
		);
		register_taxonomy(
			'team_tag',
			'team',
			array(
				'hierarchical' => false,
				'label' => __( 'Team Tags' ),
				'query_var' => true,
				'show_admin_column' => true
			)
		);
	}
	add_action( 'init', 'team_category_init' );	
	
?>