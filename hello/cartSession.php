<?php
session_start();
if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = array();
}
if(count($_SESSION["cart"])==0){
  $_SESSION["cart"] = $_POST["postname"];
}
else{
  $_SESSION["cart"][] = $_POST["postname"];
}
  print_r($_SESSION["cart"]);
  ?>
