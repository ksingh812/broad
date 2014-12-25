<?php
		global $post;
		$options = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'taxonomy' => 'product_tag'
		);
		$pgtitle = get_post( $post )->post_title;
		$count = 0;
		$query = new WP_Query( $options );?>
		<table class="table table-hover">
		<?php if ( $query->have_posts() ) { 
			 while ( $query->have_posts() ) : $query->the_post();
				//$tags_obj = wp_get_post_tags($post->ID);
				$tags_obj = get_terms('product_tag', $options);
				foreach($tags_obj as $tagA)				
				{
					$tag_name = $tagA->name;
					//compare tags with page title and exclude first one
					if(strcasecmp($tagA->name, $pgtitle) == 0  && $count<5)
					{
				?>
				<tr>
					<?php	
					$nawdate = get_post_meta( get_the_ID(), '_cd_naw_date', true );
					$nawtime_s = get_post_meta( get_the_ID(), '_cd_naw_start_time', true );
					$nawtime_e = get_post_meta( get_the_ID(), '_cd_naw_end_time', true );
					echo '<td>';
						if ($nawdate !=''){
						echo $nawdate .'</br>' .$nawtime_s. '-'.$nawtime_e;}
					echo '</td>';
					echo '<td>';
						the_title();
						$poslink=get_permalink(get_the_ID());
						echo '<br/><a href=' . $poslink .'>Learn More/Register</a>';
					echo '</td>';
					$count++
						?>
				</tr>
				
			<?php }
				else
				{
					$showposts = 1;
				}
				}
			endwhile;
			}?>
			
		</table>
			<?php wp_reset_query(); ?>

