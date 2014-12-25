<?php get_header(); ?>
<!-- <iframe src="https://mapsengine.google.com/map/embed?mid=ztWL4m4VGG4g.kLgXhhmEhe28" width="100%" height="400"></iframe> -->
<div id="map-canvas" style="width: 100%; height: 480px;" class="hidden-xs"></div> <!--- CALL GOOGLE MAPS API --->
  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12" id="">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			    </div>
			</div>
		</div>
          
		<!-- Right Sidebar -->
		<div class="col-md-3 col-sm-4 col-xs-12" id="sidebar">
				
				<?php 
				$parent = array_reverse(get_post_ancestors($post->ID));
				$first_parent = get_page($parent[1])->post_title;
				//echo $first_parent;
							
				$values = get_post_custom( $post->ID );
				$menuselected = isset( $values['naw_menu_select'] ) ? esc_attr( $values['naw_menu_select'][0] ) : '';
				if ($menuselected == 'default' OR $menudefault == NULL)
				{
					$menuselected == 'Services';
				}
				
				switch ($first_parent)
				{
					case 'Business Applications':
						$menuselected = 'Right - Business Applications';
						break;
					case 'Web Solutions':
						$menuselected = 'Right - Web Solutions';
						break;
					case 'Systems Integration':
						$menuselected = 'Right - System Integration';
						break;
					default:
						$menuselected == 'Services';
				}
				
				$args = array(
                    'theme_location'  => '',
                    'menu'            => $menuselected,
                    'items_wrap'      => '%3$s',
                    'depth'           => 2,
                    // ADDED NAVWALKER HERE                
                    'container'         => 'div',
                    'container_class'   => 'page-sidebar-nav',
                    'container_id'      => 'page-sidebar-nav',
                    'menu_class'        => 'list-group menu_class',
                    'fallback_cb'       => 'page_sidebar_navwalker::fallback',
                    'walker'            => new page_sidebar_navwalker()
                );
				wp_nav_menu( $args); ?>


			<?php 
				
				/*CALL TO ACTION" */
				get_template_part('part', 'calltoaction');	
				
				/* ABOUT NET@WORK - Meta box Values */
				$naw = get_post_meta( $post->ID, '_cd_naw_content', true );
				$naw_link= get_post_meta( $post->ID, '_cd_naw_content_link', true );
				/* If Meta Box is Empty */
				if ($naw !='' && $naw_link !='')
				{
			?>
			<br/>
			<div class="panel panel-default" id="sidebar-callout-about">
				<div class="panel-body">
					<h4>About Net@Work</h4>
					<?php 
						echo $naw;
						echo '<div class="clearfix">&nbsp;</div><a href="' .$naw_link. '" class="btn btn-xs btn-default">Learn More &raquo;</a>';
					?>
				</div>
			</div>
			<?php } 
				else
				{
					echo '<div class="panel panel-default" id="sidebar-callout-about"><div class="panel-body"><h4>About Net@Work</h4>';
					echo '<p>Net@Work is one of the leading authorized Sage 100 ERP partners, resellers and consultants. Our consultants and developers have extensive experience in Sage 100 ERP, as well as the full Sage ERP product portfolio, including installs, upgrades, conversions, customizations, support and training.</p>';
					echo '<div class="clearfix">&nbsp;</div><a href="/aboutus_1/" class="btn btn-xs btn-default">Learn More &raquo;</a></div></div>';
				}
				?>
		</div>
		</div>    
  </div>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaA_-CsOg0M0EY80zO6VE7LD-0S-C7n0E">
</script>

<script type="text/javascript">

