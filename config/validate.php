<?php
class wow_validate {
	public function username($username) {
		if (empty($username)) {
			echo '<script>';
			echo 'alert("Username is empty, Please input your desired Username.");';
			echo '</script>';
		} elseif (!preg_match("/^[a-z0-9]{5,32}$/i", $username)) {
			echo '<script>';
			echo 'alert("Only Letters and Numbers are allowed, And must be 5 to 32 characters long.");';
			echo '</script>';
		} else {
			return $username;
		}
	}
	
	public function password($password, $cpassword) {
		if (empty($password)) {
			echo '<script>';
			echo 'alert("Password is empty, Please input your desired Password.");';
			echo '</script>';
		} elseif (!preg_match('/^[a-z0-9!"#$%]{8,16}$/i', $password)) {
			echo '<script>';
			echo 'alert("Only Letters and Numbers are allowed, And must be 8 to 16 characters long.");';
			echo '</script>';
		} elseif (empty($cpassword)) {
			echo '<script>';
			echo 'alert("Please confirm your password.");';
			echo '</script>';
		} elseif ($password !== $cpassword) {
			echo '<script>';
			echo 'alert("Passwords do not match.");';
			echo '</script>';
		} else {
			return array ($password, $cpassword);
		}
	}
	
	public function email($email) {
		if (empty($email)) {
			echo '<script>';
			echo 'alert("E-Mail is empty, Please input your desired E-Mail.");';
			echo '</script>';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo '<script>';
			echo 'alert("Invalid email format");';
			echo '</script>';
		} else {
			return $email;
		}
	}
	
	public function expansion($expansion) {
		if (empty($expansion)) {
			echo '<script>';
			echo 'alert("Expansion is empty, Please input your desired Expansion.");';
			echo '</script>';
		} elseif (intval($expansion) < 2 || intval($expansion) > 2) {
			echo '<script>';
			echo 'alert("Only wrath of the lich king is available at this time.");';
			echo '</script>';
		} else {
			return $expansion;
		}
	}
}
?>