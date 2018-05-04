<?php
  // creating a new empty session
  session_start();
  $_SESSION["cart"] = array();
  $_SESSION["cart"] = $_POST["postname"];

?>
