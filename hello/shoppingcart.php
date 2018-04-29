<?php
session_start();
 ?>

  <!DOCTYPE html>
  <html lang="en">

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

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

      <link href="css/MyCss.css" rel="stylesheet">
      <link href="css/modern-business.css" rel="stylesheet">
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <body>
    <h1> Shopping cart</h1>

    <div>
      <table class="table" id="show-cart">
        <!-- -->
      </table>
      <div><font size="6">Total Cart: €<span id="total-cart"></span></font></div>
    </div>


    <a class="button" href="deletesession.php">Delete cart</a>
    <a class="button" href="index.html">Continue shopping</a>
    <div id="result"></div>

<script src="js/jQuery.js"></script>
    <script src="cart.js"></script>
    <script>

      cart = <?php echo json_encode($_SESSION["cart"]); ?>;

      function displayCart(){
        var cartArray = listCart();
        var output = "<tr><th class='text-center'>Image</th><th class='text-center'>Name</th><th class='text-center'>Quantity</th><th class='text-center'>Price</th><th>-</th><th>+</th><th>Delete</th></tr>";
        for(var i in cartArray){
          output += "<tr><td>"
          +"<img class='img-fluid' src='"+cartArray[i].image+"'></image>"
          +"</td><td>"+cartArray[i].name
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
