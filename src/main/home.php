<?php
require 'conn.php';
if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM customer_data WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/css/style-home.css">
</head>

<body>
  <main>
    <header class="navbar">
      <section class="navbar-section">
        <h2>Logo</h2>
      </section>
      <section class="navbar-section navlinks">
        <p>Home</p>
        <p>Shop</p>
        <p>About</p>
      </section>
      <section class="navbar-section">
        <p> <?php echo $row['username']; ?> </p>
      </section>
    </header>
  </main>
</body>

</html>