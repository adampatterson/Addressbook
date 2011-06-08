<? load::view('template-header', array('title'=>"Listing")); ?>
<div class="span-21 right menu-row last">
    <div class="span-15  right">
        &nbsp;
    </div>
<!--
    <div class="span-1  menu-actions">
        <a href="<?= url::page("page/listing/view/grid/") ?>"><img src="<?= BASE_IMAGE; ?>icons/20-menu-grid.png" width="21" height="20" alt="Grid View" /></a>
    </div>
    <div class="span-1  menu-actions">
        <a href="<?= url::page("page/listing/view/list/") ?>"><img src="<?= BASE_URL; ?>icons/20-menu-list.png" width="21" height="20" alt="List View" /></a> </div>
	-->

    <div class="span-6 last">
        <select name="groupe" onchange="location = this.options[this.selectedIndex].value;">
            <option>Select a Group to View</option>
            <option></option>
            <option value='<?= url::base(); ?>'>View all Contacts</option>
            <option></option>
            <?php 
            $glink = url::page("page/grouplist/");
           
            foreach ($groups as $group):
            ?>
            <option value='<?=$glink.$group->gid; ?>'>
                <?= $group->groups; ?>
            </option>
            <? endforeach; ?>
        </select>
    </div>
</div>
<div class="span-21 last content-section">
    <? 
    // If $contacts is not set then nothing was returned
    if (isset($contacts)):
        
    ?>
    <div class="span-21 menu last">
        <div class="span-2">
            &nbsp;
        </div>
        <div class="span-4">
            <? 
           /*
		    // @todo save sort order in the session
            if (isset($colSort)) {
                // Order by Groups DSC
                echo '<a href="'.url::page("page/listing/sort/asc/").'"><strong>Name</strong> <img src="'.BASE_IMAGE.'icons/14-up.png" width="14" height="14" alt="Assending" /></a>';
            } else {
                // Default
                echo '<a href="'.url::page("page/listing/sort/desc/").'"><strong>Name</strong> <img src="'.BASE_IMAGE.'icons/14-down.png" width="14" height="14" alt="Desending" /></a>';
            }// END Sort
			*/
            ?>
			Name
        </div>
        <div class="span-4">
            Phone
        </div>
        <div class="span-7">
            Email
        </div>
    </div>
    <div class="span-20">
        <?php 
        foreach ($contacts as $contact):
			// If the photo existes then use it other wise use a place holder image
			$thumbPath = BASE_URL.$profile_images->get_images($contact->id,'small');
        ?>
        <div class="span-20 data-row last hover">
            <div class="span-2">
                <a href="<?php echo url::page("contacts/view/{$contact->id}"); ?>"><img src="<?=$thumbPath?>" width="60"  alt="Photo" class="photo" /><a/>
            </div>
            <div class="span-4">
                <div class="span-4">
                    <strong><a href="<?php echo url::page("contacts/view/{$contact->id}"); ?>"><?= $contact->firstname.' '.$contact->lastname; ?></a></strong>
                </div>
                <div class="span-4 last editDelete">
                    <a href="<?php echo url::page("admin/update/{$contact->id}"); ?>"><img src="<?=BASE_IMAGE; ?>icons/14-edit.png" width="14" height="14" alt="Edit" />Edit  </a>
                    &nbsp;&nbsp;<a href="<?php echo url::page("admin/delete/{$contact->id}"); ?>"><img src="<?= BASE_IMAGE; ?>icons/14-red-minus-ball.png" width="14" height="14" alt="Delete" /> Delete</a>
                </div>
            </div>
            <div class="span-4">
                <? 
                $singe_contacts = $contacts_table->get($contact->id);
                
               // print_r($singe_contacts);

                 foreach ($singe_contacts as $value) {
                 // @todo  Loop Type Phone
                 // if type == phone
                 if ($value->type=='phone'){ ?>
                 <small><?=$value->label?></small>: <span class="tel"><?= $value->value?></span>
                 <br>
                 <? }
                 }
  
                ?>&nbsp;
            </div>
            <div class="span-7">
                <? 
                // Loop Email
                foreach ($singe_contacts as $value) {
                 // @todo  Loop Type Email
                 // if type == email
                 if ($value->type=='email'){?>
                 <small><?=$value->label?></small>: <span class="email"><a href="mailto:<?=$value->value?>"><?=$value->value?></a></span><br>
                 <? }
                 }
                ?>&nbsp;
            </div>
            <div class="span-3 actions right last">
                <!--<img src="<?=BASE_URL; ?>assets/images/icons/20-home.png" width="15" height="15" alt="Home" />--><a href="<?php echo url::page("email/message/{$contact->id}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-mail.png" width="15" height="15" alt="Mail" /></a><a href="<?php echo url::page("export/vcard/{$contact->id}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-addressbook.png" width="15" height="15" alt="Addressbook" title="Export a vCard" /></a>
            </div>
        </div>
        <?php
        endforeach; 

        if (/*CURRENT_PAGE == 'page/search' && */!isset($contact)):
        	echo '<div class="span-20 data-row last"><p>Sorry, No matches were found for "'.$search_string.'"</p></div>';					
        endif  
		?>
    </div>
    <div class="span-1 alphabetical last">
        <? 
        echo $class_alphabet->currentAlphabet($alphabet);
        ?>
    </div>
    <? else: // START No results ?>
    <div class="span-20 last">
        Nohting to see here, because we couldnt find any results for you. Sorry!
    </div>
    <? endif; // END No results ?>
</div>
<?php 
if (isset($page)):
	if ($page->next()): ?>
		<a href="<?php echo url::page(CURRENT_PAGE."/{$page->next_page()}"); ?>
		"><!--img src="<?= BASE_URL; ?>assets/images/page-left.png" alt="Previous" /-->Previous</a>
	<?php endif; ?>
	<?php if ($page->prev()): ?>
		<a href="<?php echo url::page(CURRENT_PAGE."/{$page->prev_page()}"); ?>
		">&nbsp;<!--img src="<?= BASE_URL; ?>assets/images/page-right.png" alt="Next" /-->Next</a>
	<?php endif; 
endif;
load::view('template-footer'); ?>
