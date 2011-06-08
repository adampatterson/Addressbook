<? load::view('template-header', array( 'title'=>'Update Comment' )); ?>
<!-- START -->
<div class="span-21 last content-section">
  <form method="post" action="<?php echo url::page("update/action_group/{$group->gid}"); ?>">
    <h3>Update Group</h3>
    <hr/>
    <div class="span-10 form-row last">
        <div class="span-2 right small red"> <strong>Group Name</strong> </div>
        <div class="span-7 last">
          <input name="group_name" id="groupName" type="text" class="required text" tabindex="2" value="<?=$group->groups; ?>" />
        </div>
      </div>


    <div class="span-21 last right form-block ">
        <a href="#cancel" class="red"><strong>Cancel</strong></a>
        <input class="button" id="login" tabindex="19" name="addContact" value="Update" type="submit">
    </div>
  </form>
</div>
<!-- END -->
<? load::view('template-footer'); ?>
