<?php
class wow_database {
	private $wow_db_host = "127.0.0.1";
	private $wow_db_username = "username";
	private $wow_db_password = "password";
	private $wow_db_auth = "auth";
	private $wow_db_world = "world";
	private $wow_db_characters = "characters";
	private $wow_db =  "";
	
	public function get_host() {
		return $this->wow_db_host;
	}
	
	public function get_username() {
		return $this->wow_db_username;
	}
	
	public function get_password() {
		return $this->wow_db_password;
	}
	
	public function get_auth() {
		return $this->wow_db_auth;
	}
	
	public function get_world() {
		return $this->wow_db_world;
	}
	
	public function get_characters() {
		return $this->wow_db_characters;
	}
	
	public function get_db() {
		return $this->wow_db;
	}
	
	public function connect($host, $username, $password) {
		$dbc = mysqli_connect($host,$username,$password) or 
           die('could not connect: '. mysqli_connect_error());
		
		return $dbc;
	}
	
	public function select_db($dbc, $db) {
		mysqli_select_db($dbc, $db) or die('no db connection');
	}
	
	public function log_in($dbc, $username, $password) {
		$usr = $username;
		$psw = sha1(strtoupper($username) . ":" . strtoupper($password));
		
		$q = "SELECT * FROM account WHERE username='$usr' AND sha_pass_hash='$psw'";
		
		$res = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($res) == 1){
			session_start();

			$_SESSION['log'] = '' . $username . '';

			return 1;
		} else {
			echo '<script>';
			echo 'alert("Account not loged in.");';
			echo '</script>';
		}
	}
}
?>