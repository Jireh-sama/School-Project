<?php
require './config/conn.php';
require './functions/getOrderList.php';

if (!empty($_SESSION['id'])) {
  $totalSum = 0;
  foreach ($orderItemTotal as $total) {
    $totalSum += $total;
  }
} else {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm Order</title>
  <link rel="stylesheet" href="../style/css/reset.css">
  <link rel="stylesheet" href="../style/css/style-confirm-order.css">
  <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css" />
</head>
<body>

  <main>
    <section class="table-container">
      <header>
        <h1>ORDER LIST</h1>
      </header>
      
      <table id="table">
        <tr>
          <th>Name</th>
          <th>Quantity</th>
        </tr>
        <!-- ----------Column #1---------- -->
        <?php if (!empty($orderItemId[0]) && !empty($orderItemQuantity[0])) : ?>
          <tr>
            <td>
              <?php echo $orderItemName[0] ?>
            </td>
            <td>
              <?php echo $orderItemQuantity[0] ?>
            </td>
          </tr>
        <?php else : ?>
          <!-- Code for False -->
        <?php endif; ?>
        <!-- ----------Column #1---------- -->
        <!-- ----------Column #2---------- -->
        <?php if (!empty($orderItemId[1]) && !empty($orderItemQuantity[1])) : ?>
          <tr>
            <td>
              <?php echo $orderItemName[1] ?>
            </td>
            <td>
              <?php echo $orderItemQuantity[1] ?>
            </td>
          </tr>
        <?php else : ?>
          <!-- Code for False -->
        <?php endif; ?>
        <!-- ----------Column #2---------- -->
        <!-- ----------Column #3---------- -->
        <?php if (!empty($orderItemId[2]) && !empty($orderItemQuantity[2])) : ?>
          <tr>
            <td>
              <?php echo $orderItemName[2] ?>
            </td>
            <td>
              <?php echo $orderItemQuantity[2] ?>
            </td>
          </tr>
        <?php else : ?>
          <!-- Code for False -->
        <?php endif; ?>
        <!-- ----------Column #3---------- -->
        <!-- ----------Column #4---------- -->
        <?php if (!empty($orderItemId[3]) && !empty($orderItemQuantity[3])) : ?>
          <tr>
            <td>
              <?php echo $orderItemName[3] ?>
            </td>
            <td>
              <?php echo $orderItemQuantity[3] ?>
            </td>
          </tr>
        <?php else : ?>
          <!-- Code for False -->
        <?php endif; ?>
        <!-- ----------Column #4---------- -->
        <!-- ----------Column #5---------- -->
        <?php if (!empty($orderItemId[4]) && !empty($orderItemQuantity[4])) : ?>
          <tr>
            <td>
              <?php echo $orderItemName[4] ?>
            </td>
            <td>
              <?php echo $orderItemQuantity[4] ?>
            </td>
          </tr>
        <?php else : ?>
          <!-- Code for False -->
        <?php endif; ?>
        <!-- ----------Column #5---------- -->
      </table>
      <footer>
        <h1 class="total-value">
          Total is: <?= htmlspecialchars($totalSum)?>
        </h1>
        <button id="btn" name="confirmOrder" onclick="completeOrder()">Confirm <i class="fa-regular fa-paper-plane-top"></i> </button>
      </footer>
    </section>
  </main>
  <script src="../script/custom.js"></script>
</body>
</html>