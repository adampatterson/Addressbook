<? bench::mark('start'); 

  $browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    if ($browser == true){
    $browser = 'iphone';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="<?=BASE_URL; ?>" />
	<?php if($browser == 'iphone'){ ?>
 	<title>Addressbook</title>
	<? }else{ ?>
 	 <title>Addressbook - <?= $title?></title>
	<? } ?>
	<?php if($browser == 'iphone'){ ?>
  	<link rel="stylesheet" type="text/css" href="assets/lib/blueprint/liquid.css" media="screen, projection" />
	<? } else {  ?>
	<link rel="stylesheet" type="text/css" href="assets/lib/blueprint/screen.css"  media="screen, projection" />
	<? } ?>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/lib/blueprint/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/lib/markitup/skins/simple/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/lib/markitup/sets/textile/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/css/custom.css" media="screen, projection" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/markitup/jquery.markitup.js"></script>
  <script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/markitup/sets/textile/set.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $(".markItUp").markItUp(mySettings);
      });
  </script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/showHide.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/appendElement.js"></script>
	<!--<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.jmap.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.passwordmask.js"></script>-->
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/validation.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.validate.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.highlightFade.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.tabs.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.simplemodal-1.3.5.min.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.pstrength-min.1.2.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/utility.js"></script>
    <script language="javascript" type="text/javascript">
		function popUp(URL) {
			day = new Date();
			id = day.getTime();
			eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=500');");
	    	}
    </script>
    <!--[if IE]><![endif]-->
    <link rel="apple-touch-icon" href="<?=BASE_URL; ?>apple_icon.png" />
    <link rel="shortcut icon" href="<?=BASE_URL; ?>favicon.ico" />
	<? if($browser == 'iphone'){ ?>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<? } ?>

</head>
<body> <!--onunload="GUnload()">-->
    <div class="container">
        <div class="span-24 header last">
            <div class="span-12 logo">
                <a href="<?=BASE_URL; ?>"><img src="<?=BASE_URL; ?>assets/images/logo.png" width="329" height="130" alt="Addressbook" /></a>
            </div>
            <div class="span-11 utility last">
                <div class="span-11  utility-nav last">
                <? // @todo if the user is logged in then show a logout option.
                if(user::valid()) { ?>
                      <a href="<?=url::page('admin/logout'); ?>" class="utilLogin">Logout</a>
                      <a href="<?=url::page('admin/profile'); ?>" class="utilProfile">Profile</a>
                      <a href="<?=url::page('admin/settings'); ?>" class="utilSettings none">Settings</a>
                    <? } else { ?>
                      <a href="<?=url::page('admin/login'); ?>" class="utilLogin">Login</a>
                    <? } ?>
                      <a href="<?=url::page('page/about'); ?>" class="utilAbout">About</a>
                 	  <a href="#" class="utilHelp help">Help</a>
                </div>
                <div id="header-search" class="search-box utility-search last right">
                    <form id="main-search-form" action="<?=url::page('page/search'); ?>" method="post">
                        <div class="search-button">
                            <input class="submit" value="" type="submit" />
                        </div>
                        <div class="center">
                            <input class="search placeholder" name="search" title="Search for a Contact" value="" type="text" />
                        </div>
                        <div class="left">
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="span-23 last contentWrapper">
            <div class="span-14 navigation">
                <ul>
                    <li class="page <? if ($title == 'Listing') echo 'currentpage'; ?>"><a href="<?=url::page('page/listing'); ?>">Home</a></li>
                    <li class="page <? if ($title == 'Groups') echo 'currentpage'; ?>"><a href="<?=url::page('page/groups'); ?>">Groups</a></li>
                    <li class="page <? if ($title == 'Map') echo 'currentpage'; ?>"><a href="<?=url::page('page/maps'); ?>">Maps</a></li>
                    <li class="page <? if ($title == 'Export') echo 'currentpage'; ?>"><a href="<?=url::page('page/export'); ?>">Export</a></li>
                    <li class="page <? if ($title == 'Import') echo 'currentpage'; ?> none"><a href="<?=url::page('page/import'); ?>">Import</a></li>
                    <li class="page <? if ($title == 'Members') echo 'currentpage'; ?> none"><a href="<?=url::page('page/members'); ?>">Members</a></li>
                </ul>
            </div>
            <div class="span-9 quickNavigation last">
                <ul>
                    <li class="page <? //if ($title == 'Add Contact') echo 'currentpage'; ?>"><a href="<?=url::page('admin/post'); ?>" class="current" id="addIcon">Add Contact</a></li>
                    <!--<li><a href="index.php?page=groups" class="page" id="groupIcon">Groups</a></li>-->
                </ul>
            </div>
            <div class="span-21 prepend-1 append-1 content last">
