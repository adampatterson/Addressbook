<? load::view('template-header', array('title'=>'Forgot your login?')); ?>
<div class="span-21 last content-section">
 <form method="post" action="<?php echo url::page("post/action_lost/"); ?>">
    <!--
    <div class="span-5">&nbsp;</div>
    <div class="span-10">
    <div class="error rounded">Sorry, your login attempt failed. Please Try again. If you can not remember your login details please click <a href="#">here</a>.</div>
    </div>
    <div class="span-5 last">&nbsp;</div>
    -->
    <div class="span-11 prepend-5">
    <div class="span-11 rounded login">
        <div class="span-11 form-row last">
            <div class="span-2 right small">
                <strong>E-Mail</strong>
            </div>
            <div class="span-7 ">
                <input name="username" type="text" class="text" />
            </div>
        </div>
        <div class="span-2 right small">
            &nbsp;
        </div>
        <div class="span-7 last right">
            <button type="submit" class="button positive" tabindex="19" name="addContact">
                <span>
                <img alt="" src="<?= BASE_IMAGE ?>icons/20-check.png"/>SEND</span>
            </button>
        </div>
    </div>
    </div>
   </form>
</div>
<? load::view('template-footer'); ?>
