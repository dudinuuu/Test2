<?php
$xml = simplexml_load_file('./XMLProducts/Products.xml');
$search= htmlspecialchars($_POST["search"]);
//$search = 'nike';
$product = $xml->xpath("/RoyalSport/product[contains(description,'{$search}')]/*");
//@Name='{$search}' OR
if(count($product) > 0) { // if found
    if(count($product)>4)
    {
        include 'listing.html';
    }
    else {
        include 'detailsPage.html';
    }
}
?>
