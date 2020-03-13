<?php
class Connection{
	private $servername;
	private $username;
	private $password;
	private $db_name;
	function connect(){
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->db_name = "db_phonebook";
         // Create connection
		$newcon = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
        // Check connection
		if ($newcon->connect_error) {
			die("Connection failed: " . $newcon->connect_error);
		}else{
			return $newcon;		
		}
	}
}
?>
