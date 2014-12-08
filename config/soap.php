<?php
class wow_soap {
	public function __construct() {
		$this->wow_soap_host = "127.0.0.1";
		$this->wow_soap_port = "25";
		$this->wow_soap_username = "username";
		$this->wow_soap_password = "password";
		$this->wow_soap_client = new SoapClient(NULL, array(
			'location' => "http://" . $this->wow_soap_host . ":" . $this->wow_soap_port . "/",
			'uri'      => 'urn:TC',
			'style'    => SOAP_RPC,
			'login'    => $this->wow_soap_username,
			'password' => $this->wow_soap_password,
		));
	}
	
	public function account_create($username, $password) {
		$result = $this->wow_soap_client->executeCommand(new SoapParam("account create " . $username . " " . $password, 'command'));
	}
	
	public function account_set_gmlevel($username, $gmlevel, $scope) {
		$result = $this->wow_soap_client->executeCommand(new SoapParam("account set gmlevel " . $username . " " . $gmlevel . " " . $scope . "", 'command'));
	}
	
	public function send_items($player_name, $subject, $text, $item_id_01, $item_id_02, $item_id_03, $item_id_04, $item_id_05) {
		$item_id = array($item_id_01, $item_id_02, $item_id_03, $item_id_04, $item_id_05);
		$result_item = 'send items ' . $player_name . ' "' . $subject . '" "' . $text;
		$count = count($item_id);
		x;
		
		for ($x = 0; $x <= $count; $x++) {
			if (!empty($item_id[$x])) {
				$result_item .= ' ' . $item_id[$x];
			}
		}
		
		$result = $this->wow_soap_client->executeCommand(new SoapParam($result_item, 'command'));
	}
	
	public function send_money($player_name, $subject, $text, $money) {
		$result = $this->wow_soap_client->executeCommand(new SoapParam('send money ' . $player_name . ' "' . $subject . '" "' . $text . '" ' . $money . '', 'command'));
	}
}
?>