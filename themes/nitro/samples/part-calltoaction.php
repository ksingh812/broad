<?php
//------ Primary Action Call in Left Navigation -------
	$slug = get_post( $post )->post_title;  //current page title
	$allparents = get_post_ancestors( $post->ID); //Get all ancestors for current page
	
	$outerLoopArray = array();
	$outerLoopArray[0] = $slug;					//Add ancestors and current page

	foreach ($allparents as $part)
	{
		$outerLoopArray[] = get_post($part)->post_title;	//get titles for all the pages
	}
	
	$options = array(
	'post_type' => 'calltoaction',
	'posts_per_page' => -1,
	);
			
	$query = new WP_Query( $options );
	$count = 0;		//counter to include only 4 posts
	
	foreach ($outerLoopArray as $title)				//Page Titles (breadcrumbs)
	{
		if ( $query->have_posts() ):
			while ($query->have_posts()) : $query->the_post();
				$tags_obj = wp_get_post_tags($post->ID);	//Get all the tags for CTA

				foreach($tags_obj as $tagA)				//CTA Tags
				{
					$tag_name = $tagA->name;
					//compare tags with page title (maximum 2 cta)
					if(strcasecmp($tagA->name, $title) == 0 && $count<1)
					{
						echo '<div class="cta">';
					the_content();
					echo '</div>';
						$count++;
					}
				}
			endwhile;
		endif;
	}
	wp_reset_query();  
?>