<?php
session_start();
 ?>

  <!DOCTYPE html>
  <html lang="en">

  <body>
    <h1> Shopping cart</h1>

    <form>
      <input type="button" value="save cart" onclick="post();">
    </form>

    <a href="deletesession.php">Delete session array</a>

    <div id="result"></div>

<script src="js/jQuery.js"></script>
    <script src="cart.js"></script>
    <script>
      addcart(1, "nike", 2, 2);
      addcart(1, "nike", 2, 3);
      addcart(2, "adidas", 1, 2);
      addcart(3, "everlast", 5, 5);
      addcart(4, "tommy", 3, 2);
      console.log(totalQuantityCart());
      console.log(totalCostCart());

      cart = <?php echo json_encode($_SESSION["cart"]); ?>;

      console.log(cart);
      </script>



</html>
