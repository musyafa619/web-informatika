<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
      header("Location: login.php");
      exit;
    }


 require 'function.php';

  $id = $_GET["id"];

  $query = "SELECT * FROM mahasiswa WHERE id = $id";
  $mhs = tampilDataMahasiswa($query)[0];

    if(isset($_POST['submit'])){
        if(editDataMahasiswa($id, $_POST) > 0){
                echo "<script>alert('Data berhasil diedit');</script>";
                echo "<script>location.href='data-mahasiswa.php';</script>";
            } else {
                echo "<script>alert('Data gagal diedit');</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
   <div class="p-4">
     <h3>Edit Mahasiswa</h3>
    <form 
      style="display: flex; flex-direction:column; gap: 1px; max-width: 30vw" 
      action="" 
      method="post" 
      enctype="multipart/form-data"
    >
      <label class="form-label" for="nama">Nama:</label>
      <input type="text" class="form-control" name="nama" id="nama" required value="<?php echo $mhs["nama"] ?>"/>
      <br />
      <label class="form-label" for="foto">Foto:</label>
      <input type="file" class="form-control" name="foto" id="foto" required value="<?php echo $mhs["foto"] ?>"/>
      <br />
      <label class="form-label" for="nim">NIM:</label>
      <input type="text" class="form-control" name="nim" id="nim" required value="<?php echo $mhs["nim"] ?>"/>
      <br />
      <label class="form-label" for="jurusan">Jurusan:</label>
      <input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?php echo $mhs["jurusan"] ?>" />
      <br />
      <label class="form-label" for="alamat">Alamat:</label>
      <textarea name="alamat" class="form-control" id="alamat" required value="<?php echo $mhs["alamat"] ?>"></textarea>
      <br />
      <button class="btn btn-primary" type="submit" name='submit'>Edit Mahasiswa</button>
   </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>