<?php

class LoginAdmin extends Database{
    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}

    //login admin
    public function login($data){
        $email = $data["email"];
        $password = $data["password"];

        $result = mysqli_query($this->getConn(), "SELECT * FROM admin WHERE email = '$email'");

        // cek username dan email
        if ( mysqli_num_rows($result) === 1) {
            
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ( $password === $row["password"] ) {
                // set session
                $_SESSION["loginadmin"] = true;
                $_SESSION['email'] = $_POST['email'];
                header("Location: indexadmin.php");
                exit;
            }
        }

        $error = true;
        return $error;
    }
}