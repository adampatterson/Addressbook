<? load::view('template-header', array('title'=>'The Lab!')); ?>
<div class="span-21 last content-section">
    <h3>Testing Grounds!</h3>
    <hr/>
	<?//= get_gravatar($gravatar);

    echo getenv('REMOTE_ADDR');

    echo getGeoIp('city'); ?>

    <!-- Test Tube END -->
</div>
<? load::view('template-footer'); ?>