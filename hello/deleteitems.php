<?php
session_start();

$item =$_GET["item"];

array_splice($_SESSION["cartitemscid"], ($item), ($item+1));
array_splice($_SESSION["cartitemspid"], ($item), ($item+1));



 ?>
 <meta http-equiv="refresh" content="0; url=shoppingcart.php" />
