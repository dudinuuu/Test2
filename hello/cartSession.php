<?php
session_start();
if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = array();
}
  $_SESSION["cart"] = $_POST["postname"];
  print_r($_SESSION["cart"]);
  ?>
