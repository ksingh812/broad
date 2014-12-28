<?php
	
	########################################################################################################################
	###### Posts Shortcodes ######
	
	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'list-posts', 'naw_post_shortcode' );
	function naw_post_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'post',
			'posts' => 1,
			'category'=>'',
			'tag'=>'featured',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'posts_per_page' => $posts,
			'tax_query' => array(
								'relation' => 'AND',
									array(
										'taxonomy' => 'portfolio_category',
										'field' => 'slug',
										'terms' => $category,
									),
									array(
										'taxonomy' => 'post_tag',
										'field' => 'slug',
										'terms' => $tag,
									)
								)
		);
		$query = new WP_Query( $options );
		// run the loop based on the query
		if ( $query->have_posts() ) { ?>
			<div class="row isotope" id="portfolio-list" style="margin-top:20px;">
			   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
			   		<?php if ( has_post_thumbnail($post->ID) ) 
							{
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<img src="<?php echo $url; ?>" class="img-responsive wp-post-image" alt="<?php the_title()?>" />
							<?php
							}
							else
							{
								$url = '/wp-content/uploads/2014/11/tickethub-thumbnail.png';
							}
							?>
							<div id="element-item<?php echo $the_query->current_post+1?>" class="element-item col-md-3 form-group" data-category="">
						<article id="broadway">
							
							<!-- <div class="post-meta"><?php the_title(); ?> <br/>
								<span class="tkt"><i class="fa fa-ticket"></i> Buy Tickets</span>
							</div> -->
							<div id="box" style="background:url(<?php echo $url;?>); background-size: cover;">
  								<a href="<?php echo get_permalink(); ?>">
								  <div id="overlay">
								    <span id="plus"><?php the_title(); ?> <br/>
									<span class="tkt"><i class="fa fa-ticket"></i> Buy Tickets</span></span>
								  </div>
							 	</a>
							</div>
							
						</article>
					</div>
					<!--<li style="list-style:none; line-height:2;"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>-->
				<?php endwhile; ?>
			</div>
		<?php
			$output = ob_get_clean();
			return $output;
		}
	}
	//[list-posts type="press" posts="5"]
	
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
          $output .= '<div role="tabpanel" class="tabbable tabs_'.$style.' tabs-'.$tabdirection.'"><ul role="tablist" class="nav '.$tabtype.'" id="custom-tabs-'.rand(1, 100).'">';

          $i = 0;
          foreach($tab_titles as $tab) {
              if ($i == 0) $output .= '<li role="presentation" class="active">';
              else $output .= '<li>';

              $output .= '<a href="#custom-tab-'.$GLOBALS['tabs_count'].'-'.sanitize_title($tab[0]).'" role="tab" data-toggle="tab">'.$tab[0].'</a></li>';
              $i++;
          }

          $output .= '</ul>';
          $output .= '<div role="tabpanel" class="tab-pane tab-content">';
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
##### Separator ######	
add_shortcode('separator', 'naw_shortcode_separator');
function naw_shortcode_separator( $atts) {
	// [separator]
	return '<hr>';
	
}
  
#############################################################################################################
##### ROW ######	
add_shortcode('row', 'naw_shortcode_row');
function naw_shortcode_row( $atts, $content = null ) {
	// [row]Content[/row]
	  extract(shortcode_atts(array(
		"id" => '',
		), $atts));
	return '<div class="row" id="' . $id .'">'.do_shortcode($content).'</div>';
	
}	
#############################################################################################################
##### One Half Column ######	
add_shortcode('one_half_column', 'naw_shortcode_two_columns');
function naw_shortcode_two_columns( $atts, $content = null ) {
	// [one_half_column]Content[/one_half_column]
	extract(shortcode_atts(array(
		"id" => '',
		), $atts));  
	return '<div class="col-sm-6 col-xs-12" id="' .$id. '">'.do_shortcode($content).'</div>';
	
}
#############################################################################################################
##### One Third Column ######	
function naw_shortcode_three_columns( $atts, $content = null ) {
	// [one_third_column] Content [/one_third_column]
	extract(shortcode_atts(array(
		"id" => '',
		), $atts));  	  
	return '<div class="col-sm-4 col-xs-12" id="' .$id. '">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_third_column', 'naw_shortcode_three_columns');

