<?php
require './config/conn.php';
if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $phonenumber = $_POST['phonenumber'];

  // Check for duplicates

  $duplicate = mysqli_query($conn, "SELECT * FROM customer_data WHERE username = '$username' OR email = '$email'");

  if (mysqli_num_rows($duplicate) == 0) {
    if ($password == $confirm_password) {
      $query = "INSERT INTO customer_data VALUES('', '$firstname', '$lastname', '$address', '$email', '$username', '$phonenumber' , '$password')";
      mysqli_query($conn, $query);
      header('location: login.php');
    } else {
      // Write codes here for password not match
      echo "
                    <script>alert('Password Does Not Match')</script>
                ";
    }
  } else {
    echo "
                <script>alert('User Already Registered')</script>
            ";
  }
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
        <h1>Register</h1>
      </header>
      <form class="input-field" action="#" method="post">

        <section class="input-field-section">
          <div class="input-field-box">
            <label for="firstName">First Name</label>
            <input class="form-control-main" id="firstName" type="text" placeholder="Enter First Name" name="firstname" required>
          </div>

          <div class="input-field-box">
            <label for="lastName">Last Name</label>
            <input class="form-control-main" id="lastName" type="text" placeholder="Enter Last Name" name="lastname" required>

          </div>
        </section>
        <section class="input-field-row">
          <label for="address">Address</label>
          <input class="form-control-main" id="address" type="text" placeholder="Enter Address" name="address" required>
        </section>

        <section class="input-field-section">
          <div class="input-field-box">
            <label for="email">Email</label>
            <input class="form-control-main" id="email" type="text" placeholder="Enter Email" name="email" required>
          </div>

          <div class="input-field-box">
            <label for="username">Username</label>
            <input class="form-control-main" id="username" type="text" placeholder="Enter Username" name="username" required>
          </div>
        </section>
        <section class="input-field-section">

          <div class="input-field-box">
            <label for="password">Password</label>
            <input class="form-control-main" id="password" type="password" placeholder="Enter Password" name="password" required>
          </div>

          <div class="input-field-box">
            <label for="confirm-password">Confirm Password</label>
            <input class="form-control-main" id="confirm-password" type="password" placeholder="Confirm Password" name="confirm_password" required>
          </div>
        </section>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-phone" style="color: #5692fb;"></i></span>
          <input type="text" class="form-control" placeholder="Phone Number" aria-label="Username" aria-describedby="addon-wrapping" name="phonenumber" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Register" name="submit">
      </form>
      <footer>
        <p>Already have an Account? <a href="login.php">Signin</a></p>
      </footer>
    </div>
  </main>
  <script src="script.js"></script>
</body>

</html>