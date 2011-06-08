<? 
$name = $contact->firstname.' '.$contact->lastname;

load::view('template-header', array(
    'title'=>$name
));

// Profile Photo
$profile = $contact->profile;

// If the photo existes then use it other wise use a place holder image
// @todo create helper for profile path
$thumbPath = BASE_URL.$profile_images->get_images($contact->id, 'medium');

$singe_contacts = $contacts_table->get($contact->id);
?>

<h3 class="left">
  <?= $contact->firstname.' '.$contact->lastname; ?>
</h3>
<span class='actionAdd'><a href="<?php echo url::page("admin/update/{$contact->id}"); ?> ">Edit</a> <a href="<?php echo url::page("admin/delete/{$contact->id}"); ?>" class="red">Delete</a></span>
<hr/>
<div class="span-21 single-row last">
  <div class="span-5 append-1 single">
    <div class="span-5 last"> <img src="<?=$thumbPath; ?>" width="190" alt="Photo" /> </div>
    <div class="span-5 actions right last"> <a href="<?= url::page("email/message/{$contact->id}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-mail.png" width="20" height="20" alt="Mail" /></a>
      <!--<img src="<?=BASE_URL; ?>assets/images/icons/20-home.png" width="20" height="20" alt="Home" />-->
      <a href="<?= url::page("export/vcard/{$contact->id}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-addressbook.png" width="20" height="20" alt="Addressbook" /></a> </div>
  </div>
  <div class="span-15 last">
    <div class="span-7 append-1 adr">
      <h6>Personal Info:</h6>
      <hr/>
      <div id="hcard-<?=$contact->company_name; ?>" class="vcard">
        <? if (!$contact->company_name ==  '') { 
				        echo $contact->company_name.',';
                         }
				if (!$contact->title ==  '') { 
				echo $contact->title; ?>
		        <br />
		        <? }                
                elseif (!$contact->website == '') {

                ?>
	        <a class="url fn n" href="<?=$contact->website?>">
	        <?= $contact->website?>
	        </a>
	        <? } ?>
        <div class="adr">
          <div class="street-address">
            <?= $contact->address; ?>
            <?=$contact->address2; ?>
          </div>
          <? 
                if (isset($contact->city)) { ?>
            <span class="locality">
            <?= $contact->city; ?>
            </span>,
            <?
                    }
                   if (isset($contact->province)) {
                    ?>
            <span class="region">
            <?= $contact->province; ?>
            </span>,
            <?
                    }
                    if (isset($contact->postalcode)) {
                    ?>
            <span class="postal-code">
            <?= $contact->postalcode; ?>
            </span>
            <?
                    }
                    if (isset($contact->country)) {
                    ?>
            <br/>
            <span class="country-name">
            <?= $contact->country; ?>
            </span>
            <? } ?>
        </div>
         </div>
      </div>
      <div class="span-7 last">
        <h6>Misc Info:</h6>
        <hr />
        <?
        if ($contact->birthdate){ ?>
        <strong>Birthday</strong>
 		 <?= date("F j, Y", $contact->birthdate); ?>
        <br />
        <? } ?>
        <strong>Group</strong> <a href="<?=url::page("page/grouplist/").$group->gid; ?>">
        <?=$group->groups; ?>
        </a>
        </div>
       </div>
    <div class="span-15 last">
      <div class="span-7 append-1">
        <h6>Email:</h6>
        <? // Loop Email
                foreach ($singe_contacts as $value):
                    if ($value->type == 'email'): ?>
				        <small>
				        <?= $value->label?>
				        </small>: <a class="email" href="mailto:<?=$value->value?>">
				        <?= $value->value?>
				        </a> <br/>
				        <? 
					endif;
                endforeach; ?>
		        <h6>Phone:</h6>
		        <? 
                foreach ($singe_contacts as $value):
                    if ($value->type == 'phone'): ?>
				        <small>
				        <?= $value->label?>
				        </small>:<span class="tel">
				        <?= $value->value?>
				        </span> <br>
				        <? 
                    endif;
                  endforeach; ?>
      </div>
      <div class="span-7 last">
        <h6>IM:</h6>
        <? 
                // Loop IM
                foreach ($singe_contacts as $value):
                    if ($value->type == 'im'):
						if ($value->label == '1'): // MSN ?>
					        <small>MSN</small>: <a href="msnim:chat?contact=<?= $value->value?>">
					        <?= $value->value?>
					        </a><br/>
				        <? 
						endif;
						if ($value->label == '2'): // Google Talk ?>
					        <small>Google Talk</small>: <a href="gtalk:chat?jid=<?= $value->value?>" title="Google Talk" class="url gtalk">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '3'): // Yahoo ?>
					        <small>YIM</small>: <a href="ymsgr:sendIM?<?= $value->value?>" title="Yahoo Instant Messenger" class="url yim">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '4'): // AIM ?>
					        <small>AIM</small>: <a href="aim:goim?screenname=<?= $value->value?>" title="AOL Instant Messenger" class="url aim">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '5'): // ICQ ?>
					        <small>ICQ</small>: <a class="url"type="application/x-icq" href="http://www.icq.com/people/cmd.php?uin=<?= $value->value?>&action=message">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '6'): // Skype ?>
					        <small>Skype</small>: <a href="callto:<?= $value->value?>" title="Call me on Skype" class="url skype">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '7'): // Twitter ?>
					        <small>Twitter</small>: <a href="http://www.twitter.com/<?= $value->value?>" title="Send me a Tweet" class="url tritter">
					        <?= $value->value?>
					        </a><br/>
					        <? 
						endif;
						if ($value->label == '8'): //Other ?>
					        <small>Other</small>:
					        <?= $value->value?>
					        <br/>
					        <? 
						endif;
              		endif;
                endforeach; ?>
      </div>
    </div>
    <div class="prepend-6 span-15 last">
    	<h6>Map:</h6>
      <? //@todo move the javascript into the page header?>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript">
			var map;
			var arrMarkers = [];
			var arrInfoWindows = [];
			
			function mapInit(){
			var centerCoord = new google.maps.LatLng(<?= $contact->lat; ?>, <?= $contact->lng; ?>); // Edmonton Alberta
			var mapOptions = {
				zoom: 20,
				center: centerCoord,
				mapTypeId: google.maps.MapTypeId.TERRAIN
			};
		
			map = new google.maps.Map(document.getElementById("map-small"), mapOptions);
			$.getJSON("http://maps.google.com/maps/geo?q=<?=urlencode($contact->address) ."+".urlencode($contact->city) ."+".urlencode($contact->province)."+".urlencode($contact->country) ?>&output=json", {}, function(data){
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
					arrInfoWindows[i].open(map, arrMarkers[i]);
				});
			});
			</script>
      <div id="map-small"></div>
    </div>
  </div>
  <div class="span-21 last content-section">
    <h6>Notes:</h6>
    <hr/>
    <div class="span-18 prepend-2 last">
    <form method="post" action="<?= url::page("post/action_comment/{$contact->id}"); ?>">
      <textarea name="notes" cols="600" rows="5" class="text markItUp"></textarea>
      <small> Text formatting: </small> <a href="javascript:popUp('<?=BASE_URL; ?>/help/textile/')"><strong>Help</strong></a> <br/>
      <br/>
      </div>
      <div class="span-21 last right form-block ">
        <input class="button" id="login" tabindex="19" name="addContact" value="Post Comment" type="submit">
      </div>
    </form>
    <? foreach ($comments as $comment): ?>
	    <div class="span-16 prepend-2 data-row last">
	      <?=date("F jS, Y", $comment->comment_date);?>
          <?='<hr />';?>
          <?=$textile->TextileThis($comment->comments);?>
      <div class="span-4 last editDelete"> <a href="<?= url::page("admin/update_comment/{$contact->id}/{$comment->commentid}"); ?>"><img src="<?= BASE_URL; ?>assets/images/icons/14-edit.png" width="14" height="14" alt="Edit" />Edit </a> &nbsp;&nbsp;<a href="<?php echo url::page("admin/delete_comment/{$contact->id}/{$comment->commentid}"); ?>"><img src="<?= BASE_URL; ?>assets/images/icons/14-red-minus-ball.png" width="14" height="14" alt="Delete" /> Delete</a> </div>
    </div>
    <? endforeach; ?>
  </div>
</div>
</div>
<? load::view('template-footer'); ?>
