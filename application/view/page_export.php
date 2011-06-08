<? load::view('template-header',array('title'=>'Export')); ?>
<div class="span-21 last content-section">
    <!--<h3>Full Export:</h3>
    <hr />-->
    <div class="span-21 last">
    	<h3>Coming soon!</h3>
        <p>
            To import Contacts or a Database Backup go to the <a href="#">Settings</a> section.
        </p>
    </div>
    <div class="span-10 export-row last">
        <div class="span-2">
            <img src="<?=BASE_URL; ?>assets/images/icons/48-excel.png" width="48" height="48" alt="Excel" />
        </div>
        <div class="span-8 export-list last">
            <strong>All Contacts</strong>
            <span>(standard)</span>
            <ul>
                <li>
                    <a href="<?=url::page("export/csv/"); ?>">Export contacts for Outlook, Entourage, or Gmail with <acronym title="Comma separated values">CSV</acronym></a>
                </li>
                <li>
                    <a href="<?=url::page("export/vcard/"); ?>#">Export as a multiple vCard file.</a>
                </li>
        		<li>
                    <a href="<?=url::page("export/xml/"); ?>#">Export as <acronym title="Extensible Markup Language">XML</acronym></a>
                </li>
        		<li>
                    <a href="<?=url::page("export/rdf/"); ?>#">Export as <acronym title="Resource Description Framework">XML RDF</acronym></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="span-10 export-row prepend-1 last">
        <div class="span-2">
            <img src="<?=BASE_URL; ?>assets/images/icons/48-database.png" width="48" height="48" alt="Database" />
        </div>
        <div class="span-8 export-list last">
            <strong>Full Database Dump </strong>
            <span>(advanced)</span>
            <ul>
                <li>
                    <a href="<?=url::page("export/sql/"); ?>">Includes Everything. Settings, Contacts, and MySQL Structure</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="span-21 last none">
        <p>
            Use this to upload your contacts with other websites.
        </p>
        <div class="note rounded">
            Go to the <a href="#">Settings</a>
            section to configure your External Applications.
        </div>
    </div>
    <div class="span-11 export-row api-list last none">
        <div class="span-2">
            <img src="<?=BASE_URL; ?>assets/images/icons/48-excel.png" width="48" height="48" alt="Excel" />
        </div>
        <div class="span-9 last">
            <strong>API Push</strong>
            <ul>
                <li>
                    <a href="#">Basecamp</a>
                    <img src="<?=BASE_URL; ?>assets/images/icons/14-x.png" width="14" height="14" alt="X" />
                </li>
                <li>
                    <a href="#">Highrise</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--
<div class="span-21 last content-section">
 <h3>Contacts By Group:</h3>
	    <hr />
    <div class="span-21 last">
        <p>
            Export Contacts by Groups.
        </p>
    </div>
    <div class="span-21 menu last">
        <div class="colum span-1">
            &nbsp;
        </div>
        <div class="colum span-5">
            <? /*
            if ( isset ($colSort)) {
                // Order by Groups DSC
                echo '<a href="index.php?page=export"><strong>Name</strong> <img src="images/icons/14-up.png" width="14" height="14" alt="Assending" /></a>';
            } else {
                // Default
                echo '<a href="index.php?page=export&colSort=1"><strong>Name</strong> <img src="images/icons/14-down.png" width="14" height="14" alt="Desending" /></a>';
            }// END Sort
			*/
            ?>
        </div>
        <div class="span-11">
            <strong>Count</strong>
        </div>
    </div>
    <div class="span-21 last">
        <? /*
        foreach ($result as $row) {
            // Count how many contacts are under each group
            $group_count = $db->query('SELECT * FROM addressbook WHERE gid = '.$row['gid']);
            $num = $group_count->countReturnedRows();
        
            echo '
            <div class="span-21 export-row last">
              <div class="span-1"><img src="images/icons/20-group.png" width="20" height="20" alt="Group" /></div>
              <div class="span-5"><strong><a href="index.php?page=list&group='.$row['gid'].'">'.$row['groups'].'</a></strong></div>
              <div class="span-11 small"><strong> '.$num.'</strong></div>
              <div class="span-3 actions right last"><img src="images/icons/20-excel.png" width="20" height="20" alt="Excel" /></div>
            </div>';
        } */
        ?>
    </div>
</div>
-->   
<? load::view('template-footer'); ?>