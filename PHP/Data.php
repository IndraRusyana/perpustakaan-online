<?php
require_once 'App/init.php';

// koneksi ke database
$mysqli = new Database('Localhost', 'root', '' ,'perpustakaan_db');
$hostDB = $mysqli->getHost();
$usernameDB = $mysqli->getUsername();
$passwordDB = $mysqli->getPassword();
$databaseDB = $mysqli->getDBname();

// get session name
$name = $mysqli->getSession();

// baca database data anggota
$koneksi = $mysqli->read("SELECT * FROM anggota");

// baca database data buku
$koneksiBuku = $mysqli->read("SELECT * FROM data_buku");

// baca database activity
$koneksiActivity = $mysqli->read("SELECT * FROM activity$name");

// aktivitas di profile
$koneksiActivity['$nameTable'] = $mysqli->read("SELECT * FROM activity$name");

// tambah data ke database anggota
if(isset($_POST["register"])){
    // instansiasi Register
    $registerAnggota = new Register($hostDB,$usernameDB,$passwordDB,$databaseDB);

    // cek data form register anggota
    if($registerAnggota->cekDataForm($_POST) == "ok"){
        $result = $registerAnggota->insertDataAnggota($_POST);
    } else{
        $result = $registerAnggota->cekDataForm($_POST);
        if($result == "username"){
            $error1 = true;
        } elseif($result == "email"){
            $error2 = true;
        } elseif($result == "password"){
            $error3 = true;
        }
    }

}

//login anggota
if(isset($_POST["login"])){
    // instansiasi Login
    $loginAnggota = new Login($hostDB,$usernameDB,$passwordDB,$databaseDB);

    if ($loginAnggota->login($_POST) == 1){
        $error = true;
    }
}

//login admin
if(isset($_POST["loginadmin"])){
    // instansiasi LoginAdmin
    $loginAdmin = new LoginAdmin($hostDB,$usernameDB,$passwordDB,$databaseDB);

    if ($loginAdmin->login($_POST) == 1){
        $error = true;
    }
}

//tambah buku
if(isset($_POST["addbuku"])){
    // instansiasi LoginAdmin
    $AddBook = new AddBook($hostDB,$usernameDB,$passwordDB,$databaseDB);

    echo $AddBook->createbuku($_POST);
}

// borrow
if(isset($_GET['borrow'])){
    // instansiasi LoginAdmin
    $Borrow = new Borrow($hostDB,$usernameDB,$passwordDB,$databaseDB);

    $Borrow->borrowBook($_GET['borrow']);
    echo "<script> document.location.href = 'profile.php' </script>";
}

// return
if(isset($_GET['return'])){
    // instansiasi LoginAdmin
    $ReturnBook = new ReturnBook($hostDB,$usernameDB,$passwordDB,$databaseDB);

    $ReturnBook->returnBook($_GET['return']);
    echo "<script> document.location.href = 'index.php' </script>";
}

//tanggal
$objDate = new Date();
$date = $objDate->tanggal(); 



// CRUD