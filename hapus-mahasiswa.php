<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
      header("Location: login.php");
      exit;
    }


require 'function.php';

$id = $_GET["id"];

if(hapusDataMahasiswa($id) > 0){
                echo "<script>alert('Data berhasil dihapus');</script>";
                echo "<script>location.href='data-mahasiswa.php';</script>";
            } else {
                echo "<script>alert('Data gagal dihapus');</script>";
            }

?>