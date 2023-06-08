<?php
  require './config/conn.php';

  

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite Card Slider JavaScript | CodingNepal</title>
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
				<section class="nav-box user-box">
					<div class="user-name">
						<h3>User_Name</h2>
					</div>
					<div class="user-icon">
						<i class="fa-regular fa-user"></i>
					</div>
				</section>
			</header>

      <!-- --------------CAROUSEL#1-------------- -->
      <section class="carousel-container">
        <div class="carousel-wrapper wrapper">
          <i id="btn-left" class="fa-solid fa-angle-left"></i>
          <ul class="main-carousel carousel">
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Chicken Adobo</h2>
              <button id="btn-itemName-adobo">$20</button>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Fried Chicken</h2>
              <button id="btn-itemName-adobo">$10</button>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Beef Stew</h2>
              <button id="btn-itemName-adobo">$40</button>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Pork Steak</h2>
              <button id="btn-itemName-adobo">$20</button>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Ramen</h2>
              <button id="btn-itemName-adobo">$20</button>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_adobo.png" alt=""></div>
              <h2>Chicken Curry</h2>
              <button id="btn-itemName-adobo">$20</button>
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
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>Chicken Adobo</h2>
                <span>Sales Manager</span>
              </li>
              <li class="card">
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>Joenas Brauers</h2>
                <span>Web Developer</span>
              </li>
              <li class="card">
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>Lariach French</h2>
                <span>Online Teacher</span>
              </li>
              <li class="card">
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>James Khosravi</h2>
                <span>Freelancer</span>
              </li>
              <li class="card">
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>Kristina Zasiadko</h2>
                <span>Bank Manager</span>
              </li>
              <li class="card">
                <div class="img"><img src="../assets/image/itemName_rice.png" alt=""></div>
                <h2>Donald Horton</h2>
                <span>App Designer</span>
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
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>Chicken Adobo</h2>
              <span>Sales Manager</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>Joenas Brauers</h2>
              <span>Web Developer</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>Lariach French</h2>
              <span>Online Teacher</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>James Khosravi</h2>
              <span>Freelancer</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>Kristina Zasiadko</h2>
              <span>Bank Manager</span>
            </li>
            <li class="card">
              <div class="img"><img src="../assets/image/itemName_cola.png" alt=""></div>
              <h2>Donald Horton</h2>
              <span>App Designer</span>
            </li>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </section>
					
      <footer class="shop-footer">
        <button class="btn-send-order" ><p>SEND ORDER</p></button>
      </footer>

	  </main>

    <script type="module" src="../script/script1.js"></script>
    <script type="module" src="../script/script2.js"></script>
    <script type="module" src="../script/script3.js"></script>
  </body>
</html>