<?php
class koneksi {
	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $db = "db_kelas_4d";
	private $hubungan;

	function ambilKoneksi(){
		$hubungan = new mysqli($this->server, $this->username, $this->password, $this->db);
		return $hubungan;

	}

}

?>