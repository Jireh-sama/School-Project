<?php
require './config/conn.php';
require './functions/itemInventory.php';

if (!empty($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $result = mysqli_query($conn, "SELECT * FROM customer_data WHERE id = $id");
  $userData = mysqli_fetch_assoc($result);
} else {
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
  <link rel="stylesheet" href="../style/css/style-shop.css"/>
  <link rel="stylesheet" href="../style/css/reset.css"/>
  <link rel="stylesheet" href="../style/css/style-carousel.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>

<body>

  <!------MODAL SECTION---- -->
  <dialog id="buyItemModal">
    <section class="modal-container">
      <header>
        <button class="btn-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
      </header>
      <div class="modal-content">
        <div class="item-details">
          <h2 id="item-name"></h2>
          <p id="item-price"></p>
        </div>
        <div class="input-field">
          <button id="decrement" onclick="decrementQuantity()">-</button>
          <input class="item-quantity" type="number" placeholder="Quantity" required>
          <button id="increment" onclick="incrementQuantity()">+</button>
        </div>
      </div>
      <footer>
        <button class="btn-set-order" onclick="submitOrder(this.id)">SUBMIT!</button>
      </footer>
    </section>
  </dialog>
  <!------MODAL SECTION---- -->

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
    <!-- ----HEADER SECTION---- -->
    <!-- --------------CAROUSEL#1-------------- -->
    <section class="carousel-container">
      <div class="carousel-wrapper wrapper">
        <i id="btn-left" class="fa-solid fa-angle-left"></i>
        <ul class="main-carousel carousel">
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_adobo.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[0]) ?> </h2>
            <button id="<?= ($itemID[0]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_porkSisig.png" alt=""></div>
            <h2> <?php echo ($itemNames[1]) ?> </h2>
            <button id="<?= ($itemID[1]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_friedChicken.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[2]) ?> </h2>
            <button id="<?= ($itemID[2]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_porkSteak.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[3]) ?> </h2>
            <button id="<?= ($itemID[3]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_beefStew.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[4]) ?> </h2>
            <button id="<?= ($itemID[4]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_friedPorkAndEgg.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[5]) ?> </h2>
            <button id="<?= ($itemID[5]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
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
            <div class="img"><img src="../../assets/image/itemName_siomai.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[6]) ?> </h2>
            <button id="<?= ($itemID[6]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_rice.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[7]) ?> </h2>
            <button id="<?= ($itemID[7]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_dumpling.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[8]) ?> </h2>
            <button id="<?= ($itemID[8]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_friedEgg.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[9]) ?> </h2>
            <button id="<?= ($itemID[9]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_lumpia.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[10]) ?> </h2>
            <button id="<?= ($itemID[10]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_siopao.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[11]) ?> </h2>
            <button id="<?= ($itemID[11]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
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
            <div class="img"><img src="../../assets/image/itemName_coke.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[12]) ?> </h2>
            <button id="<?= ($itemID[12]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_mountainDew.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[13]) ?> </h2>
            <button id="<?= ($itemID[13]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_pepsi.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[14]) ?> </h2>
            <button id="<?= ($itemID[14]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_fanta.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[15]) ?> </h2>
            <button id="<?= ($itemID[15]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_sprite.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[16]) ?> </h2>
            <button id="<?= ($itemID[16]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
          <li class="card">
            <div class="img"><img src="../../assets/image/itemName_pocariSweat.png" alt=""></div>
            <h2> <?= htmlspecialchars($itemNames[17]) ?> </h2>
            <button id="<?= ($itemID[17]) ?>" class="btn-buy" onclick="setSelectedItem(this.id)">Buy Item</button>
          </li>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
    </section>

    <!------FOOTER SECTION------>
    <footer class="shop-footer">
      <button class="btn-send-order">
        <a href="./confirmOrder.php">SEND ORDER</a>
      </button>
    </footer>
    <!------FOOTER SECTION------>

  </main>

  <script type="module" src="../script/carousel-script.js"></script>
  <script src="../script/custom.js"></script>
</body>

</html>