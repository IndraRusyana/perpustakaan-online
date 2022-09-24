<?php

// class tanggal
class Date{
    public function tanggal(){
        date_default_timezone_set('Asia/Jakarta');
        return date('d-M-Y h:i:s A');
    }
}

