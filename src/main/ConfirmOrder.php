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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/css/style-confirm-order.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <main>
    <header>
      <h1>Order List</h1>
    </header>
    <table id="table">
      <tr class="table-heading">
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Amount</th>
      </tr>
      <tr class="table-data">
        <?php if (!empty($orderItemId[0]) && !empty($orderItemQuantity[0])) : ?>
          <td>
            <?php echo $orderItemName[0] ?>&nbsp;&nbsp;<i class="fa-solid fa-trash" id="<?= ($orderItemName[0])?>" onclick="deleteOrder(this.id)"></i>
          </td>
          <td class="item-quantity first-row" id="<?= ($orderItemId[0]) ?>">
            <?php echo $orderItemQuantity[0] ?>
          </td>
          <td>
            <?php echo ($orderItemTotal[0] / $orderItemQuantity[0]) ?>
          </td>
          <td>
            <?php echo $orderItemTotal[0] ?>
          </td>
        <?php else : ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        <?php endif; ?>
      </tr>
      <tr class="table-data">
        <?php if (!empty($orderItemId[1]) && !empty($orderItemQuantity[1])) : ?>
          <td>
            <?php echo $orderItemName[1] ?>&nbsp;&nbsp;<i class="fa-solid fa-trash" id="<?= ($orderItemName[1])?>" onclick="deleteOrder(this.id)"></i>
          </td>
          <td class="item-quantity" id="<?= ($orderItemId[1]) ?>">
            <?php echo $orderItemQuantity[1] ?>
          </td>
          <td>
            <?php echo ($orderItemTotal[1] / $orderItemQuantity[1]) ?>
          </td>
          <td>
            <?php echo $orderItemTotal[1] ?>
          </td>
        <?php else : ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        <?php endif; ?>
      </tr>
      <tr class="table-data">
        <?php if (!empty($orderItemId[2]) && !empty($orderItemQuantity[2])) : ?>
          <td>
            <?php echo $orderItemName[2] ?>&nbsp;&nbsp;<i class="fa-solid fa-trash" id="<?= ($orderItemName[2])?>" onclick="deleteOrder(this.id)"></i>
          </td>
          <td class="item-quantity" id="<?= ($orderItemId[2]) ?>">
            <?php echo $orderItemQuantity[2] ?>
          </td>
          <td>
            <?php echo ($orderItemTotal[2] / $orderItemQuantity[2]) ?>
          </td>
          <td>
            <?php echo $orderItemTotal[2] ?>
          </td>
        <?php else : ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        <?php endif; ?>
      </tr>
      <tr class="table-data">
        <?php if (!empty($orderItemId[3]) && !empty($orderItemQuantity[3])) : ?>
          <td>
            <?php echo $orderItemName[3] ?>&nbsp;&nbsp;<i class="fa-solid fa-trash" id="<?= ($orderItemName[3])?>" onclick="deleteOrder(this.id)"></i>
          </td>
          <td class="item-quantity" id="<?= ($orderItemId[3]) ?>">
            <?php echo $orderItemQuantity[3] ?>
          </td>
          <td>
            <?php echo ($orderItemTotal[3] / $orderItemQuantity[3]) ?>
          </td>
          <td>
            <?php echo $orderItemTotal[3] ?>
          </td>
        <?php else : ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        <?php endif; ?>
      </tr>
      <tr class="table-data">
        <?php if (!empty($orderItemId[4]) && !empty($orderItemQuantity[4])) : ?>
          <td>
            <?php echo $orderItemName[4] ?>&nbsp;&nbsp;<i class="fa-solid fa-trash" id="<?= ($orderItemName[4])?>" onclick="deleteOrder(this.id)"></i>
          </td>
          <td class="item-quantity" id="<?= ($orderItemId[4]) ?>">
            <?php echo $orderItemQuantity[4] ?>
          </td>
          <td>
            <?php echo ($orderItemTotal[4] / $orderItemQuantity[4]) ?>
          </td>
          <td>
            <?php echo $orderItemTotal[4] ?>
          </td>
        <?php else : ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        <?php endif; ?>
      </tr>
    </table>
    <section class="footer">
      <div class="footer-wrap">
        <p class="total-amount">Total Amount: <span class="total-amount-value"><?= htmlspecialchars($totalSum) ?></span></p>
        <button id="btn" name="confirmOrder" onclick="completeOrder()"><span class="confirm-txt">Confirm Order</span></button>
      </div>
    </section>
  </main>
  <script src="../script/custom.js"></script>
</body>

</html>