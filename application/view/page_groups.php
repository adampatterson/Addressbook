<? load::view('template-header', array( 'title'=>"Groups" )); ?>
<div class="span-21 right menu-row last">
    <div class="span-12  right">
        &nbsp;
    </div>
       <div class="span-9 last">
     <a href="<?php echo url::page("admin/post_group/"); ?>" class="page" id="groupIcon">Groups</a>
    </div>
</div>
<div class="span-21 last content-section">
    <div class="span-21 menu last">
        <div class="colum span-1">
            &nbsp;
        </div>
        <div class="colum span-6">
            		<?
					/*
		// @todo save sort order in the session
		if ( isset ($colSort)) {
			// Order by Groups DSC
			echo '<a href="'.url::page("page/groups/sort/asc/").'"><strong>Name</strong> <img src="'.BASE_URL.'assets/images/icons/14-up.png" width="14" height="14" alt="Assending" /></a>';
		} else {
			// Default
			echo '<a href="'.url::page("page/groups/sort/desc/").'"><strong>Name</strong> <img src="'.BASE_URL.'assets/images/icons/14-down.png" width="14" height="14" alt="Desending" /></a>';
			}// END Sort
			*/
		?>
		Name
        </div>
        <div class="span-11">
           Count
        </div>
    </div>
    <div class="span-21 last">
    	<?php 
		foreach ($groups as $group): 
		$glink = url::page("page/grouplist/");
		$count = $count_group->count($group->gid);
		?>
		<div class="span-21 export-row last">
			<div class="span-1"><img src="<?=BASE_URL; ?>assets/images/icons/20-group.png" width="20" height="20" alt="Group" /></div>
			<div class="span-6"><strong><a href="<?=$glink.$group->gid; ?>"><?=$group->groups; ?></a></strong></div>
			<div class="span-11 small"><strong><?=$count; ?></strong></div>
			<div class="span-3 actions right last">
			<a href="<?php echo url::page("page/maps/{$group->gid}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-earth.png" width="20" height="20" alt="Web Site" /></a><!--<img src="<?=BASE_URL; ?>assets/images/icons/20-mail.png" width="20" height="20" alt="Mail" />--><a href="<?php echo url::page("admin/update_group/{$group->gid}"); ?>"><? if ($group->gid !== '1'): ?><img src="<?=BASE_URL; ?>assets/images/icons/20-pencil.png" width="20" height="20" alt="Edit" /></a><a href="<?php echo url::page("admin/delete_group/{$group->gid}"); ?>"><img src="<?=BASE_URL; ?>assets/images/icons/20-group-remove.png" width="20" height="20" alt="Addressbook" /></a><? else: ?><img src="<?=BASE_URL; ?>assets/images/spacer.gif" width="20" height="20" alt="Spacer" /><img src="<?=BASE_URL; ?>assets/images/spacer.gif" width="20" height="20" alt="Spacer" /><? endif; ?></div>
		</div>
		<? endforeach; ?>
   </div>
</div>
<? load::view('template-footer'); ?>