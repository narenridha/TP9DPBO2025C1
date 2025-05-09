<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "db_mvp"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi email
				$mahasiswa->setTelp($row['telp']); // mengisi hp

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}
	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
	function getEmail($i)
	{
		// mengembalikan email mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getTelp($i)
	{
		// mengembalikan telp mahasiswa dengan indeks ke i
		return $this->data[$i]->telp;
	}
	function getMahasiswaById($id)
	{
		foreach ($this->data as $mahasiswa) {
			if ($mahasiswa->getId($id) == $id) {
				return $mahasiswa; // Mengembalikan objek mahasiswa jika ditemukan
			}
		}
		return null; // Jika tidak ditemukan
	}

	function editMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		try {
			// Open database connection
			$this->tabelmahasiswa->open();

			// Update mahasiswa data in the database
			$result = $this->tabelmahasiswa->editMahasiswaProses($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);

			// Close database connection
			$this->tabelmahasiswa->close();

			return $result; // Return the result of the update operation
		} catch (Exception $e) {
			echo "Error updating mahasiswa: " . $e->getMessage();
			return false;
		}
	}

	function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		try {
			// Open database connection
			$this->tabelmahasiswa->open();

			// Add mahasiswa data to the database
			$result = $this->tabelmahasiswa->addMahasiswaProses($nim, $nama, $tempat, $tl, $gender, $email, $telp);

			// Close database connection
			$this->tabelmahasiswa->close();

			return $result; // Return the result of the add operation
		} catch (Exception $e) {
			echo "Error adding mahasiswa: " . $e->getMessage();
			return false;
		}
	}
	

	function deleteMahasiswaById($id)
	{
		try {
			// Open database connection
			$this->tabelmahasiswa->open();

			// Delete mahasiswa data from the database
			$result = $this->tabelmahasiswa->deleteMahasiswaProses($id);

			// Close database connection
			$this->tabelmahasiswa->close();

			return $result; // Return the result of the delete operation
		} catch (Exception $e) {
			echo "Error deleting mahasiswa: " . $e->getMessage();
			return false;
		}
	}
}
