<?php

	#########################################################################################################
	##### Quote #####
	function naw_shortcode_quote( $atts, $content = null ) {
	// [quote quote_footer="Author Name"] Content [/quote]
		extract(shortcode_atts(array(
		"quote_footer" => 'Author Name',
		), $atts));
	
		$return = '<blockquote>'. do_shortcode($content);
		$return .= '<footer>' .$quote_footer. '</footer></blockquote>';
		return $return;
	}
	add_shortcode('quote', 'naw_shortcode_quote');
	
	#############################################################################################################
	##### Link Button ######
	function naw_shortcode_button( $atts, $content = null ) {
	// [linkbutton type='primary' link="#" size="btn-sm,btn-lg,btn-xs"] Download [/linkbutton]
		extract(shortcode_atts(array(
		"type" => 'primary',
		"link" => '#',
		"size" => 'btn-sm'
		), $atts));
		return '<a class="btn btn-'.$type.' ' .$size.'" href="'.$link.'" role="button">' . do_shortcode($content) . '</a>';
	
	}
	add_shortcode('linkbutton', 'naw_shortcode_button');
	
	#############################################################################################################
	##### PDF Icon ######
	add_shortcode('pdficon', 'naw_shortcode_pdficon');
	function naw_shortcode_pdficon( $atts) {
	// [pdficon link="#" align='left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"align"=> 'left'
		), $atts));
		return '<a href="'.$link.'" class="pdflink" target="_blank"><img class="alignleft size-full wp-image-1949" alt="pdf-icon32" src="/wp-content/uploads/2014/02/pdf-icon32.png" width="32" height="32" /></a>';
	$myvariable = ob_get_clean();
			return $myvariable;
	
	}

