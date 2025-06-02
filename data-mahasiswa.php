<?php

    $koneksi = mysqli_connect("localhost", "root", "root", "informatik");

    if(!$koneksi){
        die("Koneksi Gagagl".mysqli_connect_error());
    }else{
        echo "Koneksi Berhasil !!!";
    }

    $result = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');

    $mhs = mysqli_fetch_row($result);

    var_dump($mhs[1]);
?>