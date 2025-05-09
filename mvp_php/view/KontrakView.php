<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView{
	public function tampil(); // Menambahkan metode untuk menampilkan data mahasiswa
	public function edit($id); // Menambahkan metode untuk edit data mahasiswa
	public function delete($id); // Menambahkan metode untuk delete data mahasiswa
	public function editMahasiswaView($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp); // Menambahkan metode untuk edit data mahasiswa
	public function addMahasiswaView($nim, $nama, $tempat, $tl, $gender, $email, $telp); // Menambahkan metode untuk menambah data mahasiswa
}
?>