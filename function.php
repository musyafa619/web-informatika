<?php
 $koneksi = mysqli_connect("localhost", "root", "root", "informatik");

    if(!$koneksi){
        die("Koneksi Gagagl".mysqli_connect_error());
    }else{
        echo "Koneksi Berhasil !!!";
    }

    function tampilData($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
?>