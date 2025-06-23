<?php

    $koneksi = mysqli_connect("localhost", "root", "root", "informatik");

    if(!$koneksi){
        die("Koneksi Gagagl".mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        var_dump($_POST);
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $foto = date('DMY_Hm') . $_FILES['foto']['name'];
        $tmpFoto = $_FILES['foto']['tmp_name'];

        $folder= 'images/';
        $path = $folder . $foto;

        if(move_uploaded_file($tmpFoto, $path)){
            $query = "INSERT INTO mahasiswa (nama, foto, nim, jurusan, alamat) VALUES ('$nama', '$foto', '$nim', '$jurusan', '$alamat')";
            
            mysqli_query($koneksi, $query);

            if(mysqli_affected_rows($koneksi) > 0){
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                echo "<script>location.href='data-mahasiswa.php';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload foto');</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <h3>Tambah Mahasiswa</h3>
    <form 
      style="display: flex; flex-direction:column; gap: 1px; max-width: 30vw" 
      action="" 
      method="post" 
      enctype="multipart/form-data"
    >
      <label for="nama">Nama:</label>
      <input type="text" name="nama" id="nama" required />
      <br />
      <label for="foto">Foto:</label>
      <input type="file" name="foto" id="foto" required />
      <br />
      <label for="nim">NIM:</label>
      <input type="text" name="nim" id="nim" required />
      <br />
      <label for="jurusan">Jurusan:</label>
      <input type="text" name="jurusan" id="jurusan" required />
      <br />
      <label for="alamat">Alamat:</label>
      <textarea name="alamat" id="alamat" required></textarea>
      <br />
      <button type="submit" name='submit'>Tambah Mahasiswa</button>
  </body>
</html>