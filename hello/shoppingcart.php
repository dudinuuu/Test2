<?php
include 'xmlLoader.php';
  session_start();
  ?>

  <!DOCTYPE html>
  <html lang="en">

<?php

  //$_SESSION["id2"] = $pdid;
  if(empty($_SESSION["cartitemscid"]) || empty($_SESSION["cartitemspid"])){
    echo "shopping cart empty";
  }
  else{
    print_r($_SESSION["cartitemscid"]);
    print_r($_SESSION["cartitemspid"]);

    $total = 0.00;

    for ($i=0; $i < count($_SESSION["cartitemscid"]); $i++) {
      echo "<br>" . $_SESSION["cartitemscid"][$i] . "  " . $_SESSION["cartitemspid"][$i];

      $cid = $_SESSION["cartitemscid"][$i];
      $pid = $_SESSION["cartitemspid"][$i];

      $name = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/name")[0];
      $price = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/cost")[0];
      //$image = $xml->xpath("/RoyalSport/category[id=$cid]/subcategory/product[id = $pid]/image")[0];

      $total += $price;

      echo "<br>" . $name . "  €" . $price . "<br>"; ?> <a href="deleteitems.php?item=<?php echo $i; ?>">Delete Item</a> <?php

    }
    echo "<br>The total is: €" . $total;
  }

echo "<br><br><br><br>"


  // echo $_SESSION["id1"] . ".<br>";
  // echo "hello" . $_SESSION["id2"];

  // include 'xmlLoader.php';
  // if(isset($_GET["categoryId"])){
  //   $categoryId=$_GET["categoryId"];
  // }
  // if(isset($_GET["pathId"])){
  //   $pathId=$_GET["pathId"];
  // }
  //
  // $_SESSION["productname"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/name")[0];
  // $_SESSION["productprice"] = $xml->xpath("/RoyalSport/category[id=$categoryId]/subcategory[id=$pathId]/product/cost")[0];
  ?>



  <p> New shopping cart (Later on will be chechout)
    <a href="deletesession.php" >new shopping cart</a>
  </p>
  <p>Continue shopping
    <a href="index.html">Continue shopping</a>
  </p>

</html>
