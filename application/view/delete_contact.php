<? load::view('template-header', array( 'title'=>'Delete Contact' )); ?>
<!-- START -->
<div class="span-21 last content-section">
    <form method="post" action="<?php echo url::page("delete/action_contact/{$contact->id}"); ?>">
        <h3>Delete Contact</h3>
        <hr/>
        <p>
            <strong>Are you sure you want to delete:</strong>
        </p>
        <h1><?= $contact->firstname.' '.$contact->lastname; ?></h1>
        <div class="span-21 last right form-block ">
            <a href="#cancel" class="red"><strong>No!</strong></a>
            <input class="button" id="login" tabindex="19" name="addContact" value="Yes" type="submit">
        </div>
    </form>
</div><!-- END -->
<? load::view('template-footer'); ?>
