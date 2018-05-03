
var cart = [];


var Item = function(id, name, price, quantity, image, stock){
  this.id = id//unique ID is needed here for each item.
  this.name = name
  this.price = price
  this.quantity = quantity
  this.image = image
  this.stock = stock
};

function addcart(id, name, price, quantity, image, stock){
  for(var i in cart){
    if (cart[i].id == id){//checks for the same item to increment its quantity
      cart[i].quantity++;
      return;
    }
  }
  var item = new Item(id, name, price, quantity, image, stock);
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

function post(){
  $.post("cartSession.php", {postname:cart.slice()},
  function(data){
    $("#result").html(data);
  });
}

function postTotal(total){
  $.post("totalCostSession.php", {posttotal:total},
  function(data){
    $("#result").html(data);
  });
}
