<?php

   require 'function.php';

    $query = "SELECT * FROM mahasiswa";
    $rows = tampilData($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <table border="1" cellspacing="0" cellpadding="10px">
      <tr>
        <td>No</td>
        <td>Nama</td>
           <td>Foto</td>
        <td>NIM</td>
        <td>Jurusan</td>
        <td>Alamat</td>
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
      </tr>
      <?php } ?>
    </table>
  </body>
</html>