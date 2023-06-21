<?php
  require './config/conn.php';
  require './functions/itemInventory.php';

  if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM customer_data WHERE id = $id");
    $userData = mysqli_fetch_assoc($result);
  }
  else {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../style/css/style-shop.css">
    <link rel="stylesheet" href="../style/css/reset.css">
    <link rel="stylesheet" href="../style/css/style-carousel.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css" />
  </head>
  <body>

    <main class="shop-content-main">

			<header class="navbar">

				<section class="nav-box">
					<h2>LOGO HERE</h2>
				</section>

				<section class="nav-box">
					<ul class="nav-links">
						<li><a href="">Home</a></li>
						<li><a href="">Shop</a></li>
						<li><a href="">About</a></li>
					</ul>
				</section>

        <menu class="menu">
          <h4 class="user-name"><?= htmlspecialchars($userData['username']) ?></h3>
          <button class="user-btn" ><i class="fa-regular fa-user"></i></button>
          <div class="menu-content">
            <a href="#">Profile</a>
            <a href="./config/logout.php">Logout</a>
          </div>
        </menu>
			</header>

      <!-- --------------CAROUSEL#1-------------- -->
      <section class="carousel-container">
        <div class="carousel-wrapper wrapper">
          <i id="btn-left" class="fa-solid fa-angle-left"></i>
          <ul class="main-carousel carousel">
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_adobo.png" alt=""></div>
              <h2> <?= htmlspecialchars($itemNames[0]) ?> </h2>        
              <button id="<?= ($itemID[0])?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_porkSisig.png" alt=""></div>
              <h2> <?php echo($itemNames[1]) ?> </h2>
              <button id="<?= ($itemID[1]) ?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_friedChicken.png" alt=""></div>
              <h2> <?=htmlspecialchars($itemNames[2]) ?> </h2>
              <button id="<?= ($itemID[2]) ?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_porkSteak.png" alt=""></div>
              <h2> <?=htmlspecialchars($itemNames[3]) ?> </h2>
              <button id="<?= ($itemID[3]) ?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_beefStew.png" alt=""></div>
              <h2> <?=htmlspecialchars($itemNames[4]) ?> </h2>
              <button id="<?= ($itemID[4]) ?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_lumpia.png" alt=""></div>
              <h2> <?=htmlspecialchars($itemNames[5]) ?> </h2>
              <button id="<?= ($itemID[5]) ?>" class="btn-buy" onclick="run(this.id)">Buy Item</button>
            </li>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </section>

      <!-- --------------CAROUSEL#2-------------- -->
      <section class="carousel-container">
          <div class="carousel-wrapper-two wrapper">
            <i id="btn-left" class="fa-solid fa-angle-left"></i>
            <ul class="main-carousel-two carousel">
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
              <li class="card">
                <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
                <h2>RICE </h2>
                <span>RICE </span>
              </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
          </div>
      </section>

      <!-- --------------CAROUSEL#3-------------- -->
      <section class="carousel-container">
        <div class="carousel-wrapper-three wrapper">
          <i id="btn-left" class="fa-solid fa-angle-left"></i>
          <ul class="main-carousel-three carousel">
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>Chicken Adobo</h2>
              <span>Sales Manager</span>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>Joenas Brauers</h2>
              <span>Web Developer</span>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>Lariach French</h2>
              <span>Online Teacher</span>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>James Khosravi</h2>
              <span>Freelancer</span>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>Kristina Zasiadko</h2>
              <span>Bank Manager</span>
            </li>
            <li class="card">
              <div class="img"><img src="../../assets/image/itemName_cola.png" alt=""></div>
              <h2>Donald Horton</h2>
              <span>App Designer</span>
            </li> 
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </section>
					
      <footer class="shop-footer">
        <button class="btn-send-order" onclick="confirmOrder()"><p>SEND ORDER</p></button>
      </footer>

	  </main>
    <script type="module" src="../script/script1.js"></script>
    <script type="module" src="../script/script2.js"></script>
    <script type="module" src="../script/script3.js"></script>
    <script src="../script/custom.js"></script>
  </body>
</html>