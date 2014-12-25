<?php 
	$naw_hover = get_post_meta( $post->ID, '_cd_naw_hover', true );
	if($naw_hover == 'hoveryes'){
		$horizImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$vertImage = str_replace("horiz", "vert", $horizImage[0]);
	}
?>

<div class="col-xs-12 col-sm-6 col-md-4 section-content-square section-content-square-listing <?php if($naw_hover == 'hoveryes'){echo 'hover-study';} ?> text-left">
	<a href="<?php the_permalink();?>" class="imgBg">
		<?php echo the_post_thumbnail(array(600,600)); ?>
		<?php if($naw_hover == 'hoveryes'): ?>
		<img class="vertImg" src="<?php echo $vertImage ?>" />
		<?php endif; ?>
	</a>
	<div class="content-square-text">
		<a href="<?php the_permalink();?>"><h5><?php the_title(); ?></h5></a>
		<?php the_excerpt(); ?>
	</div>
</div>