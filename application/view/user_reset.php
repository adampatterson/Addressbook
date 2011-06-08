<? load::view('template-header', array('title'=>'Reset')); ?>
<div class="span-21 last content-section">
 <form method="post" action="<?php echo url::page("post/action_update_user/"); ?>">
    <div class="span-11 prepend-5">
    <div class="span-11 rounded login">
        <div class="span-11 form-row last">
                <? //@todo set a message to enter a new password ?>
                <input type=hidden name="username" value="<?=$email ?>" />
        </div>
        <div class="span-11 form-row last">
            <div class="span-2 right small">
                <strong>Password</strong>
            </div>
            <div class="span-7">
                <input type="password" name="password" class="text" />
            </div>
        </div>
        <div class="span-2 right small">
            &nbsp;
        </div>
        <div class="span-7 last right">
            <button type="submit" class="button positive" tabindex="19" name="addContact">
                <span>
                <img alt="" src="<?= BASE_IMAGE ?>icons/20-check.png"/>UPDATE</span>
            </button>
        </div>
    </div>
    </div>
   </form>
</div>
<? load::view('template-footer'); ?>
