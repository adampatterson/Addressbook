<?php

error_reporting(E_STRICT|E_ALL);

// Application configuration
//----------------------------------------------------------------------------------------------

// Configuration

define('CONFIGURATION','deployment');


// Dingo Location
define('SYSTEM','system');

// Application Location
define('APPLICATION','application');

// Config Directory Location (in relation to application location)
define('CONFIG','config');

// Allowed Characters in URL
define('ALLOWED_CHARS','/^[ \!\,\~\&\.\:\+\@\-_a-zA-Z0-9]+$/');

// Application Settings
if (CONFIGURATION == 'deployment' && !file_exists('application/config/deployment/db.php')){
    header( 'Location: /setup/' ) ;
    die;
}

// End of configuration
//----------------------------------------------------------------------------------------------
define('DINGO',1);
require_once(SYSTEM.'/core/bootstrap.php');
bootstrap::run();