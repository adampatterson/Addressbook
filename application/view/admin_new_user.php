<? load::view('template-header', array( 'title'=>'Create your profile' )); ?>
<div class="span-21 last content-section">
 <form method="post" action="<?php echo url::page("post/action_new_user/"); ?>">
    <h3>Create your profile</h3>
    <hr/>
    <div class="span-21 last">
    	<div class="span-10">
        <div class="span-10 form-row last">
            <div class="span-2 right small">
                <strong>E-Mail</strong>
            </div>
            <div class="span-7 last">
                <input type="text" name="username"class="text" />
            </div>
        </div>
        <div class="span-11 form-row last">
            <div class="span-2 right small">
                <strong>Password</strong>
            </div>
            <div class="span-7 last">
                <input name="password" type="password" class="text password" value="" />
            </div>
        </div>

		</div>
		<div class="span-10 prepend-1 last">         
		  <div class="span-7 last right">
          <button type="submit" class="button positive" tabindex="19" name="addContact">
              <span>
              <img alt="" src="<?= BASE_IMAGE ?>icons/20-check.png"/>CREATE 
          </button>
      </div>
      </div>
    </div>
  </form>
</div>
<? load::view('template-footer'); ?>