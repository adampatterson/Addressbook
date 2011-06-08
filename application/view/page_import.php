<? load::view('template-header',array('title'=>'Import'));?>
<div class="span-21 last content-section">
    <h3>Import:</h3>
    <hr />
    <div class="span-21 last">
        <p>
            To import Contacts or a Database Backup go to the <a href="#">Settings</a>
            section.
        </p>
    </div>
    <div class="span-10 export-row last">
        <div class="span-2">
            <img src="<?=BASE_IMAGE; ?>icons/48-excel.png" width="48" height="48" alt="Excel" />
        </div>
        <div class="span-8 export-list last">
            <strong>All Contacts</strong>
            <span>(standard)</span>
            <ul>
                <li>
                    <a href="#">Export contacts for Outlook, Entourage, or Gmail with CSV</a>
                </li>
                <li>
                    <a href="#">Export as XML</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="span-10 export-row prepend-1 last">
        <div class="span-2">
            <img src="<?=BASE_IMAGE; ?>icons/48-database.png" width="48" height="48" alt="Database" />
        </div>
        <div class="span-8 export-list last">
            <strong>Full Database Dump </strong>
            <span>(advanced)</span>
            <ul>
                <li>
                    <a href="#">Includes Everything. Settings, Contacts, and MySQL Structure</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="span-21 last">
        <p>
            Use this to upload your contacts with other websites.
        </p>
        <div class="note rounded">
            Go to the <a href="#">Settings</a>
            section to configure your External Applications.
        </div>
    </div>
    <div class="span-10 export-row api-list last">
        <div class="span-2">
            <img src="<?=BASE_IMAGE; ?>icons/48-excel.png" width="48" height="48" alt="Excel" />
        </div>
        <div class="span-8 last">
            <strong>API Push</strong>
            <ul>
                <li>
                    <a href="#">Basecamp</a>
                    <img src="<?=BASE_IMAGE; ?>icons/14-x.png" width="14" height="14" alt="X" />
                </li>
                <li>
                    <a href="#">Highrise</a>
                </li>
            </ul>
        </div>
    </div>
</div>	
<? load::view('template-footer'); ?>