#############################################################################################################
##### 1/4 Column ######
function naw_shortcode_one_fourth_columns( $atts, $content = null ) {
	// [one_fourth_column] Content [/one_fourth_column]
	extract(shortcode_atts(array(
		"id" => '',
		), $atts));  	  
	return '<div class="col-sm-3 col-xs-12" id="' .$id. '">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_fourth_column', 'naw_shortcode_one_fourth_columns');
#############################################################################################################
##### 2/3 Column ######
function naw_shortcode_two_third_columns( $atts, $content = null ) {
	// [two_third_column] Content [/two_third_column]
	extract(shortcode_atts(array(
		"id" => '',
		), $atts));  	  
	return '<div class="col-sm-8 col-xs-12" id="' .$id. '">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('two_third_column', 'naw_shortcode_two_third_columns');
#############################################################################################################
##### 3/4 Column ######
function naw_shortcode_three_fourth_columns( $atts, $content = null ) {
	// [three_fourth_column] Content [/three_fourth_column]
	extract(shortcode_atts(array(
		"id" => '',
		), $atts));  
	return '<div class="col-sm-9 col-xs-12" id="' .$id. '">' . do_shortcode($content) . '</div>';
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

/** CAROUSEL START ---
-------------------**/
	#########################################################################################################
	##### Carousel Wrapper #####
	function naw_shortcode_carousel( $atts, $content = null) {
	// [carousel slides='3'] CONTENT [/carousel]
		extract(shortcode_atts(array(
		"slides" => 3,
		"id" => 'myCarousel'
		), $atts));
	
		$return = '<div id="'. $id .'" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators"><li data-target="#'. $id .'" data-slide-to="0" class="active"></li>';
					$i=1;
				for ($i=1; $i<$slides; $i++)
				{
					$return.='<li data-target="#'. $id .'" data-slide-to="' . $i .'"></li>';
				}
				$return .= '</ol>' . do_shortcode($content);
				$return .= '<a class="left carousel-control" href="#'. $id .'" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" href="#'. $id .'" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a></div>';
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
#############################################################################################################
##### ROW-BLOCK ######	
add_shortcode('rowblock', 'naw_shortcode_row_block');
function naw_shortcode_row_block( $atts, $content = null ) {
	// [rowblock]Content[/rowblock]
	  
	return '<div class="row isotope">'.do_shortcode($content).'</div>';
	
}


########################################################################################################################
###### Postblock Shortcodes ######
	
	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'postblock', 'naw_post_block_shortcode' );
	function naw_post_block_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'post',
			'posts' => 1,
			'postid' => '',
			'heading' =>''
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'posts_per_page' => $posts,
			'p' => $postid
		);
		$query = new WP_Query( $options );
		// run the loop based on the query
		if ( $query->have_posts() ) { ?>
			   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class=" col-md-4 col-sm-6 col-xs-12 archive-row-item">
						
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix box'); ?> role="article">
					<header>
						<?php if (!$heading=='') { ?>
						<div class="item-heading">
							<?php echo $heading ?>
						</div>
						<?php } ?>
						<div class="item-img">
							<?php if(has_post_thumbnail()): ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('',array('class' => "attachment-$size img-responsive")); ?></a><?php endif; ?>
						</div>
						<?php 
						if ($type == 'calltoaction')
						{
						?>
							<div class="item-content">
										<h4><?php the_content(); ?></h4>
							</div>
						<?php
						}
						else
						{
						?>
							<div class="item-content">
								<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							</div>
								
							</header> <!-- end article header -->
						
							<section class="post_content">
								<?php the_excerpt(); ?>
							</section> <!-- end article section -->
						<?php } ?>
				</article> <!-- end article -->
			</div>
				<?php endwhile; ?>
		<?php
			$output = ob_get_clean();
			return $output;
		}
	}
	//[postblock type="press" posts="1"]

