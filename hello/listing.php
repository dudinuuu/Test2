<?php
  include 'xmlLoader.php';
  if(isset($_GET["categoryId"])){
    $categoryId=$_GET["categoryId"];
  }
  if(isset($_GET["pathId"])){
    $pathId=$_GET["pathId"];
  }
  if(isset($_GET["search"])){
    $search=$_GET["search"];
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

      <div class="row">

        <div class="col-lg-3">
          <?php if(isset($categoryId) && isset($pathId)){ ?>
            <h1 class="my-4"><?php echo $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/name")[0]; ?></h1>
          <?php }
          else{ ?>
            <h1 class="my-4"><?php echo $search; ?></h1>
          <?php } ?>


        </div>
        <!-- /.col-lg-3 -->

          <div class="row">
            <?php
              if(isset($search)){
                $product = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]");
                $cid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/parent::*/parent::*/id")[0];
                $pid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/id")[0];
                if(count($product) <= 1)header("Location: detailsPage.php?categoryId=".$cid."&productId=".$pid);

                foreach ($product as $value){ ?>
                  <figure class="snip1268">
                    <div class="image">
                      <img src="<?php echo $value->image; ?>" alt="sq-sample4"/>
                      <a href="detailsPage.php?categoryId=<?php echo $cid; ?>&productId=<?php echo $pid; ?>" class="add-to-cart">Details</a>
                    </div>
                    <figcaption>
                      <h2><?php echo $value->name; ?></h2>
                      <p><?php echo $value->description; ?></p>
                      <div style= 'float: right;'>
                      <div class="price"><?php echo "$$value->cost"; ?></div>
                      </div>
                      <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
                    </figcaption>
                  </figure>
                <?php }
              }
              else{
                foreach ($xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product") as $value){ ?>
                  <figure class="snip1268">
                    <div class="image">
                      <img src="<?php echo $value->image; ?>" alt="sq-sample4"/>
                      <a href="detailsPage.php?categoryId=<?php echo $cid; ?>&productId=<?php echo $pid; ?>" class="add-to-cart">Details</a>
                    </div>
                    <figcaption>
                      <h2><?php echo $value->name; ?></h2>
                      <p><?php echo $value->description; ?></p>
                      <div style= 'float: right;'>
                      <div class="price"><?php echo "$$value->cost"; ?></div>
                      </div>
                      <div style= 'float: left;'><button class="btn default">Add to Cart</button></div>
                    </figcaption>
                  </figure>
              <?php }
            } ?>

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
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
