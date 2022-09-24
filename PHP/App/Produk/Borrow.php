<?php

class Borrow extends Database{
    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}

    // borrow
    public function borrowBook($data){
        $id = $data; 
        $sessionName = $this->getSession();

        $query = "UPDATE data_buku SET 
            status = 'on loan'
            WHERE id_buku = $id
        ";

        mysqli_query($this->getConn(), $query);

        $query = "SELECT * FROM data_buku WHERE id_buku = $id";
        $koneksiBuku = mysqli_query($this->getConn(),$query);

        foreach($koneksiBuku as $value){
            $title = $value['judul'];
            $borrowed = date('d-M-Y');
            $loan_period = '5 days';
            $returned = date('d-M-Y', strtotime('+5days'));
            $notes = 'on progress';
        }

        $query = "INSERT INTO activity$sessionName VALUES('','$title','$borrowed','$loan_period','$returned','$notes')";
        mysqli_query($this->getConn(), $query);

        $result = mysqli_affected_rows($this->getConn());

    }
}