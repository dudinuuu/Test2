<?php
  session_start();
  include 'xmlLoader.php';
  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }
  $categoryId=$_GET["categoryId"];
  $productId=$_GET["productId"];
  $name = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/name")[0];
  $description = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/description")[0];
  $cost = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/cost")[0];
  $image = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/image")[0];
  $stock = $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/subcategory/product[id = '{$productId}']/stock")[0];
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Item details page">
    <title>Royal Sport - Find what you need</title>
    <!-- favicon added to the tab-->
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/sport-games-1/512/royal-king-queen-luxury-crown-512.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Our own css file -->
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

    <!-- Page Content -->
    <div class="container">

     <!-- Portfolio Item Heading -->
     <h1 class="my-4">
      <?php
        echo $xml->xpath("/RoyalSport/category[id = '{$categoryId}']/name")[0];
        echo " -> ";
        echo $name;
      ?>
     </h1>

     <!-- Portfolio Item Row -->
     <div class="row">
       <div class="col-md-8">
         <img class="img-fluid" src="<?php echo $image; ?>" style="height:auto; width:500px;">
       </div>
       <div class="col-md-4">
         <h3 class="my-3">Cost</h3>
         <p> <?php echo '$'.$cost;?> </p>
         <h3 class="my-3">Description</h3>
         <p> <?php echo $description;?> </p>
         <h3 class="my-3">Quantity</h3>
         <input id="quantity" type="number" name="quantity" value="1" min="1" max="<?php echo $stock; ?>" style="width:50px;" onchange="quantityCheck()"/><br><br>
         <div><input type="button" value="Add to Cart" style="float: left" class="btn btn-details default" onclick="addThisToCart();" class="add-to-cart"></input></div>
       </div>
     </div>
     <!-- /.row -->

     <!-- Related Projects Row -->
     <h3 class="my-4">Featured Items</h3>

    <div class="row">
     <?php
        $array = array();
        for($count = 0; $count<4 ; $count++){
          $rpid =rand(1,count($xml->xpath("/RoyalSport/category/subcategory/product"))); //pick a random product
          $array[$count]=$rpid;

          //Featured items to be unique using flags
          $flag=false;
          for($i=1; $i<count($array); $i++){
            if($array[$i-1]==$rpid){
              $flag=true;
              break;
            }
            else{
              $flag=false;
            }
          }
          if($rpid==$productId){ //check if any featured product is the same as the product being shown in the current site
            $flag=true;
          }
          if(($xml->xpath("/RoyalSport/category/subcategory/product[id ='{$rpid}']/stock"))[0] == 0){
            $flag=true;
          }
          if($flag==false){
            //getting the category id of the random product
            $rcid =$xml->xpath("/RoyalSport/category/subcategory/product[id=$rpid]/parent::*/parent::*/id")[0];
            foreach ($xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']") as $value){ ?>
            <div class="col-md-3 col-sm-6 mb-4">
               <a href="detailsPage.php?categoryId=<?php echo $rcid; ?>&productId=<?php echo $rpid; ?>">
                 <img class="img-fluid" src="<?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/image")[0]; ?>" alt="">
               </a>
               <h4><?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/name")[0]; ?></h4>
               <p><?php echo $xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/description")[0]; ?></p>
               <div style= 'float: left;' class="price"><?php echo "$".$xml->xpath("/RoyalSport/category[id ='{$rcid}']/subcategory/product[id ='{$rpid}']/cost")[0]; ?></div>
            </div>
           <?php }
          }
          else{
           $count--;
           $flag=false;
          }
       } //to end the for loop on top ?>
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

   <script src="cart.js"></script>
   <script>
   function addThisToCart(){
    var id = "<?php echo ($productId) ?>";
    var name = "<?php echo ($name); ?>";
    var price = "<?php echo ($cost); ?>";
    var quantity = document.getElementById("quantity").value;
    var image = "<?php echo ($image); ?>";
    var stock = "<?php echo ($stock); ?>";

    cart = <?php echo json_encode($_SESSION["cart"]); ?>;

    addcart(id, name, price, quantity, image, stock);

    post();
    location.reload();
    }

    function quantityCheck(){
       var stock = "<?php echo ($stock); ?>";
       var quantity = document.getElementById("quantity").value;
       if(quantity>stock){
         alert("Maximum amount reached");
         document.getElementById("quantity").value = stock;
       }
     }
  </script>

 </body>

</html>
