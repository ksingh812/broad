<?php
		$naw_reg_link = get_post_meta( $post->ID, '_cd_naw_reg_link', true );
		$naw_reg_img = get_post_meta( $post->ID, '_cd_naw_reg_img', true );
		$naw_reg_phone = get_post_meta( $post->ID, '_cd_naw_phone', true );
        $nawdate = get_post_meta( $post->ID, '_cd_naw_date', true );
        $nawtime_s = get_post_meta( $post->ID, '_cd_naw_start_time', true );
		$naw_summary = get_post_meta( $post->ID, '_cd_naw_summary', true );	
		$naw_presenter = get_post_meta( $post->ID, '_cd_naw_presenter', true );
?>
<img class="aligncenter" src="<?php echo $naw_reg_img; ?>" alt="sage-300-webinar" width="100%" height="auto">
<div class="col-sm-8 col-xs-12" id="live-webinar-content">
	<?php the_content(); ?>
</div>
<div class="col-sm-4 col-xs-12" id="live-webinar-sidebar">
	<div id="live-webinar-sidebar-wrapper">
		<div class="text-center panel-body">
			<div class="form-group"><a href="<?php echo $naw_reg_link; ?>" target="_blank" class="btn btn-primary btn">REGISTER HERE</a></div>
			<div><small><b>or Call: </b> <?php echo $naw_reg_phone; ?></small></div>
		</div>

		<h3 class="panel-title">WEBINAR DATE</h3>
		<div class="panel-body">
			<div class="web_date"><?php echo $nawdate; ?></div>
			<div class="web-time"><?php echo $nawtime_s; ?></div>
			<a href="<?php echo $naw_reg_link; ?>" target="_blank">Register Here</a>
			<br/><br/>
			<em><?php echo $naw_summary; ?></em>
		</div>
		
		<h3 class="panel-title">PRESENTERS</h3>
		<div class="panel-body">
			<p><?php echo $naw_presenter; ?></p>
		</div>
	</div>
	
</div>