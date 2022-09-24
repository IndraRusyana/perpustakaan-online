<?php 
 
class AddBook extends Database{
    public function __construct($host,$username,$password,$dbname){
		parent::__construct($host,$username,$password,$dbname);
	}

    // tambah buku
    public function createbuku($data){
        $judul = $data["judul"];
        $pengarang = $data["pengarang"];
        $tahun = $data["tahun"];
        $tipe = $data["tipe"];
        $status = "ready";

        $create = "INSERT INTO data_buku VALUES('','$judul','$pengarang','$tahun','$tipe','$status')";
        mysqli_query($this->getConn(), $create);

        $result = mysqli_affected_rows($this->getConn());
        if ( $result < 0 ) {
            $result = "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'indexadmin.php';
                  </scrpit>";
        } else{
            $result = "<script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'indexadmin.php';
                  </script>";
        }
        return $result;
    }
}