var map;
var MY_MAPTYPE_ID = 'custom_style';
function initialize() {

 var locations = [
   ['<p><h4>New York (HQ)</h4>575 Eighth Avenue<br/> New York, NY 10018<br/> T: 212.997.5200 <br/> F: 212.997.2484 </p>', 40.755267, -73.991782],
   ['<p><h4>New York</h4> 1240 Jefferson Road<br/> Rochester, NY 14623 <br/> T: 585.232.2270 <br/> F: 585.232.7723 </p>', 43.087995, -77.599502],
   ['<p><h4>New Jersey</h4> 29J Commerce Way<br/> Totowa, NJ 07512 <br/> T: 201.735.9560 <br/> F: 201.227.0161 </p>', 40.908850, -74.234832],
   ['<p><h4>Connecticut</h4> 100 Hinman Street<br/> Cheshire, CT 06410 <br/> T: 203.272.5245 <br/> F: 203.272.5623 </p>', 41.507323, -72.903142],
   ['<p><h4>Massachusetts</h4> 2 Commercial Street<br/> Sharon, MA 02067 <br/>T: 781-232-1212 <br/> F: 781-232-1213 </p>', 42.116744, -71.236303],
   ['<p><h4>North Carolina</h4> 1616 East Millbrook Road, Suite 240 <br/> Raleigh, NC 27609 <br/> T: 919-714-8788 <br/> F: 919-781-8580</p>', 35.849537, -78.608357],
   ['<p><h4>Texas</h4> 2727 LBJ Freeway Suite 924<br/>Dallas, TX 75234 <br/> T: 214-377-5924 <br/> F: 214-723-7570</p>', 32.911360, -96.886003],
   ['<p><h4>Washington</h4> 12360 Lake City Way NE, Suite 460 <br/>Seattle, WA 98125 <br/> T: 206-281-9370 <br/> F: 206-299-2800</p>', 47.718939, -122.294742],
   ['<p><h4>Wisconsin</h4> 309 W.Washington Ave. #907<br/>Madison, WI 53703 <br/> T: 608-216-0304 <br/> F: 608-216-0322 </p>', 43.071915, -89.387059],
   ['<p><h4>Michigan</h4> 200 E. Big Beaver Road<br/>Troy, MI 48083 <br/> T: 248-457-4523 <br/> F: 248-457-4524 </p>', 42.561822, -83.142490],
   ['<p><h4>Michigan</h4> 2157 University Park Dr.<br/>Okemos, MI 48864 <br/> T: 800-269-6466 <br/> F: 417-889-8694 </p>', 42.677378, -84.427663],
   ['<p><h4>Missouri</h4> 3734 South Ave. Suite E<br/>Springfield, MO 65807 <br/> T: 417-889-8991 <br/> F: 417-889-8694 </p>', 37.146641, -93.292498],
   ['<p><h4>Ontario, Canada</h4> 2557 Dougall Avenue<br/>Windsor, Ontario N8X 1T5 <br/> T: 519-966-4866 <br/> F: 519-966-8422 </p>', 42.282735, -83.020217],
 ];
 
 // Setup the different icons and shadows
 //var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/'; 
 var iconURLPrefix = 'http://nawlive.netatworkweb.com/wp-content/themes/nitro/images/';//Hard Code Map Icon Locations For Now

 var icons = [
   //iconURLPrefix + 'red-dot.png',
   iconURLPrefix + 'map20.png',
   
 ]
 var icons_length = icons.length;
 
 
 var shadow = {
  anchor: new google.maps.Point(15,33),
  url: iconURLPrefix + 'msmarker.shadow.png'
 };

 var featureOpts = [
 {
  "stylers": [
   { "lightness": 31 },
   { "saturation": -100 }
  ]
 },
 {
  "featureType": "water",
  "stylers": [
   { "color": "#73aed9" }
  ]
 },
 {
  "featureType": "landscape.natural.landcover",
  "stylers": [
   { "visibility": "on" },
   { "color": "#ffffff" }
  ]
 },
 {
  "featureType": "administrative.province",
  "stylers": [
   { "visibility": "off" }
  ]
 },
 {
  "featureType": "administrative.country",
  "stylers": [
   { "visibility": "off" }
  ]
 },
 {
  "featureType": "landscape.man_made",
  "stylers": [
   { "visibility": "off" }
  ]
 },
 {
  "featureType": "landscape.natural.terrain",
  "stylers": [
   { "visibility": "off" }
  ]
 },
 {
  "featureType": "road.arterial",
  "stylers": [
   { "visibility": "simplified" }
  ]
 },
 {
  "featureType": "poi",
  "stylers": [
   { "visibility": "off" }
  ]
 }
 ]


 var mapOptions = {
  zoom: 4,
  center: new google.maps.LatLng(0.878872,-26.630859),
  mapTypeControl: false,
  streetViewControl: false,
  panControl: false,
  mapTypeControlOptions: {
   mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
  },
  mapTypeId: MY_MAPTYPE_ID
 };
 
 var infowindow = new google.maps.InfoWindow({
   maxWidth: 200
 });

 var marker;
 var markers = new Array();
 
 var iconCounter = 0;
 map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
 // Add the markers and infowindows to the map
 for (var i = 0; i < locations.length; i++) {  
   marker = new google.maps.Marker({
  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
  map: map,
  icon : icons[iconCounter],
  shadow: shadow
   });

   markers.push(marker);

   google.maps.event.addListener(marker, 'click', (function(marker, i) {
   return function() {
     infowindow.setContent(locations[i][0]);
     infowindow.open(map, marker);
   }
   })(marker, i));
   
   iconCounter++;
   // We only have a limited number of possible icon colors, so we may have to restart the counter
   if(iconCounter >= icons_length){
  iconCounter = 0;
   }
 }

 
 //Auto Center For Better Fit  
 function AutoCenter() {
 //  Create a new viewpoint bound
 var bounds = new google.maps.LatLngBounds();
 //  Go through each...
 jQuery.each(markers, function (index, marker) {
 bounds.extend(marker.position);
 });
 //  Fit these bounds to the map
 map.fitBounds(bounds);
 }
 AutoCenter();
 
 
 var styledMapOptions = {
  name: 'Custom Style'
 };

 var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

 map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

}
  
google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?php get_footer(); ?>