<?php
ini_set("auto_detect_line_endings", true);
$xml = simplexml_load_file('./XMLProducts/Products.xml');
$search= htmlspecialchars($_POST["search"]);
$product = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]");
//print_r($product);
$cid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/parent::*/parent::*/id")[0];
$pid = $xml->xpath("/RoyalSport/category/subcategory/product[contains(description,'{$search}')]/id")[0];
//@Name='{$search}' OR
if(count($product) <= 1) {
    header("Location: detailsPage.php?categoryId=".$cid."&productId=".$pid);
}
else{
    //foreach
    include 'listing.php';
}
?>
