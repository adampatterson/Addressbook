<? load::view('template-header', array( 'title'=>'Profile' )); ?>
<div class="span-21 last content-section">
    <h3>Update your profile</h3>
    <hr/>
    <form method="post" action="<?php echo url::page("update/action_profile/"); ?>" enctype="multipart/form-data"  id="updateProfile">
    	<div class="span-21 last">
	    	<div class="span-10">
			<h4>Update your E-Mail address.</h4>
			<div class="span-10 form-row last">
			    <div class="span-2 right small">
			        <strong>E-Mail</strong>
			    </div>
			    <div class="span-7 last">
			        <input name="email" type="text" class="text email" id="email" value="" />
			    </div>
			</div>
			</div>
			<div class="span-10 prepend-1 last">
			<h4>Update your password.</h4>
			<div class="span-10 form-row last">
			    <div class="span-2 right small">
			        <strong>Password</strong>
			    </div>
			    <div class="span-7 last">
			        <input name="password" type="password" class="text password" id="password" value="" />
			    </div>
			</div>
			<div class="span-10 form-row last">
			    <div class="span-2 right small">
			        <strong>Confirm </strong>
			    </div>
			    <div class="span-7 last">
			        <input name="confirm_password" type="password" class="text confirm_password" value="" />
			    </div>
			</div>
			</div>
			<div class="span-21 last right form-block "> <a href="#cancel" class="red"><strong>Cancel</strong></a>
			  <input class="button" id="update" tabindex="19" name="updateProfile" value="Update" type="submit">
			</div>
    	</div>
    </form>
</div>
<? load::view('template-footer'); ?>