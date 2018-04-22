<?php
session_start();

$item =$_GET["item"];

unset($_SESSION["cartitemscid"][$item]);
unset($_SESSION["cartitemspid"][$item]);
 ?>
 <meta http-equiv="refresh" content="0; url=shoppingcart.php" />
