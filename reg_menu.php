<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
//Include all necessary libs.
require_once("./e107_plugins/TC_soap/config/db.php");
require_once("./e107_plugins/TC_soap/config/validate.php");
require_once("./e107_plugins/TC_soap/config/soap.php");

//Load new instance of libs.
$db = new wow_database();
$validate = new wow_validate();
$soap = new wow_soap();

//Ensure form has been submitted before running our scripts.
if (isset($_POST['submit'])) {
	//We do multiple things here.
	//We validate form input, Then our validation lib assigns our vars with giving values.
	$wow_username = $validate->username($_POST['username']);
	//This one is a little different, our function in the validation lib checks both password and cpassword and then returns an array.
	//We then use php's list function to assign our vars with there values from the array.
	list ($wow_password, $wow_cpassword) = $validate->password($_POST['password'], $_POST['cpassword']);
	$wow_email = $validate->email($_POST['email']);
	$wow_expansion = $validate->expansion($_POST['expansion']);

	//Calls our command functions in our soap lib.
	$soap->account_create($wow_username, $wow_password);
	$soap->account_set_gmlevel($wow_username, "0", "-1");
	
	echo '</br>
	<div align="center">
	<b>Account: ' . $wow_username . ' Created.</b>
	</div>';
}
if (!isset($_SESSION['log'])) {
	if (!isset($_POST['submit'])) {
		include "./e107_plugins/TC_soap/index.php";
	}
}
?>