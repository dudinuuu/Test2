<?php
session_start();

  $_SESSION["cart"] = array();
  $_SESSION["cart"] = $_POST["postname"];


  print_r($_SESSION["cart"]);
  ?>
