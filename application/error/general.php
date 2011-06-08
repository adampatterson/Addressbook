<? load::view('template-header', array('title'=>$title)); ?>
<div class="column span-21 last content-section">
  <h1>Error - <?php echo $title; ?></h1>
  <p><?php echo $message; ?></p>
</div>  
<? load::view('template-footer'); ?>