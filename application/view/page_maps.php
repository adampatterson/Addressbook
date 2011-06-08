<? load::view('template-header', array('title'=>'Maps')); ?>
<div class="span-21 last content-section">
    <h3>Maps</h3>
    <hr/>
    <div class="span-21 google-maps last">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		var map;
		var arrMarkers = [];
		var arrInfoWindows = [];
		
		function mapInit(){
		var centerCoord = new google.maps.LatLng(53.573799, -113.560795<?//= $class_geoip->getGeoIp(); ?>); // Edmonton Alberta
		var mapOptions = {
			zoom: 9,
			center: centerCoord,
			mapTypeId: google.maps.MapTypeId.TERRAIN
		};
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		$.getJSON("<?=BASE_URL; ?>api/json/<?=$gid; ?>/", {}, function(data){
			$.each(data.Places, function(i, item){
				$("#markers").append('<li><a rel="' + i + '">' + item.title + '</a></li>');
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(item.lat, item.lng),
					map: map,
					title: item.title
				});
				arrMarkers[i] = marker;
				var infowindow = new google.maps.InfoWindow({
					content: "<h3>"+ item.title +"</h3><p>"+ item.description +"</p>"
				});
				arrInfoWindows[i] = infowindow;
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map, marker);
				});
			});
		});
		}
		$(function(){
		// initialize map (create markers, infowindows and list)
		mapInit();
		
		// "live" bind click event
		$("#markers a").live("click", function(){
		var i = $(this).attr("rel");
		// this next line closes all open infowindows before opening the selected one
		//for(x=0; x < arrInfoWindows.length; x++){ arrInfoWindows[x].close(); }
		arrInfoWindows[i].open(map, arrMarkers[i]);
		});
		});
		</script>	
        <div class="span-21">
            <div class="span-6">
            	<select name="groupe" onchange="location = this.options[this.selectedIndex].value;">
				<option>Select a Group to View</option>
				<option> </option>
				<?php 
				$glink = BASE_URL.'page/maps/';
				
				foreach ($groups as $group): 
				 // @todo Look up GID in the address book if it exists print the group (once)
				?>
					<option value='<?=$glink; ?><?=$group -> gid; ?>'><?=$group -> groups; ?></option>
				<? endforeach; ?>
				</select>
                <!--<div class="last googleMaps">
                    <span class="collapser" style="cursor: pointer; cursor: hand;"><img src='<?=BASE_IMAGE; ?>icons/14-add-ball.png' alt='Show' /><img src="<?=BASE_IMAGE; ?>icons/20-group.png" width="20" height="20" alt="Group" /></span><strong><a href="#">Get Group Name</a></strong>
                </div>-->
               <div id="content" class="hide-OFF">
                    <ul id="markers">
                    </ul>
                </div>
            </div>
            <div class="span-15 last">
                <div id="map">
                </div>
                <div class="span-15 last" style="display:none">
                    <div class="span-5">
                        <select name="select">
                            <option>- Me -</option>
                            <option>Adam</option>
                            <option>Aaron</option>
                        </select>
                    </div>
                    <div class="span-2 center">
                        <strong>- to -</strong>
                    </div>
                    <div class="span-5">
                        <select name="select2">
                            <option>- Me -</option>
                            <option>Adam</option>
                            <option>Aaron</option>
                        </select>
                    </div>
                    <div class="span-2 right last">
                    	<input class="button" id="login" tabindex="19" name="addContact" value="Go" type="submit">
                    </div>
                    <div class="span-14">
                        By - Transit, Car, Foot
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Test Tube END -->
</div>
<? load::view('template-footer'); ?>