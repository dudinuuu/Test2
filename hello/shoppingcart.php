<?php
session_start();
 ?>

  <!DOCTYPE html>
  <html lang="en">

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

  <style>
  h1{
    text-decoration: underline gray;
    padding-bottom: 5px;
  }

  table{
    border-collapse: collapse;
      width: 100%;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

  tr:hover {background-color:#f5f5f5;}

  .subtract-item, .add-item, .delete-item{
    color: white;
    background-color: gray;
    border: none;
    transition-duration: 0.4s;
  }

  .subtract-item:hover, .add-item:hover, .delete-item:hover{
    color: white;
    background-color: orange;
    border: none;
    border-radius: 30%;
  }

  .total-button{
    position: absolute;
    right: 100px;
  }

  .button{
    color: white;
    background-color: gray;
    padding: 5px;
  }

  .button:hover{
    color: white;
    background-color: orange;
    padding: 5px;
    text-decoration: none;
  }
  img {
  border-radius: 50%;
  -webkit-transition: -webkit-transform .8s ease-in-out;
          transition:         transform .8s ease-in-out;
}
img:hover {
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
}

  </style>


  <body>
    <h1>🛒Shopping cart🛒</h1>

    <div>
      <table id="show-cart">
        <!-- -->
      </table>
      <br>
      <div class="total-button">
        <font size="6">Total Cart: €<span id="total-cart"></span></font>
        <br>
        <a style="position:absolute; left:73%;" class="button" href="#">Checkout</a>
      </div>
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
        var output = "<tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>-</th><th>+</th><th>Delete</th></tr>";
        for(var i in cartArray){
          output += "<tr><td>"
          +"<img src='"+cartArray[i].image+"' alt='ahdem ostja' border='3' height='100' width='100'></img>"
          +"</td><td style='font-size: 20px;'>"+cartArray[i].name
          +"</td><td style='font-size: 20px;'>"+cartArray[i].quantity
          +"</td><td style='font-size: 20px;'>€"+cartArray[i].price
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
