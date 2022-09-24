<?php

class ReturnBook extends Database{
    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}

	// return
    public function returnBook($data){
        $title = $data; 
		$sessionName = $this->getSession();

        $query = "UPDATE data_buku SET 
                    status = 'ready'
                    WHERE judul = '$title'
                ";

        mysqli_query($this->getConn(), $query);

        $query = "UPDATE activity$sessionName SET 
                    notes = 'done'
                    WHERE title = '$title'
                ";
        
        mysqli_query($this->getConn(), $query);

    }
}