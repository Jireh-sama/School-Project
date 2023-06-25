const modal = document.getElementById("buyItemModal"); // Global variable of Modal

function setSelectedItem(id) {
  //Send Item ID
  const itemID = id;
  const myid = `id=${itemID}`;
  console.log(itemID);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./functions/insertSelectedItemID.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    console.log(this.responseText);
  };
  xhr.send(myid);

  //Get Item Info
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const stringFromPhp = this.responseText;
      const splittedString = stringFromPhp.split(",");
      document.querySelector(".btn-set-order").id = splittedString[0];
      document.getElementById("item-name").innerHTML = splittedString[1];
      document.getElementById("item-price").innerHTML = splittedString[2] + " Php";
    }
  };
  xmlhttp.open("GET", "./buyItemPage.php", true);
  xmlhttp.send();

  
  setTimeout(() => {
    modal.showModal(); // OPEN MODAL
  }, 500);
}
function closeModal() {
  modal.close();
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
      modal.close();
    }, 500);
  } else {
    alert("Quantity Not Set");
  }
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
    alert("Quantitiy is Zero");
  } else {
    num--;
    document.querySelector(".item-quantity").value = num;
  }
}
