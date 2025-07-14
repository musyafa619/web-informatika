<?php
    session_start();
  
    require 'function.php';

    if(isset($_SESSION['user_id'])){
      header("Location: data-mahasiswa.php");
      exit;
    }

    if(isset($_POST['login'])){
       $message = login($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
   <div class="p-4">
    <h1>Login</h1>
    <form action="" method="post" enctype="multipart/form-data" >
      <label  class="form-label">Username</label><br />
      <input class="form-control" type="text" name="username" placeholder="Email" /><br />
      <label  class="form-label">Password</label><br />
      <input class="form-control" type="password" name="password" placeholder="password" /><br />
      <input  type="checkbox" />
      <label  class="form-label">Ingatkan Saya</label>
      <br />
       <?php if (!empty($message)) : ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
      <?php endif; ?>
      <button class="btn btn-primary" type="submit" name='login'>Login</button>
      <p>Belum punya akun? <a href="./register.html">daftar</a></p>
    </form>
    </div>
  </body>
</html>
