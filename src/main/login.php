<?php
require './config/conn.php';
if (empty($_SESSION['id'])) {
  if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $userQuery = "SELECT * FROM customer_data WHERE email = '$email'";
    $getUser = mysqli_query($conn, $userQuery);
    $row = mysqli_fetch_assoc($getUser);
    if (mysqli_num_rows($getUser) > 0) {
      if ($password == $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        header('location: shop.php');
      } else {
        echo "
          <script>alert('Incorrect Email or Password');</script>
        ";
      }
    } else {
      echo "
        <script>alert('No user found');</script>
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
  <link rel="stylesheet" href="../style/css/style-login-register.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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