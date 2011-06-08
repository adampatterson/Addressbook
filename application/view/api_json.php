<?
// Send Headers		
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');

// Start JSON
//http://weareallrobots.com/demos/map.html
?>
{
	"Places": [
    <?php 
    //Count the contacts.

    $i = 1;
    foreach ($contacts as $contact): ?>

        {
            "title": "<?=$contact->firstname." ".$contact->lastname ?>",
            "description": "<?=$contact->firstname." ".$contact->lastname ?> Message",
            "lat": <?=$contact->lat ?>,
            "lng": <?=$contact->lng ?>
       <?
       // If the contacts are == to $i then its the end!        
       if ($i == $count_total) {
            echo '}';
            } else {
            echo '},';   
            }
            
		   $i++;
		
	endforeach;// END foreach 
?>
	
	 ]
}