########################################################################################################################
###### Accordions Shortcodes ######
	function naw_shortcode_accordions( $atts, $content = null) {
	// [accordions] CONTENT [/accordions]
		extract(shortcode_atts(array(
		"class" => 'custom-class',
		), $atts));
		$id = get_the_ID();
		$return = '<div class="' .$class. ' panel-group '. $id . '" id="accordion">' . do_shortcode($content) . '</div>';
		return $return;
	}
	add_shortcode('accordions', 'naw_shortcode_accordions');
	
	function naw_shortcode_accordion( $atts, $content = null) {
	// [accordion] CONTENT [/accordion]

		extract(shortcode_atts(array(
		"title" => 'Accordion Title',
		"default" => false,
		), $atts));
		
		$titleslug = str_replace(" ", "_", $title);
		
		$return = '<div class="panel panel-default">';
		$return .=	'<div class="panel-heading">
					  <h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#'. $titleslug .'">'
						 . $title .'</a> </h4>
					</div>
					<div id="'.$titleslug.'" class="panel-collapse ';
					if ($default)
					{
						$return .= 'collapse in">';
					}
					else
					{
						$return .='collapse">';
					}
					
				$return .= '<div class="panel-body">'
						. do_shortcode($content) .
					 '</div></div></div>';
		return $return;
	}
	add_shortcode('accordion', 'naw_shortcode_accordion');
	
/** TESTIMONIAL START ---
-------------------**/
	#########################################################################################################
	##### TESTIMONIAL Wrapper #####
	function naw_shortcode_testimonial( $atts, $content = null) {
	// [testimonial slides='3'] CONTENT [/testimonial]
		extract(shortcode_atts(array(
		"slides" => 3
		), $atts));
	
		$return = '<div id="quote-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators"><li data-target="#quote-carousel" data-slide-to="0" class="active"></li>';
					$i=1;
				for ($i=1; $i<$slides; $i++)
				{
					$return.='<li data-target="#quote-carousel" data-slide-to="' . $i .'"></li>';
				}
				$return .= '</ol>' . do_shortcode($content);
				$return .= '</div>';
		return $return;
	}
	add_shortcode('testimonial', 'naw_shortcode_testimonial');

	#########################################################################################################
	##### Testimonial Inner #####
	function naw_testimonial_inner( $atts, $content = null ) {
		// [testimonial-inner] Content [/testimonial-inner]
			  
		return '<div class="carousel-inner">' . do_shortcode($content) . '</div>';
		
	}
	add_shortcode('testimonial-inner', 'naw_testimonial_inner');
		
	#########################################################################################################
	##### Testimonial Item #####
	function naw_testimonial_item( $atts, $content = null) {
	// [testimonial-item class='active' image='http://placehold.it/1920x1200&text=+' author='Author Name'] CONTENT [/testimonial-item]
		extract(shortcode_atts(array(
		"class" => '',
		"image" => 'http://placehold.it/1920x500&text=+',
		"author" => 'Author',
		), $atts));
	
		$return = '<div class="item '. $class . '"><blockquote>
						  <div class="row">
							<div class="col-sm-3 text-center">
							  <img class="img-circle" src="' . $image . '" style="width: 150px;height:150px;">
							</div>
							<div class="col-sm-9">
							  <p>'. do_shortcode($content) .'</p>
							  <small>'. $author . '</small>
							</div>
						  </div>
						</blockquote>
					</div>';
		return $return;
	}
	add_shortcode('testimonial-item', 'naw_testimonial_item');
/** TESTIMONIAL END -----
-------------------**/
?>