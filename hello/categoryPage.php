<?php
  include 'xmlLoader.php';
  session_start();
  $categoryId=$_GET["categoryId"];
  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }
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

  <!-- Our own css file -->
  <link href="css/MyCss.css" rel="stylesheet">

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

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4"><?php echo $xml->xpath("/RoyalSport/category[id=$categoryId]/name")[0]; ?></h1>
          <div class="list-group">
            <?php foreach ($xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory") as $value){ ?>
            <a href="listing.php?categoryId=<?php echo $categoryId; ?>&pathId=<?php echo $value->id; ?>" class="list-group-item"><?php echo $value->name; ?></a>
            <?php } ?>
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
                <img class="d-block img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id=$categoryId]/carouselImage")[0]; ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id=$categoryId]/carouselImage")[1]; ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id=$categoryId]/carouselImage")[2]; ?>" alt="Third slide">
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
        </div>
        <!-- /.col-lg-9 -->

        <div class="row">

          <!-- Creating a figure for each product using foreach -->
          <?php foreach ($xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory/product") as $value){ ?>
            <figure class="snip1268">
              <div class="imageContainer">
                <div class="image">
                  <img src="<?php echo $value->image; ?>" alt="sq-sample4"/>
                  <a href="detailsPage.php?categoryId=<?php echo $categoryId; ?>&productId=<?php echo $value->id; ?>" class="add-to-cart">Details</a>
                </div>
              </div>
              <figcaption>
                <h2><?php echo $value->name; ?></h2>
                <p><?php echo $value->description; ?></p>
                <div style= 'float: right;'>
                <div class="price"><?php echo "$$value->cost"; ?></div>
                </div>
                <div> <?php echo "<button style='float: left' onclick='addThisToCartP(".'"'.$value->id.'","'.$value->name.'","'.$value->cost.'","'.$value->image.'"'.")' type='button' class='btn default'>Add to Cart</button>"; ?>
                </div>
              <!-- </div> -->
              </figcaption>
            </figure>
          <?php } ?>

        </div>
        <!-- /.row -->

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


    <script src="js/jQuery.js"></script>
    <script src="cart.js"></script>
    <script>
    function addThisToCartP(ide, name, price, image){
     console.log("hello");

     cart = <?php echo json_encode($_SESSION["cart"]); ?>;

     var quantity = 1;

     addcart(ide, name, price, quantity, image);

     post();

     console.log(ide);
     location.reload();
   }
   </script>


  </body>

</html>
