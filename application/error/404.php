<?php header('HTTP/1.1 404 Not Found'); ?>
<? load::view('template-header', array('title'=>'404 Error - Page not found')); ?>
<div class="column span-21 last content-section">
	<h1>404 Error</h1>
	<p>The requested page could not be found.</p>
</div>	
<? load::view('template-footer'); ?>