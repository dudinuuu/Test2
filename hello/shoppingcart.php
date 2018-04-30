<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Royal Sport - Find what you need</title>
    <!-- favicon added to the tab-->
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/shoppingcartcss.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/MyCss.css">


    <!-- navigation bar loader -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $(function(){
      $("#navigation").load("navbar.php");
    });
    </script>
  </head>

  <body>

    <!-- Navigation -->
    <div id="navigation"></div>

    <?php
    if(empty($_SESSION["cart"])){
    ?>  <div class="container">
          <div class="cart">
            <img class="noItems" src="https://i.pinimg.com/originals/bf/20/7e/bf207ee3a161fcf6ef833911aa73c072.png" width="30px" >
            <p>Your cart is empty</p>
          </div>
        </div>
    <?php
    }
    else{ ?>
      <br><br><br>
      <h1>🛒Shopping cart🛒</h1>

      <div>
        <table id="show-cart"></table>
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
    <?php } ?>
  </body>
  <br><br><br>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="js/jQuery.js"></script> -->
  <script src="cart.js"></script>

  <script>

    cart = <?php echo json_encode($_SESSION["cart"]); ?>;

    function displayCart(){
      //var cartArray = listCart();
      var output = "<tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>-</th><th>+</th><th>Delete</th></tr>";
      for(var i in cart){
        output += "<tr><td>"
        +"<img src='"+cart[i].image+"' alt='ahdem ostja' border='3' height='100' width='100'></img>"
        +"</td><td style='font-size: 20px;'>"+cart[i].name
        +"</td><td style='font-size: 20px;'>"+cart[i].quantity
        +"</td><td style='font-size: 20px;'>€"+cart[i].price
        +"</td><td><button class='subtract-item' data-id='"+cart[i].id+"' i-id='"+i+"'>-</button>"
        +"</td><td><button class='add-item' data-id='"+cart[i].id+"'>+</button>"
        +"</td><td><button class='delete-item' data-id='"+cart[i].id+"'>X</button></td>"
        +"</tr>"

      }
      $("#show-cart").html(output);
      $("#total-cart").html(totalCostCart().toFixed(2));
      console.log(cart);
    }

    displayCart();

    $("#show-cart").on("click", ".delete-item", function(event){
      var ide = $(this).attr("data-id");
      deleteItem(ide);
      displayCart();
      post();
      if(cart.length == 0){
        console.log("hello");
        post();
        location.reload();
      }
    });
    $("#show-cart").on("click", ".subtract-item", function(event){
      var ide = $(this).attr("data-id");
      var i = $(this).attr("i-id");
      if(cart[i].quantity > 1){
        removeOneItem(ide);
        displayCart();
        post();
      }
    });
    $("#show-cart").on("click", ".add-item", function(event){
      var ide = $(this).attr("data-id");
      addOneItem(ide);
      displayCart();
      post();

    });




  </script>
</html>
