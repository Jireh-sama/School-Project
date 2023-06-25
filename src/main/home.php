<?php
  require './config/conn.php';
  if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM customer_data WHERE id = $id");
    $userData = mysqli_fetch_assoc($result);
  } else {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/css/style-home.css">
  <link rel="stylesheet" href="../style/css/reset.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css" />
</head>

<body>
  <main class="shop-content-main">
    <!------HEADER SECTION------>
    <header class="navbar">
      <section class="nav-box">
        <h2>LOGO HERE</h2>
      </section>
      <section class="nav-box">
        <ul class="nav-links">
          <li><a href="./home.php">Home</a></li>
          <li><a href="./shop.php">Shop</a></li>
          <li><a href="">About</a></li>
        </ul>
      </section>
      <menu class="menu">
        <h2 class="user-name"><?= htmlspecialchars($userData['username']) ?></h3>
          <button class="user-btn"><i class="fa-regular fa-user"></i></button>
          <div class="menu-content">
            <a href="#">Profile</a>
            <a href="./config/logout.php">Logout</a>
          </div>
      </menu>
    </header>


    <article class="welcome-text">
      Welcome To Kuya'J where you can Shop to your Hearts Content
    </article>
    <!------HEADER SECTION------>

  </main>
</body>

</html>