<?php
  session_start();
  include 'xmlLoader.php';
  if(isset($_GET["categoryId"])){
    $categoryId=$_GET["categoryId"];
  }
  if(isset($_GET["pathId"])){
    $pathId=$_GET["pathId"];
  }
  if(isset($_GET["search"])){
    $search=$_GET["search"];
    $product = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]");
  }
  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Listing items page">
  <title>Royal Sport - Find what you need</title>
  <!-- favicon added to the tab-->
  <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Our own css file -->
  <link href="css/RoyalSportCss.css" rel="stylesheet">

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
          else if(count($product) >= 1){ ?>
            <h1 class="my-4"><?php echo $search; ?></h1>
          <?php }
          else {
             header("Location: 404.html");
          } ?>


        </div>
        <!-- /.col-lg-3 -->

          <div class="row">
            <?php
              if(isset($search) && count($product) >= 1){
                $cid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/parent::*/parent::*/id")[0];
                $pid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/id")[0];

                // if there is only one product go directly to details page
                if(count($product) <= 1)header("Location: detailsPage.php?categoryId=".$cid."&productId=".$pid);

                //else display all the products
                foreach ($product as $value){
                  if($value->stock != 0){ ?>
                  <figure class="snip1268">
                    <div class="imageContainer">
                      <div class="image">
                        <img src="<?php echo $value->image; ?>" alt="sq-sample4"/>
                        <a href="detailsPage.php?categoryId=<?php echo $xml->xpath("/RoyalSport/category/subcategory/product[id='{$value->id}']/parent::*/parent::*/id")[0]; ?>&productId=<?php echo $value->id; ?>" class="add-to-cart">Details</a>
                      </div>
                    </div>
                    <figcaption>
                      <h2><?php echo $value->name; ?></h2>
                      <p><?php echo $value->description; ?></p>
                      <div style= 'float: right;'>
                      <div class="price"><?php echo "$$value->cost"; ?></div>
                      </div>
                      <div> <?php echo "<button style='float: left' onclick='addThisToCartP(".'"'.$value->id.'","'.$value->name.'","'.$value->cost.'","'.$value->image.'","'.$value->stock.'"'.")' type='button' class='btn default'>Add to Cart</button>"; ?>
                      </div>
                    </figcaption>
                  </figure>
                <?php }
                  }
              }
              else if(isset($categoryId) && isset($pathId)){
                foreach ($xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product") as $value){
                  if($value->stock != 0){ ?>
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
                      <div> <?php echo "<button style='float: left' onclick='addThisToCartP(".'"'.$value->id.'","'.$value->name.'","'.$value->cost.'","'.$value->image.'","'.$value->stock.'"'.")' type='button' class='btn default'>Add to Cart</button>"; ?>
                      </div>
                    </figcaption>
                  </figure>
              <?php }
                }
            } ?>
        </div>
        <!-- /.row -->

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

    <script src="cart.js"></script>
    <script>
    function addThisToCartP(ide, name, price, image, stock){
     cart = <?php echo json_encode($_SESSION["cart"]); ?>;

     var quantity = 1;

     addcart(ide, name, price, quantity, image, stock);

     post();

     location.reload();
   }
   </script>

  </body>

</html>
