<?php

class Login extends Database{
    
    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}

    //login
    public function login($data){
        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];

        $query = "SELECT * FROM anggota WHERE nama = '$name' AND email = '$email'";
        $result = mysqli_query($this->getConn(), $query);

        // cek username & npm
        if ( mysqli_num_rows($result) === 1) {
            
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ( $password === $row["password"] ) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION['name'] = $_POST['name'];
                $_SESSION['email'] = $_POST['email'];
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
        return $error;
    }
}