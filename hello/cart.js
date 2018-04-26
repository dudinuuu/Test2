
var cart = [];


var Item = function(id, name, price, quantity){
  this.id = id//unique ID is needed here for each item.
  this.name = name
  this.price = price
  this.quantity = quantity
};

function addcart(id, name, price, quantity){
  for(var i in cart){
    if (cart[i].id == id){//checks for the same item to increment its quantity
      cart[i].quantity += quantity;
      return;
    }
  }
  var item = new Item(id, name, price, quantity);
  cart.push(item);
}

function removeOneItem(id){
  for(var i in cart){
    if(cart[i].id == id){
      cart[i].quantity--;
      if(cart[i].quantity == 0){
        cart.splice(i, 1);
      }
      break;
    }
  }
}

function addOneItem(id){
  for(var i in cart){
    if(cart[i].id == id){
      cart[i].quantity++;
      break;
    }
  }
}

function printcart(){
  console.log(cart);
}

function deleteItem(id){
  for(var i in cart){
    if(cart[i].id == id){
      cart.splice(i, 1);
      break;
    }
  }
}

function clearCart(){
  cart = []; // call this function to delete the cart when the session gets deleted aswell
}

function totalQuantityCart(){
  var total = 0;
  for(var i in cart){
    total += cart[i].quantity;
  }
  return total;
}

function totalCostCart(){
  var total = 0;
  for(var i in cart){
    total += ((cart[i].price)*(cart[i].quantity));
  }
  return total;
}




function post(){
  $.post("cartSession.php", {postname:cart.slice()},
  function(data){
    $("#result").html(data);

  });
}
