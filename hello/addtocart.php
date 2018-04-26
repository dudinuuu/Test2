<?php
session_start();
$cId=$_GET["categoryId"];
$pId=$_GET["productId"];

if(empty($_SESSION["cartitemscid"])){
$_SESSION["cartitemscid"] = array();
}
if(empty($_SESSION["cartitemspid"])){
$_SESSION["cartitemspid"] = array();
}

array_push($_SESSION["cartitemscid"], $cId);
array_push($_SESSION["cartitemspid"], $pId);

 ?>

  <meta http-equiv="refresh" content="0; url=shoppingcart.php" />
