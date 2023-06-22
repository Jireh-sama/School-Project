<?php
// require './config/conn.php';

// if (!empty($_SESSION['id'])) {
  $getSelectedItem = mysqli_query($conn, 'SELECT * FROM selected_item_id');
  $selectedItem = mysqli_fetch_assoc($getSelectedItem);
  $myitemID = $selectedItem['selectedItemID'];
  $myquery = mysqli_query($conn, "SELECT * FROM item_inventory WHERE id=$myitemID");
  $myitem = mysqli_fetch_assoc($myquery);
// } else {
  // header('Location: login.php');
// }
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Item</title>
  <link rel="stylesheet" href="../style/css/style-buy-item-page.css">
  <link rel="stylesheet" href="../style/css/reset.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css" />
</head>

<body>
  <main>
    <section class="buy-item-container">
      <div class="item-details">
        <h2><?= htmlspecialchars($myitem['name'])?></h2>
        <p><?=htmlspecialchars($myitem['price'])." ₱"?></p>
      </div>
      <div class="input-field">
        <button id="decrement" onclick="decrementQuantity()">-</button>
        <input class="item-quantity" type="number" placeholder="Quantity" required>
        <button id="increment" onclick="incrementQuantity()">+</button>
      </div>
      <button class="btn" id="<?php echo $myitem['id'] ?>" onclick="submitOrder(this.id)">SUBMIT!</button>
      <script src="../script/custom.js"></script>
    </section>
  </main>
</body>
</html> -->