<?php
$xml = simplexml_load_file('./XMLProducts/Products.xml');
$product = $xml->xpath('/RoyalSport/product/element');
if(count($product) > 0) { // if found

    $value = (string) $product[3]->attributes()->Value;
    include $value;
    //echo $value; // Full Package
}
?>
