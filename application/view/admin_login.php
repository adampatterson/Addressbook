<? load::view('template-header', array('title'=>'Login')); ?>
<div class="span-21 last content-section">
 <form method="post" action="<?php echo url::page("post/action_login/"); ?>">
    <!--
    <div class="span-5">&nbsp;</div>
    <div class="span-10">
    <div class="error rounded">Sorry, your login attempt failed. Please Try again. If you can not remember your login details please click <a href="#">here</a>.</div>
    </div>
    <div class="span-5 last">&nbsp;</div>
    -->
    <div class="span-11 prepend-5">
    <div class="span-11 rounded login">
    
         <?php if($note = note::get('forgot')): ?>
            <p class="<?php echo $note['type']; ?>"><?php echo $note['content']; ?></p>
        <?php endif; ?>
        <?php if($note = note::get('login')): ?>
          <p class="<?php echo $note['type']; ?>"><?php echo $note['content']; ?></p>
        <?php endif; ?>
        <!--
        <?php if($note = note::get('session')): ?>
          <p class="<?php echo $note['type']; ?>"><?php echo $note['content']; ?></p>
        <?php endif; ?>
        -->
        <div class="span-11 form-row last">
            <div class="span-2 right small">
                <strong>E-Mail</strong>
            </div>
            <div class="span-7 ">
                <input type="text" name="username"class="text" tabindex="1" />
            </div>
        </div>
        <div class="span-11 form-row last">
            <div class="span-2 right small">
                <strong>Password</strong>
            </div>
            <div class="span-7">
                <input type="password" name="password" class="text" tabindex="2" />
            </div>
        </div>
        <div class="span-2 right small">
            &nbsp;
        </div>
        <!--
        <div class="span-3">
            <small>
                Remember Me
            </small>
            <input type="checkbox" name="example"/>
        </div>
        -->
        <div class="span-7 last right">
            <input type="submit" class="button" tabindex="3" name="addContact" value="Login" />
        </div>
    </div> <a href="<?= url::page("admin/lost/") ?>" title="Password Lost and Found">Lost your password?</a>
    </div>
   </form>
</div>
<? load::view('template-footer'); ?>
