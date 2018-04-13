<?php
$xml = simplexml_load_file('./XMLProducts/Products.xml');
$search= htmlspecialchars($_POST["search"]);
$product = $xml->xpath("/RoyalSport/product[@Name='{$search}']/*");
if(count($product) > 0) { // if found

    $value = (string) $product[2]->attributes()->Value;
    include $value;
}
?>
