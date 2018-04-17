<?php
  $q=$_GET["categoryId"];
  $s=$_GET["productId"];
  $xml = simplexml_load_file('./XMLProducts/Products.xml');
  $product = $xml->xpath("/RoyalSport/category[@id = '{$q}']/product[@id = '{$s}']/name");
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
    $("#navigation").load("navbar.html");
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
      $product = $xml->xpath("/RoyalSport/category[@id = '{$q}']/name");
      echo $product[0];
      echo " -> ";
      $product1 = $xml->xpath("/RoyalSport/category[@id = '{$q}']/product[@id = '{$s}']/name");
      echo $product1[0];
      ?>
     </h1>

     <!-- Portfolio Item Row -->
     <div class="row">

       <div class="col-md-8">
         <img class="img-fluid" src="http://placehold.it/750x500" alt="">
       </div>

       <div class="col-md-4">
         <h3 class="my-3">Description</h3>
         <p>
           <?php
           $product = $xml->xpath("/RoyalSport/category[@id = '{$q}']/product[@id = '{$s}']/description");
           echo $product[0];
           ?>
         </p>
         <h3 class="my-3">Project Details</h3>
         <ul>
           <li>Lorem Ipsum</li>
           <li>Dolor Sit Amet</li>
           <li>Consectetur</li>
           <li>Adipiscing Elit</li>
         </ul>
       </div>

     </div>
     <!-- /.row -->

     <!-- Related Projects Row -->
     <h3 class="my-4">Related Projects</h3>

     <div class="row">

       <div class="col-md-3 col-sm-6 mb-4">
         <a href="#">
           <img class="img-fluid" src="http://placehold.it/500x300" alt="">
         </a>
       </div>

       <div class="col-md-3 col-sm-6 mb-4">
         <a href="#">
           <img class="img-fluid" src="http://placehold.it/500x300" alt="">
         </a>
       </div>

       <div class="col-md-3 col-sm-6 mb-4">
         <a href="#">
           <img class="img-fluid" src="http://placehold.it/500x300" alt="">
         </a>
       </div>

       <div class="col-md-3 col-sm-6 mb-4">
         <a href="#">
           <img class="img-fluid" src="http://placehold.it/500x300" alt="">
         </a>
       </div>

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
