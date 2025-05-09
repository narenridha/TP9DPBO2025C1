<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();
if (isset($_POST['add'])) {
    // Retrieve form data
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tp->addMahasiswaView($nim, $nama, $tempat, $tanggal, $gender, $email, $telepon);
    $data = $tp->tampil();
}else if (isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telepon'];
    
    // Call the edit function
    $tp->editMahasiswaView($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
    $data = $tp->tampil();
}else if(isset($_GET['add'])){// after submit add
    $tp->add();
} else if(!empty($_GET['id_edit'])){
    $id = $_GET['id_edit'];
    $tp->edit($id);
}else if(!empty($_GET['id_hapus'])){
    $id = $_GET['id_hapus'];
    $tp->delete($id);
    $data = $tp->tampil();

}else{
    $data = $tp->tampil();
}
