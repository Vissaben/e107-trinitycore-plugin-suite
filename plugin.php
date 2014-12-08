<?php
if (!defined('e107_INIT')) { exit; }

global $PLUGINS_DIRECTORY;

// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = 'TC Soap Plugin Suite';
$eplug_version = "1.0";
$eplug_author = "Vissaben";
$eplug_logo = "";
$eplug_url = "";
$eplug_email = "";
$eplug_description = 'TC Soap Plugin Suite';
$eplug_compatible = "e107v0.7+";
$eplug_readme = "";        // leave blank if no readme file

// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "TC_soap";

// Name of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = array("reg_menu.php", "log_menu.php");

// Name of the admin configuration file  
$eplug_conffile = "";

// List of preferences 
$eplug_prefs       = "";
$eplug_table_names = "";

// Create a link in main menu (yes=TRUE, no=FALSE) 
$eplug_link = TRUE;
$eplug_link_name  = "TC Soap Plugin Suite";
$eplug_link_perms = "Everyone";

// Text to display after plugin successfully installed 
$eplug_done           = "Installation Successful..";
$eplug_uninstall_done = "Uninstalled Successfully..";
?>