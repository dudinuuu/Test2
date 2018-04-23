<?php
  $categoryId=$_GET["categoryId"];
  $productId=$_GET["productId"];
  $xml = simplexml_load_file('./XMLProducts/Products.xml');
  $product = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/product[id = '{$productId}']");
?>

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
    $("#navigation").load("navbar.php");
  });
  </script>

</head>

<body>

  <!-- Navigation -->
   <div id="navigation"></div>

   <!-- Page Content -->
   <div class="container">

     <!-- Portfolio Item Heading -->
     <h1 class="my-4">
      <?php
      echo $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/name")[0];
      echo " -> ";
      echo $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/name")[0];
      ?>
     </h1>

     <!-- Portfolio Item Row -->
     <div class="row">

       <div class="col-md-8">
         <img class="img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/image")[0]; ?>" alt="">
       </div>

       <div class="col-md-4">
         <h3 class="my-3">Cost</h3>
         <p> <?php echo '$'.$xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/cost")[0];?> </p>
         <h3 class="my-3">Description</h3>
         <p> <?php echo $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/description")[0];?> </p>



         <div><a style="float: left" class="btn default" href="addtocart.php?categoryId=<?php echo $categoryId; ?>&productId=<?php echo $productId; ?>" class="add-to-cart">Add to Cart</a>

       </div>

     </div>
     <!-- /.row -->

     <!-- Related Projects Row -->
     <h3 class="my-4">Related Items</h3>

     <div class="row">

       <?php
          for($count = 0; $count<4 ; $count++){
          $rcid = rand(1,count($xml->xpath("/RoyalSport/category/id"))); //pick a random category
          $rpid =rand(1,count($xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product"))); //pick a random product
         ?>
            <div class="col-md-3 col-sm-6 mb-4">
               <a href="detailsPage.php?categoryId=<?php echo $rcid; ?>&productId=<?php echo $rpid; ?>">
                 <img class="img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/image")[0]; ?>" alt="">
               </a>
               <h4><?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/name")[0]; ?></h4>
               <p><?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/description")[0]; ?></p>
               <div style= 'float: left;'><button class="btn default btn-details">Add to Cart</button></div>
               <div style= 'float: right;' class="price"><?php echo "$".$xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/cost")[0]; ?></div>
            </div>
         <?php } ?>
     </div>
     <!-- /.row -->

   </div>
   <!-- /.container -->


   <!-- Footer -->
   <footer class="py-5 bg-dark">
     <div class="container">
       <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
     </div>
     <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 </body>

</html>
