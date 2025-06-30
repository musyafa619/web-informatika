<?php

   require 'function.php';

    $query = "SELECT * FROM mahasiswa";
    $rows = tampilDataMahasiswa($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <h3>Data Mahasiswa</h3>
    <a href="tambah-mahasiswa.php">
      <button style="cursor:pointer" type="button">Tambah Data Mahasiswa</button>
    </a>
    <table style="margin-top: 20px;" border="1" cellspacing="0" cellpadding="10px">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      <?php foreach($rows as $mhs){ ?>
      <tr>
        <td><?php echo $mhs["id"] ?></td>
        <td><?php echo $mhs["nama"] ?></td>
        <td>
            <img src="images/<?php echo $mhs["foto"] ?>" alt="<?php echo $mhs["nama"] ?>" width="50px" height="50px">
        </td>
        <td><?php echo $mhs["nim"] ?></td>
        <td><?php echo $mhs["jurusan"] ?></td>
        <td><?php echo $mhs["alamat"] ?></td>
        <td>
        <a href="edit-mahasiswa.php?id=<?php echo $mhs["id"] ?>">
          <button>
        Edit
      </button>
        </a>
         <a href="hapus-mahasiswa.php?id=<?php echo $mhs["id"] ?>" onclick="return confirm('Affa iyh?')">
          <button>
        Hapus
      </button>
      </a>
      </td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>