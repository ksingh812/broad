<?php

	#REGISTER FOOTER SIDEBAR WIDGETS
        
	function tkt_customsidebar_init() {
    register_sidebar(array(
        'name'=> 'Footer1',
		'id' => 'footer1',
        'before_widget' => '',
		'after_widget' => '',
    ));
	register_sidebar(array(
        'name'=> 'Footer2',
		'id' => 'footer2',
        'before_widget' => '',
		'after_widget' => '',
    ));
	register_sidebar(array(
        'name'=> 'Footer3',
		'id' => 'footer3',
        'before_widget' => '',
		'after_widget' => '',
    ));
	}
	add_action( 'widgets_init', 'tkt_customsidebar_init' );
?>