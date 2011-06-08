<? load::view('template-header', array( 'title'=>'Update Comment' )); ?>
<!-- START -->
<div class="span-21 last content-section">
  <form method="post" action="<?php echo url::page("update/action_comment/{$contact_id}/{$comment->commentid}/"); ?>">
    <h3>Update Contact</h3>
    <hr/>

        <div class="span-18 prepend-2 last">
            <textarea name="notes" cols="600" rows="5"class="text markItUp"><?=$comment->comments; ?></textarea>
			<br /><small>
                Text formatting:
            </small>
			<a href="javascript:popUp('<?=BASE_URL; ?>/help/textile/')"><strong>Help</strong></a>
			<br />
</div>
    <div class="span-21 last right form-block ">
        <a href="#cancel" class="red"><strong>Cancel</strong></a>
        <input class="button" id="login" tabindex="19" name="addContact" value="Update" type="submit">
    </div>
  </form>
</div>
<!-- END -->
<? load::view('template-footer'); ?>
