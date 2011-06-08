<? load::view('template-header', array('title' => 'Send A Message'));
$singe_contact = $contacts_table->get($contact->id);?>
<div class="span-21 last content-section">
	<h3>Send A Message to <?= $contact->firstname. " ". $contact->lastname ?></h3>
	<hr/>
    <div class="airmail-line">
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
        <b>/</b>
        <i>/</i>
    </div>
	<form method="post" action="<?php echo url::page("post/action_send/".$contact->id);?>">
		<h6>Email:</h6>
		<select name="email_address" class="span-10">
			<?
			// Loop Email
			foreach ($singe_contact as $value) {
				if ($value->type == 'email') {?>
					<option value="<?=$value->value ?>">
						<strong><?= $value->label ?></strong>: <?= $value->value ?>
					</option>
					<?}
				}?>
		</select><br />
        <h6>Subject:</h6>
        <input type="text" name="subject" class="span-10"/><br />
		<h6>Message:</h6>	
		<textarea name="message" cols="600" rows="5" class="text"></textarea>
		<div class="span-21 last right form-block ">
			<input class="button" id="login" tabindex="19" name="addContact" value="Send Message" type="submit">
		</div>
    </form>
</div>
<? load::view('template-footer');?>