<?php
session_start();
 ?>

  <!DOCTYPE html>
  <html lang="en">

    <style>
      table, th, td {
          border: 1px solid black;
      }
      .button {
        display: block;
        width: 115px;
        height: 25px;
        background: black;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        color: white;
        font-weight: bold;
      }
    </style>

  <body>
    <h1> Shopping cart</h1>

    <div>
      <table id="show-cart">
        <!-- -->
      </table>
      <div><font size="6">Total Cart: €<span id="total-cart"></span></font></div>
    </div>


    <a class="button" href="deletesession.php">Delete cart</a>

    <div id="result"></div>

<script src="js/jQuery.js"></script>
    <script src="cart.js"></script>
    <script>

      cart = <?php echo json_encode($_SESSION["cart"]); ?>;

      function displayCart(){
        var cartArray = listCart();
        var output = "<tr><th>Name</th><th>Quantity</th><th>Price</th><th>-</th><th>+</th><th>Delete</th></tr>";
        for(var i in cartArray){
          output += "<tr><td>"
          +cartArray[i].name
          +"</td><td>"+cartArray[i].quantity
          +"</td><td>€"+cartArray[i].price
          +"</td><td><button class='subtract-item' data-id='"+cartArray[i].id+"'>-</button>"
          +"</td><td><button class='add-item' data-id='"+cartArray[i].id+"'>+</button>"
          +"</td><td><button class='delete-item' data-id='"+cartArray[i].id+"'>X</button></td>"
          +"</tr>"
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
