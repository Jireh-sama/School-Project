function run(id){
    const itemID = id;
    const myid = `id=${itemID}`;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './config/insertItemID.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        console.log(this.responseText);
    }
    xhr.send(myid);
    setTimeout(()=>{
        window.location.href = "./buyItemPage.php";
    }, 500);
}   


function submitOrder(id){
    const quantity =  parseInt(document.querySelector('.item-quantity').value);
    const itemID = id;
    const myid = `id=${itemID}&quantity=${quantity}`;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './config/submitOrder.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        console.log(this.responseText);
    }
    if(quantity > 0){
        xhr.send(myid);
        setTimeout(()=> {
            window.location.href = "./shop.php";
        }, 1000);
    }else {
        alert('Quantity Not Set');
    }
    
}


