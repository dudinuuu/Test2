<?php
  session_start();
  include 'xmlLoader.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Purchase checkout page">
    <title>Royal Sport - Find what you need</title>
    <!-- favicon added to the tab-->
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/RoyalSportCss.css" rel="stylesheet">

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

    <div class="container">

      <!-- title and navigation -->
      <h1 class="mt-4 mb-3">Checkout</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Checkout</li>
      </ol>

    <div class="container">

      <!-- Input form for checkout -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Enter personal deatils:</h3>
          <!-- Form start -->
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

            <h2>Address Details</h2>
            <div class="control-group form-group">
              <div class="controls">
                <label>Address:</label>
                <input type="text" class="form-control" id="address"  required ata-validation-required-message="Please enter your address.">
              </div>
            </div>
            <div class="row-checkout">
              <div class="form-group" style="width: 59%;">
                <label>City:</label>
                <div class="col-xs-7 col-md-7" style="padding-left: 0px;">
                  <input type="text" class="form-control" id="city" />
                </div>
              </div>
              <div class="form-group" style="width: 40%;">
                <label>Post Code:</label>
                <div class="col-xs-7 col-md-7 pull-right" style="padding-left: 0px;">
                  <input type="text" class="form-control" id="postCode" />
                </div>
              </div>
            </div>
            <div class="form-group" style="width: 59%;">
              <label>Country:</label>
              <div class="col-xs-7 col-md-7" style="padding-left: 0px;">
                <input type="text" class="form-control" id="country" />
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
              <!-- Calling checkoutButton in checkout.js -->
              <button type="submit" class="btn btn-primary" id="checkoutButton">Checkout</button>
            </form>
            <!-- Form end -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.container -->


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Royal Sport 2017-2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- checkout form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/checkout.js"></script>

  </body>
</html>
