<?php
  $q=$_GET["categoryId"];
  $xml = simplexml_load_file('./XMLProducts/Products.xml');
  $product = $xml->xpath("/RoyalSport/category[@id = '{$q}']/name");
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

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!--image buttons css-->
    <link rel="stylesheet" type="text/css" href="css/snip1268.css">

    <!--add to cart button css-->
    <link rel="stylesheet" type="text/css" href="css/categoryPage.css">

    <!-- navigation bar loader -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $(function(){
      $("#navigation").load("navbar.html");
    });
    </script>

  </head>

  <body>

    <!-- Navigation -->
     <div id="navigation"></div>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4"><?php echo $product[0]; ?></h1>
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
            <figure class="snip1268">
              <div class="image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sq-sample4"/>
                <!-- <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="#"> <i class="ion-share"></i></a>
                  <a href="#"> <i class="ion-search"></i></a>
                </div> -->
                <a href="detailsPage.php?productId=1&categoryId=1" class="add-to-cart">Details</a>
              </div>
              <figcaption>
                <h2>Denim Shirt</h2>
                <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                <div style= 'float: right;'>
                <div class="price">$65.00 </div>
                </div>
                <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
              </figcaption>
            </figure>

            <figure class="snip1268">
              <div class="image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sq-sample4"/>
                <!-- <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="#"> <i class="ion-share"></i></a>
                  <a href="#"> <i class="ion-search"></i></a>
                </div> -->
                <a href="detailsPage.php?productId=1&categoryId=1" class="add-to-cart">Details</a>
              </div>
              <figcaption>
                <h2>Denim Shirt</h2>
                <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                <div style= 'float: right;'>
                <div class="price">$65.00 </div>
                </div>
                <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
              </figcaption>
            </figure>

            <figure class="snip1268">
              <div class="image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sq-sample4"/>
                <!-- <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="#"> <i class="ion-share"></i></a>
                  <a href="#"> <i class="ion-search"></i></a>
                </div> -->
                <a href="detailsPage.php?productId=1&categoryId=1" class="add-to-cart">Details</a>
              </div>
              <figcaption>
                <h2>Denim Shirt</h2>
                <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                <div style= 'float: right;'>
                <div class="price">$65.00 </div>
                </div>
                <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
              </figcaption>
            </figure>

            <figure class="snip1268">
              <div class="image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sq-sample4"/>
                <!-- <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="#"> <i class="ion-share"></i></a>
                  <a href="#"> <i class="ion-search"></i></a>
                </div> -->
                <a href="detailsPage.php?productId=1&categoryId=1" class="add-to-cart">Details</a>
              </div>
              <figcaption>
                <h2>Denim Shirt</h2>
                <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                <div style= 'float: right;'>
                <div class="price">$65.00 </div>
                </div>
                <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
              </figcaption>
            </figure>

            <figure class="snip1268">
              <div class="image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sq-sample4"/>
                <!-- <div class="icons">
                  <a href="#"><i class="ion-star"></i></a>
                  <a href="#"> <i class="ion-share"></i></a>
                  <a href="#"> <i class="ion-search"></i></a>
                </div> -->
                <a href="detailsPage.php?productId=1&categoryId=1" class="add-to-cart">Details</a>
              </div>
              <figcaption>
                <h2>Denim Shirt</h2>
                <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                <div style= 'float: right;'>
                <div class="price">$65.00 </div>
                </div>
                <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
              </figcaption>
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
