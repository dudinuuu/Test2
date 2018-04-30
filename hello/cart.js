
var cart = [];


var Item = function(id, name, price, quantity, image){
  this.id = id//unique ID is needed here for each item.
  this.name = name
  this.price = price
  this.quantity = quantity
  this.image = image
};

function addcart(id, name, price, quantity, image){
  for(var i in cart){
    if (cart[i].id == id){//checks for the same item to increment its quantity
      cart[i].quantity++;
      return;
    }
  }
  var item = new Item(id, name, price, quantity, image);
  cart.push(item);
}

function removeOneItem(id){ //'-' button in shoppingcart.php
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

function addOneItem(id){//'+' button in shoppingcart.php
  for(var i in cart){
    if(cart[i].id == id){
      cart[i].quantity++;
      break;
    }
  }
}

function deleteItem(id){// 'x' button in shoppingcart.php
  for(var i in cart){
    if(cart[i].id == id){
      cart.splice(i, 1);
      break;
    }
  }
}

function totalQuantityCart(){
  var total = 0;
  for(var i in cart){
    total = total + +cart[i].quantity;
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

function listCart(){
  var cartCopy = [];
  for (var i in cart){
    var item = cart[i];
    var itemCopy = {};
    for(var p in item){
      itemCopy[p] = item[p];
    }
    cartCopy.push(itemCopy);
  }
  return cartCopy;
}

function post(){
  $.post("cartSession.php", {postname:cart.slice()},
  function(data){
    $("#result").html(data);
  });
}
