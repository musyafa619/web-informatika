<?php

    require 'function.php';

    if(isset($_POST['submit'])){
       $message = register($_POST);
    }

    echo "
    <script>
    alert('" . addslashes($message) . "');
    </script>
    "

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<div class="p-4">
  <h2 class='mb-4'>Form Registrasi</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <label class="form-label"  for="username">Username:</label><br>
    <input required class="form-control" type="text" name="username" id="username" required><br><br>

    <label class="form-label" for="password">Password:</label><br>
    <input required class="form-control" type="password" name="password" id="password" required><br><br>

    <label class="form-label" for="confirmPassword">Konfirmasi Password:</label><br>
    <input required class="form-control" type="password" name="confirmPassword" id="confirmPassword" required><br><br>

    <input class="btn btn-primary" type="submit" value="Daftar">
  </form>
</div>
</body>
</html>