#############################################################################################################
##### Tabs Shortcode ######	
	function naw_shortcode_tabs($atts, $content = null) {
	// [tabs style=""]  [tab title="TAB_NAME"] CONTENT [/tab]  [tab title="TAB_NAME"] CONTENT [/tab]  [tab title="TAB_NAME"] CONTENT [/tab][/tabs]

      if (isset($GLOBALS['tabs_count'])) $GLOBALS['tabs_count']++;
      else $GLOBALS['tabs_count'] = 0;
      extract(shortcode_atts(array(
          'tabtype' => 'nav-tabs',
          'style' => 'style1',
          'tabdirection' => '', ), $atts));

      preg_match_all('/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);

      $tab_titles = array();
      if (isset($matches[1])) {
          $tab_titles = $matches[1];
      }

      $output = '';

      if (count($tab_titles)) {
          $output .= '<div class="tabbable tabs_'.$style.' tabs-'.$tabdirection.'"><ul class="nav '.$tabtype.'" id="custom-tabs-'.rand(1, 100).'">';

          $i = 0;
          foreach($tab_titles as $tab) {
              if ($i == 0) $output .= '<li class="active">';
              else $output .= '<li>';

              $output .= '<a href="#custom-tab-'.$GLOBALS['tabs_count'].'-'.sanitize_title($tab[0]).'"  data-toggle="tab">'.$tab[0].'</a></li>';
              $i++;
          }

          $output .= '</ul>';
          $output .= '<div class="tab-content">';
          $output .= do_shortcode($content);
          $output .= '</div></div>';
      } else {
          $output .= do_shortcode($content);
      }

      return $output;
  }

  function naw_shortcode_tab($atts, $content = null) {

      if (!isset($GLOBALS['current_tabs'])) {
          $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
          $state = 'active';
      } else {

          if ($GLOBALS['current_tabs'] == $GLOBALS['tabs_count']) {
              $state = '';
          } else {
              $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
              $state = 'active';
          }
      }

      $defaults = array('title' => 'Tab');
      extract(shortcode_atts($defaults, $atts));

      return '<div id="custom-tab-'.$GLOBALS['tabs_count'].'-'.sanitize_title($title).'" class="tab-pane '.$state.'">'.do_shortcode($content).'</div>';
  }

  add_shortcode('tabs', 'naw_shortcode_tabs');
  add_shortcode('tab', 'naw_shortcode_tab');

#############################################################################################################
##### Demo Icon ######
	add_shortcode('demo', 'naw_shortcode_demo');
	function naw_shortcode_demo( $atts) {
	// [demo link="#" title='Title' position='top or left']
		$myvariable = '<span class="glyphicon glyphicon-facetime-video shortcode-glyph"></span>';
			return $myvariable;
	}
#############################################################################################################
##### Contact Icon ######
	add_shortcode('contact', 'naw_shortcode_contact');
	function naw_shortcode_contact( $atts) {
	// [contact link="#" title='Title' position='top or left']
		$myvariable = '<span class="glyphicon glyphicon-envelope shortcode-glyph"></span>';
			return $myvariable;
	
	}
  
#############################################################################################################
##### Contact Icon ######
	add_shortcode('support', 'naw_shortcode_support');
	function naw_shortcode_support( $atts) {
	// [support link="#" title='Title' position='top or left']
		$myvariable = '<span class="glyphicon glyphicon-user shortcode-glyph"></span>';
			return $myvariable;
	}

#############################################################################################################
##### Email Icon ######
	add_shortcode('email', 'naw_shortcode_email');
	function naw_shortcode_email( $atts) {
	// [email]
		$myvariable = '<span class="glyphicon glyphicon-envelope shortcode-glyph"></span>';
			return $myvariable;
	
	}
#############################################################################################################
##### Phone Icon ######
	add_shortcode('phone', 'naw_shortcode_phone');
	function naw_shortcode_phone( $atts) {
	// [phone link="#" title='Title' position='top or left']
		$myvariable = '<span class="glyphicon glyphicon-phone-alt shortcode-glyph"></span>';
			return $myvariable;
	
	}
#############################################################################################################
##### ROW ######	
add_shortcode('row', 'naw_shortcode_row');
function naw_shortcode_row( $atts, $content = null ) {
	// [row]Content[/row]
	  
	return '<div class="col-xs-12">'.do_shortcode($content).'</div>';
	
}	
#############################################################################################################
##### One Half Column ######	
add_shortcode('one_half_column', 'naw_shortcode_two_columns');
function naw_shortcode_two_columns( $atts, $content = null ) {
	// [one_half_column]Content[/one_half_column]
	  
	return '<div class="col-sm-6 col-xs-12">'.do_shortcode($content).'</div>';
	
}
#############################################################################################################
##### One Third Column ######	
function naw_shortcode_three_columns( $atts, $content = null ) {
	// [one_third_column] Content [/one_third_column]
		  
	return '<div class="col-sm-4 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_third_column', 'naw_shortcode_three_columns');

#############################################################################################################
##### 1/4 Column ######
function naw_shortcode_one_fourth_columns( $atts, $content = null ) {
	// [one_fourth_column] Content [/one_fourth_column]
		  
	return '<div class="col-sm-3 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_fourth_column', 'naw_shortcode_one_fourth_columns');
#############################################################################################################
##### 2/3 Column ######
function naw_shortcode_two_third_columns( $atts, $content = null ) {
	// [two_third_column] Content [/two_third_column]
		  
	return '<div class="col-sm-8 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('two_third_column', 'naw_shortcode_two_third_columns');
#############################################################################################################
##### 3/4 Column ######
function naw_shortcode_three_fourth_columns( $atts, $content = null ) {
	// [three_fourth_column] Content [/three_fourth_column]
	return '<div class="col-sm-9 col-xs-12">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth_column', 'naw_shortcode_three_fourth_columns');


#########################################################################################################
##### Header Slider #####
	function naw_shortcode_slider( $atts) {
	// [slider title='Author Name' subtitle='Title of the Author' link='']
		extract(shortcode_atts(array(
		"title" => 'SERVICE TITLE',
		"subtitle" => 'Service Sub-Title',
		"link" =>'#'
		), $atts));
	
		$return = '<div class="page-custom-hero jumbotron" id="web-solutions-hero">
					<div class="container">
						<h2 class="hero-title">'.$title.'</h2><p>&nbsp;</p>
						<p class="hero-content">'.$subtitle. '</p><p>&nbsp;</p>
						<p class="hero-content"><a href="'.$link.'" class="btn btn-primary btn-lg">Learn More <span class="glyphicon glyphicon-chevron-right triggered"></span></a></p><p>&nbsp;</p>
					</div>
				</div>';
		return $return;
	}
	add_shortcode('slider', 'naw_shortcode_slider');

#########################################################################################################
##### Four Column Glyphbox #####
	function naw_shortcode_fourth_glyphbox( $atts, $content = null) {
	// [one_fourth_glyphbox icon='icon-console' title='TITLE' link='#'] CONTENT [/one_fourth_glyphbox]
		extract(shortcode_atts(array(
		"icon" => 'icon icon-console',
		"title" => 'TITLE',
		"link" =>'#'
		), $atts));
	
		$return = '<div class="col-xs-12 col-sm-6 col-md-3 section-content-glyphbox">
					<a href="'. $link . '"><span class="' . $icon .' glyph-lg"></span>
					<h4>' . $title .'</h4></a>
					<p>' . do_shortcode($content) .'</p>
				</div>';
		return $return;
	}
	add_shortcode('one_fourth_glyphbox', 'naw_shortcode_fourth_glyphbox');
	
#########################################################################################################
##### Three Column Glyphbox #####
	function naw_shortcode_third_glyphbox( $atts, $content = null) {
	// [one_third_glyphbox icon='icon-console' title='TITLE' link='#'] CONTENT [/one_third_glyphbox]
		extract(shortcode_atts(array(
		"icon" => 'icon icon-console',
		"title" => 'TITLE',
		"link" =>'#'
		), $atts));
	
		$return = '<div class="col-xs-12 col-sm-4 section-content-glyphbox">
					<a href="'. $link . '"><span class="' . $icon .' glyph-lg"></span>
					<h4>' . $title .'</h4></a>
					<p>' . do_shortcode($content) .'</p>
				</div>';
		return $return;
	}
	add_shortcode('one_third_glyphbox', 'naw_shortcode_third_glyphbox');

#########################################################################################################
##### Page Section #####
	function naw_shortcode_page_section( $atts, $content = null) {
	// [page_section id='icon-console' class='text-center' title='TITLE'] CONTENT [/page_section]
		extract(shortcode_atts(array(
		"id" => '',
		"class" => '',
		"title" => 'TITLE',
		), $atts));
	
		$return = '</div>
			<div class="page-section-custom ' . $class . '" id="'. $id .'"><h3 class="page-section-title">'. $title .'</h3>'. do_shortcode($content) .'<div class="clearfix"></div>';
		return $return;
	}
	add_shortcode('page_section', 'naw_shortcode_page_section');

/** CAROUSEL START ---
-------------------**/
	#########################################################################################################
	##### Carousel Wrapper #####
	function naw_shortcode_carousel( $atts, $content = null) {
	// [carousel slides='3'] CONTENT [/carousel]
		extract(shortcode_atts(array(
		"slides" => 3
		), $atts));
	
		$return = '<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators"><li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
					$i=1;
				for ($i=1; $i<$slides; $i++)
				{
					$return.='<li data-target="#myCarousel" data-slide-to="' . $i .'"></li>';
				}
				$return .= '</ol>' . do_shortcode($content);
				$return .= '<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a></div>';
		return $return;
	}
	add_shortcode('carousel', 'naw_shortcode_carousel');

	#########################################################################################################
	##### Carousel Inner #####
	function naw_shortcode_inner( $atts, $content = null ) {
		// [carousel-inner] Content [/carousel-inner]
			  
		return '<div class="carousel-inner">' . do_shortcode($content) . '</div>';
		
	}
	add_shortcode('carousel-inner', 'naw_shortcode_inner');
		
	#########################################################################################################
	##### Carousel Item #####
	function naw_shortcode_item( $atts, $content = null) {
	// [carousel-item class='active' image='http://placehold.it/1920x1200&text=+' caption='Slide Caption'] CONTENT [/carousel-item]
		extract(shortcode_atts(array(
		"class" => '',
		"image" => 'http://placehold.it/1920x500&text=+',
		"caption" => 'Slide Caption',
		), $atts));
	
		$return = '<div class="item '. $class . '"> <img src="'. $image . '" alt="Slide">
		  <div class="container">
			<div class="carousel-caption">
			  <h1>' . $caption . '</h1>' . do_shortcode($content) . '
			</div>
		  </div>
		</div>';
		return $return;
	}
	add_shortcode('carousel-item', 'naw_shortcode_item');
/** CAROUSEL END -----
-------------------**/
?>