<?php
include 'xmlLoader.php';
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Our own css file -->
    <link href="css/MyCss.css" rel="stylesheet">

    <!--image buttons css-->
    <link rel="stylesheet" type="text/css" href="css/snip1268.css">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/categoryPage.css" rel="stylesheet">

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

    <!-- Page Content -->
    <div class="container">

<?php

  //$_SESSION["id2"] = $pdid;
  if(empty($_SESSION["cartitemscid"]) || empty($_SESSION["cartitemspid"])){
    ?>  <div class="container">
      <div class="cart">
        <img class="noItems" src="https://i.pinimg.com/originals/bf/20/7e/bf207ee3a161fcf6ef833911aa73c072.png" width="30px" >
        <p>Your cart is empty</p>
      </div>
    </div>
               <?php
  }
  else{

    $total = 0.00;

    for ($i=0; $i < count($_SESSION["cartitemscid"]); $i++) {
      echo "<br>" . $_SESSION["cartitemscid"][$i] . "  " . $_SESSION["cartitemspid"][$i];

      $cid = $_SESSION["cartitemscid"][$i];
      $pid = $_SESSION["cartitemspid"][$i];

      $name = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/name")[0];
      $price = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/cost")[0];

      //$image = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/image")[0];

      $total += $price;
      echo "<br>";
      ?>
      <input type="number" id="qty" value="1" oninput="formChanged()"/>


      <script>
      function formChanged(){
        var x = document.getElementById("qty").value;
        document.getElementById("demo").innerHTML = (<?php echo $price ?> * x);
      }
      </script>

      <p>Name: <?php echo $name ?> <br> Price: €<a id="demo"></a > <br> <a href="deleteitems.php?item=<?php echo $i; ?>">Delete Item</a></p>

      <?php


    }
    echo "<br>The total is: €" . $total;
  }

echo "<br><br><br><br>"


  // echo $_SESSION["id1"] . ".<br>";
  // echo "hello" . $_SESSION["id2"];

  // include 'xmlLoader.php';
  // if(isset($_GET["categoryId"])){
  //   $categoryId=$_GET["categoryId"];
  // }
  // if(isset($_GET["pathId"])){
  //   $pathId=$_GET["pathId"];
  // }
  //
  // $_SESSION["productname"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/name")[0];
  // $_SESSION["productprice"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/cost")[0];
  ?>


<div>
  <p> New shopping cart (Later on will be chechout)
    <a href="deletesession.php" >new shopping cart</a>
  </p>
  <p>Continue shopping
    <a href="index.html">Continue shopping</a>
  </p>
</div>
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Royal Sport 2017-2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
