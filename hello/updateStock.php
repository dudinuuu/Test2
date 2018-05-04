<?php
session_start();
include 'xmlLoader.php';

$xml = simplexml_load_file('./XMLProducts/Products.xml');

foreach($_SESSION["cart"] as $value){

  $oldStock = $xml->xpath("/RoyalSport/category/subcategory/product[id = '{$value['id']}']/stock")[0];
  $quantity = $value['quantity'];
  $newStock = $oldStock - $quantity;
  foreach ($xml->xpath("/RoyalSport/category/subcategory/product[id = '{$value['id']}']") as $i) {
    $i->stock = $newStock;
  }

}
file_put_contents('./XMLProducts/Products.xml', $xml->saveXML());

session_destroy();
include 'checkoutComplete.html';
?>
