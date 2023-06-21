function run(id) {
  const itemID = id;
  const myid = `id=${itemID}`;
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./functions/insertSelectedItemID.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    console.log(this.responseText);
  };
  xhr.send(myid);
  setTimeout(() => {
    window.location.href = "./buyItemPage.php";
  }, 500);
}

function submitOrder(id) {
  const quantity = parseInt(document.querySelector(".item-quantity").value);
  const itemID = id;
  const myid = `itemId=${itemID}&itemQuantity=${quantity}`;
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./functions/submitOrder.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    console.log(this.responseText);
  };
  if (quantity > 0) {
    xhr.send(myid);
    setTimeout(() => {
      window.location.href = "./shop.php";
    }, 500);
  } else {
    alert("Quantity Not Set");
  }
}

function confirmOrder() {
  window.location.href = "./confirmOrder.php";
}

function completeOrder() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./functions/completeOrder.php", "true");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    console.log(this.responseText);
  };
  xhr.send();
  alert("Order Succesfully");
  setTimeout(() => {
    window.location.href = "./shop.php";
  }, 500);
}

function incrementQuantity() {
  let num = document.querySelector(".item-quantity").value;
  num++;
  document.querySelector(".item-quantity").value = num;
}
function decrementQuantity() {
  let num = document.querySelector(".item-quantity").value;
  if (num <= 0) {
    alert('Quantitiy is Zero');
  } else {
    num--;
    document.querySelector(".item-quantity").value = num;
  }
}
