<?php
  session_start();
  include 'xmlLoader.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Royal Sport - Find what you need</title>

    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/MyCss.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $(function(){
      $("#navigation").load("navbar.php");
    });
    </script>

  </head>

  <body>


    <div id="navigation"></div>

    <div class="container">

      <h1 class="mt-4 mb-3">Checkout</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Checkout</li>
      </ol>

    <div class="container">

      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Enter personal deatils:</h3>
          <form name="checkout" id="checkoutForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name"  required ata-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone"  required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <h2>Payment Details</h2>
            <div class="control-group form-group">
              <div class="controls">
                <label>CARD NUMBER:</label>
                <div class="input-group">
                  <input type="cardNumber" class="form-control" id="cardNumber" required data-validation-required-message="Please enter your card number." placeholder="Valid Card Number">
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-xs-7 col-md-7">
                    <div class="form-group">
                        <label for="expityMonth">
                            EXPIRY DATE</label>
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                            <input type="text" class="form-control" id="expityMonth" required placeholder="MM"  />
                        </div>
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                            <input type="text" class="form-control" id="expityYear" required placeholder="YY"  /></div>
                    </div>
                </div>
                <div class="col-xs-5 col-md-5 pull-right">
                    <div class="form-group">
                        <label for="cvCode">
                            CV CODE</label>
                        <input type="password" class="form-control" id="cvCode" required placeholder="CV"  />
                    </div>
                </div>
              </div>
              <div id="success"></div>
              <!-- For success/fail messages -->
              <button type="submit" class="btn btn-primary" onclick="updateStock();" id="checkoutButton">Checkout</button>
            </form>
          </div>

        </div>
      <!-- /.row -->
      </div>
    </div>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Royal Sport 2017-2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/checkout.js"></script>

  </body>
  <script src="cart.js"></script>
  <script>
    function updateStock(){
      cart = <?php echo json_encode($_SESSION["cart"]); ?>;

        for(var i in cart){
          //var newstock = cart[i].stock = cart[i].quantity;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myFunction(this);
            }
        };
        xhttp.open("GET", "./XMLProducts/Products.xml", true);
        xhttp.send();

        function myFunction(xml) {
            var xmlDoc = xml.responseXML;
            var stock = xmlDoc.getElementsByTagName("stock")[0].childNodes[0];
            console.log(stock.nodeValue);
            var oldStock = stock.textContent;
            var quantity = cart[i].quantity;
            var newStock = oldStock-quantity;
            stock.nodeValue = newStock;
            console.log(stock.nodeValue);
        }
      }
      //location.reload();

    }
  </script>

  <?php

    $xml = simplexml_load_file('./XMLProducts/Products.xml');

    print_r($_SESSION["cart"]);

    foreach($_SESSION["cart"] as $value){
      echo $value.id;
    }

    // foreach ($xml->xpath("/RoyalSport/category/subcategory/product[id = '1']") as $value) {
    //   $value->stock = "69";
    // }
    //
    // file_put_contents('./XMLProducts/Products.xml', $xml->saveXML());
   ?>

</html>
