<?php
$xml = simplexml_load_file('./XMLProducts/Products.xml');
//$search= htmlspecialchars($_POST["search"]);
$search = 'nike';
$product = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]");
print_r($product);
//@Name='{$search}' OR
if(count($product) == 0) { // if found
    include 'detailsPage.php';
}
else{
    //foreach
    include 'listing.php';
}
?>
