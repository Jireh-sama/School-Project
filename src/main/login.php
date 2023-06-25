<?php
require './config/conn.php';

if (empty($_SESSION['id'])) {

  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $result = mysqli_query($conn, "SELECT * FROM customer_data WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      if ($password == $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        header('location: shop.php');
      } else {
        // Write codes here for password not match
      }
    } else {
      echo "
                  <script></script>
              ";
    }
  }
}else {
  header("Location: shop.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/css/style-login-register.css">
  <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css" />
</head>

<body>
  <main class="login-register-main">
    <div class="form-container">
      <header class="login-register-header">
        <h1>Login</h1>
      </header>
      <form class="input-field" action="#" method="post">

        <section class="input-field-row">
          <label for="email">Email</label>
          <input class="form-control-main" id="email" type="text" placeholder="Enter Email" name="email">
        </section>

        <section class="input-field-row">
          <label for="password">Password</label>
          <input class="form-control-main" id="password" type="password" placeholder="Enter Password" name="password">
        </section>

        <input class="btn btn-primary" type="submit" value="Login" name="submit">
      </form>

      <footer>
        <p>Don't have an account Yet? <a href="register.php">Signup</a></p>
      </footer>

    </div>

  </main>
</body>

</html>