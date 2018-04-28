<?php
session_start();
print_r($_SESSION["cart"]);
 ?>

  <!DOCTYPE html>
  <html lang="en">

  <body>
    <h1> Shopping cart</h1>

    <div>
      <ul id="show-cart">
        <!-- -->
      </ul>
      <div  >Total Cart: €<span id="total-cart"></span></div>
    </div>

    <form>
      <input type="button" value="save cart" onclick="post();">
    </form>

    <a href="deletesession.php">Delete session array</a>

    <div id="result"></div>

<script src="js/jQuery.js"></script>
    <script src="cart.js"></script>
    <script>

      cart = <?php echo json_encode($_SESSION["cart"]); ?>;
      console.log(totalCostCart());

      console.log(listCart());

      console.log(cart);

      function displayCart(){
        var cartArray = listCart();
        var output = "";
        for(var i in cartArray){
          output += "<li>"
          +cartArray[i].id
          +" "+cartArray[i].name
          +" "+cartArray[i].quantity
          +" €"+cartArray[i].price
          +" <button class='subtract-item' data-id='"+cartArray[i].id+"'>-</button>"
          +" <button class='add-item' data-id='"+cartArray[i].id+"'>+</button>"
          +" <button class='delete-item' data-id='"+cartArray[i].id+"'>X</button>"
          +"</li>"
        }
        $("#show-cart").html(output);
        $("#total-cart").html(totalCostCart().toFixed(2));
      }

      displayCart();

      $("#show-cart").on("click", ".delete-item", function(event){
        var ide = $(this).attr("data-id");
        deleteItem(ide);
        displayCart();
        post();
      });
      $("#show-cart").on("click", ".subtract-item", function(event){
        var ide = $(this).attr("data-id");
        removeOneItem(ide);
        displayCart();
        post();
      });
      $("#show-cart").on("click", ".add-item", function(event){
        var ide = $(this).attr("data-id");
        addOneItem(ide);
        displayCart();
        post();
      });


    </script>



</html>
