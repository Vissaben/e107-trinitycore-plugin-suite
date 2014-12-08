<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

//Include all necessary libs.
require_once("./e107_plugins/TC_soap/config/db.php");
require_once("./e107_plugins/TC_soap/config/validate.php");

//Load new instance of libs.
$db = new wow_database();
$validate = new wow_validate();

if (isset($_POST['Login'])) {
	$username = $validate->username($_POST['username']);
	list ($password, $cpassword) = $validate->password($_POST['password'], $_POST['password']);
	
	$login_host = $db->get_host();
	$login_username = $db->get_username();
	$login_password = $db->get_password();
	$login_db = $db->get_auth();
	
	$login_connect = $db->connect($login_host, $login_username, $login_password);
	$login_select = $db->select_db($login_connect, $login_db);
	$login = $db->log_in($login_connect, $username, $password);
}

if (!isset($_SESSION['log'])) {
	include "./e107_plugins/TC_soap/login.php";
}
?>