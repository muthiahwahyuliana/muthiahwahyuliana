<?php
include ('koneksi.php');

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["username"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
  }
  else if($result == 0){
    echo "<script> alert('Wrong Password'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">Username: </label>
      <input type="text" name="username" required value=""> <br>
      <label for="">Password</label>
      <input type="password" name="password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
  </body>
</html>
