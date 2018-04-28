<?php
session_start();
print_r($_SESSION["cart"]);
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

      cart = <?php echo json_encode($_SESSION["cart"]); ?>;
      console.log(totalCostCart());

      console.log(cart);
    </script>



</html>
