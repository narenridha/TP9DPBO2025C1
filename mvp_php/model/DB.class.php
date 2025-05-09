<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class DB
{
	var $db_host = 'localhost'; // host
	var $db_user = 'root'; // user basis data
	var $db_password = ''; // password
	var $db_name = 'db_mvp'; // nama basis data
	var $db_link = null; // koneksi basis data
	var $result = 0;

	function __construct($db_host = '', $db_user = '', $db_password = '', $db_name = '')
	{
		// konstruktor
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_name = $db_name;
	}

	function open()
	{
		// membuka koneksi
		$this->db_link = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
	}

	function execute($query = "")
	{
		// mengeksekusi query
		$this->result = mysqli_query($this->db_link, $query);

		return $this->result;
	}

	function getResult()
	{
		// mengambil ekseskusi query
		if ($this->result instanceof mysqli_result) {
			return mysqli_fetch_array($this->result);
		}
		return null; // Return null if the result is not valid
	}

	function close()
	{
		// menutup koneksi
		mysqli_close($this->db_link);
	}
}
