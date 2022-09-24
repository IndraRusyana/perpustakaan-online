<?php

// tambah anggota (register)
class Register extends Database{

    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}
     
    // cek nama, email, repeat password di form register
    public function cekDataForm($data){
        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];
        $password2 = $data["password2"];
        $result = "ok";

        // cek nama
        $nameFromTable = $this->read("SELECT nama FROM anggota");
        foreach($nameFromTable as $value){
            if($name == $value['nama']){
                $result = "username";
            } 
        }

        // cek email
        $emailFromTable = $this->read("SELECT email FROM anggota");
        foreach($emailFromTable as $value){
            if($email == $value['email']){
                $result = "email";
            } 
        }

        // cek repeat password
        if ( $password !== $password2 ) {
            $result = "password";
        }

        return $result; 
    }
       
    // tambah anggota
    public function insertDataAnggota($data){
        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];

        $query = "INSERT INTO anggota VALUES('','$name','$email','$password')";
        mysqli_query($this->getConn(),$query);

        // buat table baru
        $query = "CREATE TABLE activity$name(
                    id INT(11) PRIMARY KEY AUTO_INCREMENT,
                    title VARCHAR(255) NOT NULL,
                    borrowed VARCHAR(255) NOT NULL,
                    loan_period VARCHAR(255) NOT NULL,
                    returned VARCHAR(255) NOT NULL,
                    notes VARCHAR(255) NOT NULL
                    )";

        mysqli_query($this->getConn(), $query);

        $result = mysqli_affected_rows($this->getConn());
        if ( $result < 0 ) {
            $result = "gagal";
        } else{
            $result = "sukses";
        }

        return $result; 
    }    
           
}