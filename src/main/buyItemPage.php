<?php
require './config/conn.php';

if (!empty($_SESSION['id'])) {

	$getSelectedItem = mysqli_query($conn, 'SELECT * FROM sitemid');
	$selectedItem = mysqli_fetch_assoc($getSelectedItem);
	$itemID = $selectedItem['selectedItemID'];

	$myquery = mysqli_query($conn, "SELECT * FROM item_inventory WHERE id=$itemID");
	$myitem = mysqli_fetch_assoc($myquery);

} else {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1><?php echo $myitem['name']?></h1>
	<button>+</button>
	<input class="item-quantity" type="number" placeholder="Quantity" required>
	<button>+</button><br>
	<button id="<?php echo $myitem['id']?>" onclick="submitOrder(this.id)">SUBMIT!</button>
	<script src="../script/custom.js"></script>
</body>

</html>