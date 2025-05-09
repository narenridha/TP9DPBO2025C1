<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;


	// Implementing the 'add' method
	public function add()
	{
		// Logic for adding a record
		$data = "<form method='POST' action='index.php' class='form-container' style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;'>
			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='nim' style='font-weight: bold;'>NIM:</label>
				<input type='text' id='nim' name='nim' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='nama' style='font-weight: bold;'>Nama:</label>
				<input type='text' id='nama' name='nama' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='tempat' style='font-weight: bold;'>Tempat Lahir:</label>
				<input type='text' id='tempat' name='tempat' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='tanggal_lahir' style='font-weight: bold;'>Tanggal Lahir:</label>
				<input type='date' id='tanggal_lahir' name='tanggal_lahir' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='gender' style='font-weight: bold;'>Gender:</label>
				<select id='gender' name='gender' class='form-control' style='width: 100%; padding: 5px; border: 1px solid #ccc; border-radius: 5px;'>
					<option value='Laki-laki'>Laki-laki</option>
					<option value='Perempuan'>Perempuan</option>
				</select>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='email' style='font-weight: bold;'>Email:</label>
				<input type='email' id='email' name='email' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='margin-bottom: 15px;'>
				<label for='telepon' style='font-weight: bold;'>Telepon:</label>
				<input type='text' id='telepon' name='telepon' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
			</div>

			<div class='form-group' style='text-align: center;'>
				<button type='submit' name='add' class='btn btn-primary' style='padding: 10px 20px; background-color:rgb(19, 119, 12); color: white; border: none; border-radius: 5px; cursor: pointer;'>Add</button>
			</div>
		</form>";

		$this->tpl = new Template("templates/add.html");
		$this->tpl->replace("DATA_ADD", $data);
		$this->tpl->write(); // Mengganti kode Data_Tabel dengan data yang sudah diproses
	}

	// Implementing the 'addMahasiswa' method
	public function addMahasiswaView($nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		// Logic for adding a record
		$this->prosesmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	}

	// Implementing the 'edit' method
	public function edit($id)
	{
		// Logika untuk mendapatkan data mahasiswa berdasarkan ID
        $this->prosesmahasiswa->prosesDataMahasiswa();
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			if ($this->prosesmahasiswa->getId($i) == $id) {
				// Tampilkan form edit dengan data mahasiswa
				$data = "<form method='POST' action='index.php' class='form-container' style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;'>
					<input type='hidden' name='id' value='" . $this->prosesmahasiswa->getId($i) . "'>
					
					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='nim' style='font-weight: bold;'>NIM:</label>
						<input type='text' id='nim' name='nim' value='" . $this->prosesmahasiswa->getNim($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='nama' style='font-weight: bold;'>Nama:</label>
						<input type='text' id='nama' name='nama' value='" . $this->prosesmahasiswa->getNama($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='tempat' style='font-weight: bold;'>Tempat Lahir:</label>
						<input type='text' id='tempat' name='tempat' value='" . $this->prosesmahasiswa->getTempat($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='tanggal_lahir' style='font-weight: bold;'>Tanggal Lahir:</label>
						<input type='date' id='tanggal_lahir' name='tanggal_lahir' value='" . $this->prosesmahasiswa->getTl($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='gender' style='font-weight: bold;'>Gender:</label>
						<select id='gender' name='gender' class='form-control' style='width: 100%; padding: 5px; border: 1px solid #ccc; border-radius: 5px;'>
							<option value='Laki-laki' " . ($this->prosesmahasiswa->getGender($i) == 'Laki-laki' ? 'selected' : '') . ">Laki-laki</option>
							<option value='Perempuan' " . ($this->prosesmahasiswa->getGender($i) == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
						</select>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='email' style='font-weight: bold;'>Email:</label>
						<input type='email' id='email' name='email' value='" . $this->prosesmahasiswa->getEmail($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='margin-bottom: 15px;'>
						<label for='telepon' style='font-weight: bold;'>Telepon:</label>
						<input type='text' id='telepon' name='telepon' value='" . $this->prosesmahasiswa->getTelp($i) . "' class='form-control' style='width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>
					</div>

					<div class='form-group' style='text-align: center;'>
						<button type='submit' name='submit' class='btn btn-primary' style='padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;'>Update</button>
					</div>
				</form>";
			}
        } 

		$this->tpl = new Template("templates/edit.html");
		$this->tpl->replace("DATA_EDIT", $data);
		$this->tpl->write(); // Mengganti kode Data_Tabel dengan data yang sudah diproses
	}

	public function editMahasiswaView($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		// Logic for editing a record
		$this->prosesmahasiswa->editMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	}

	// Implementing the 'delete' method
	public function delete($id)
	{
		// Logic for deleting a record
		$this->prosesmahasiswa->deleteMahasiswaById($id);
	}

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td> 
			<td>
			<a href='index.php?id_edit=" . $this->prosesmahasiswa->getId($i) . " 'class ='btn btn-warning'>Edit</a>
			<a href='index.php?id_hapus=" . $this->prosesmahasiswa->getId($i) . "'class = 'btn btn-danger'>Delete</a>
			</td></tr>";
			
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
