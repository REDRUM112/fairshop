<?php

$amount = $id ="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['action'] == 'Delete') {
      $id = trim($_POST["product_id"]);
      unset($_SESSION["cart"][$id]);
      header("location: ".$_SESSION["this_url"]); ?>
<?php
    }
    if ($_POST['action'] == 'Delete All') {
      header("location: ".$_SESSION["this_url"]); 
      $_SESSION["cart"] = [];
    }
  }
  ?>