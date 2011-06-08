<? load::view('template-header', array( 'title'=>'Delete Group' )); ?>
<!-- START -->
<div class="span-21 last content-section">
    <form method="post" action="<?php echo url::page("delete/action_group/{$group->gid}"); ?>">
        <h3>Delete Group</h3>
        <hr/>
        <p>
            <strong>Are you sure you want to delete:</strong>
        </p>
        <h1><?= $group->groups; ?></h1>
        <div class="span-21 last right form-block ">
            <a href="#cancel" class="red"><strong>No!</strong></a>
            <input class="button" id="login" tabindex="19" name="addContact" value="Yes" type="submit">
        </div>
    </form>
</div><!-- END -->
<? load::view('template-footer'); ?>
