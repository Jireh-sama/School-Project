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
  let myPromise = new Promise(function (myResolve, myReject) {
    // "Producing Code" (May take some time)
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "./functions/getSelectedItem.php", true);
    xmlhttp.onload = function () {
      if (this.status == 200) {
        const stringFromPhp = this.responseText;
        const splittedString = stringFromPhp.split(",");
        const btnID = document.querySelector(".btn-set-order").id = splittedString[0];
        const itemName = document.getElementById("item-name").innerHTML = splittedString[1];
        const itemPrice = document.getElementById("item-price").innerHTML = splittedString[2] + " Php";
        const stock = document.getElementById("stock").innerHTML = splittedString[3];
        console.log(this.responseText);
        if(this.responseText){
          myResolve(); // when successful
        }else {
          myReject(); // when error
        }
      } else {
        alert("Something went wrong in setting the Modal");
      }
    };
    xmlhttp.send();
    
  });
  // "Consuming Code" (Must wait for a fulfilled Promise)
  myPromise.then(
    function (value) {
      modal.showModal();
      console.log('Promise is Resolved');
    },
    function (error) {
      console.error('Error Promise not Resolved');
    }
  );
}

function closeModal() {
  modal.close();
  // Clear quantity value on close
  document.querySelector(".item-quantity").value = "";
}
function submitOrder(id) {
  const stock = parseInt(document.getElementById("stock").innerHTML);
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
    // Check number of order since 5 is the max
    let numOrder = 0;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "./functions/getNumOrder.php", true);
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        numOrder = parseInt(this.responseText);
        if (numOrder >= 5) {
          alert("Currently The Maximum Order Limit is 5");
        } else {
          xhr.send(myid);
          setTimeout(() => {
            modal.close();
            // Clear Quantity Value on submit
            document.querySelector(".item-quantity").value = "";
          }, 300);
        }
      }
    };
    if (quantity > stock) {
      alert('Cannot Exceed the Stock of the Item');
    }else {
      xmlhttp.send();
    }
  } else {
    alert("Quantity Not Set");
  }
}

function completeOrder() {
  const qty = document.querySelectorAll('.item-quantity');

  let sub_itemQuantity = "itemQuantity="; 
  let sub_itemId = "itemId="; 

  // get all quantities
  qty.forEach(element => {
    sub_itemQuantity += element.innerText + ",";
  });
  qty.forEach(element => {
    sub_itemId += element.id + ",";
  });

  const itemQuantity = sub_itemQuantity.slice(0, -1);
  const itemId = sub_itemId.slice(0, -1);
 
  if (qty.length > 0){
    const expression = `${itemQuantity}&${itemId}`;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./functions/completeOrder.php", "true");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      console.log(this.responseText);
    };
    xhr.send(expression);
    alert("Order Succesfully");
    setTimeout(() => {
      window.location.href = "./shop.php";
    }, 500);
  }else {
    console.log('Qty not found');
  }
}

function incrementQuantity() {
  const stock = parseInt(document.getElementById("stock").innerHTML);
  let num = document.querySelector(".item-quantity").value;
  if(num >= stock){
    alert('nope');
  }else {
    num++;
    document.querySelector(".item-quantity").value = num;
  }
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
