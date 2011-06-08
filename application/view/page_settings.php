<? load::view('template-header', array( 'title'=>'Settings' )); ?>
<? 
// Connecting to a MySQL database on the server example.com
// @todo Gather data format
?>
<div class="span-21 last content-section">
    <h3>Settings</h3>
    <hr/>
    <div class="span-21 google-maps last">
        <div class="tabs">
            <ul class="tabNavigation">
                <li><a href="#first">Settings</a></li>
                <li><a href="#second">Users</a></li>
                <li><a href="#third">Groups</a></li>
                <li><a href="#fourth">Email Templates</a></li>
                <li><a href="#fith">Host Information</a></li>
            </ul>
            <div id="first" class="span-21">
                <div class="span-17">
                    <div class="span-17 last">
                        <p>
                            <strong>Settings</strong>
                        </p>
                        <ul>
                            <li>Enable Portal</li>
                            <li>Hashed URLS expire in X days</li>
                            <li>Googme maps API Key</li>
                            <li>Default Sort Order</li>
                            <li>Date Format - http://ca3.php.net/manual/en/function.date.php</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="second" class="span-17">
                <p>
                    <strong>Users</strong>
                </p>
                <ul>
                    <li>Add Admin</li>
                    <li>Remove Admin</li>
                    <li>Edit Admin</li>
                </ul>
            </div>
            <div id="third" class="span-21">
                <div class="span-17">
                    <div class="span-17 recent last">
                        <p>
                            <strong>Groups</strong>
                        </p>
                        <ul>
                            <li>Add, Edit, Remove</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="fourth" class="span-17">
                <p>
                    <strong>Email Templates</strong>
                </p>
                <ul>
                    <li>Add, Edit, Remove</li>
                    <li>Email message templates</li>
                </ul>
            </div>
            <div id="fith" class="span-17">
                <p>
                    <strong>Host Information</strong>
                </p>
                <ul>
                    <li>Server Software Apache/2.2.11 (Unix) PHP/4.4.9 mod_ssl/2.2.11 OpenSSL/0.9.8c mod_fastcgi/2.4.6 Phusion_Passenger/2.1.2 DAV/2 SVN/1.4.2</li>
                    <li>Guessed imagepath: /home/studiolounge/thewonderingphotographer.com/images/</li>
                    <li>Configured Imagepath: ../images/</li>
                    <li>Guessed thumbnailpath /home/studiolounge/thewonderingphotographer.com/thumbnails/</li>
                    <li>Configured Thumbnailpath ../thumbnails/</li>
                    <li>Image Directory: OK - Can we write to the directory? YES. Current CHMOD: 0755</li>
                    <li>Thumbnails Directory: OK - Can we write to the directory? YES. Current CHMOD: 0755</li>
                    <li>Language Directory: OK</li>
                    <li>Addons Directory: OK</li>
                    <li>Includes Directory: OK</li>
                    <li>Templates Directory: OK</li>
                </ul>
                <? 
                echo "<br /><strong>PHP Version:</strong> ";
                //getPhpVersion ();
                echo "<br /><strong>GD Version:</strong> ";
                //getGDVersion();
                echo "<br /><strong>MySQL Verison:</strong> ";
                //getMysqlVersion();
                echo "<br /><strong>Session Save Path:</strong> ";
                //getSessionPath();
                echo "<br /><strong>Server Software:</strong> ";
                //getServerSoft();
                echo "<br /><strong>Allow File Upload:</strong> ";
                //getAllowUpload();
                ?>
            </div>
        </div>
    </div>
</div>
<? load::view('template-footer'); ?>