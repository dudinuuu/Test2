<?php
  $q=$_GET["categoryId"];
  $xml = simplexml_load_file('./XMLProducts/Products.xml');
  $product = $xml->xpath("/RoyalSport/category[@id = '{$q}']");
  print_r(array_values($product));
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

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- navigation bar loader -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $(function(){
      $("#navigation").load("navbar.html");
    });
    </script>

    <link rel="stylesheet" type="text/css" href="css/snip1418.css">

  </head>

  <body>

    <!-- Navigation -->
     <div id="navigation"></div>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Football</h1>
          <div class="list-group">
            <a href="Gloves.html" class="list-group-item">Gloves</a>
            <a href="FootballBoots.html" class="list-group-item">Boots</a>
            <a href="Gear.html" class="list-group-item">Gear</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">

            <figure class="snip1418"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample85.jpg" alt="sample85"/>
              <div class="add-to-cart"> <i class="ion-android-add"></i><span>Add to Cart</span></div>
              <figcaption>
                <h3>Pudol Doux</h3>
                <p>All this modern technology just makes people try to do everything at once.</p>
                <div class="price">
                  <s>$24.00</s>$19.00
                </div>
              </figcaption><a href="#"></a>
            </figure>
            <figure class="snip1418"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample92.jpg" alt="sample92"/>
              <div class="add-to-cart"> <i class="ion-android-add"></i><span>Add to Cart</span></div>
              <figcaption>
                <h3>Zosaisan Invec</h3>
                <p>If your knees aren't green by the end of the day, you ought to seriously re-examine your life. </p>
                <div class="price">
                  <s>$24.00</s>$19.00
                </div>
              </figcaption><a href="#"></a>
            </figure>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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
