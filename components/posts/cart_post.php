<?php

$amount = $id ="";
$amount_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'AddCart') {
      header("location: ".$_SESSION["this_url"]); 
      if(empty(trim($_POST["amount"]))){
        $amount_err = "Bad amount value.";     
      } else{
        $id = trim($_POST["product_id"]);
        $amount = trim($_POST["amount"]);
        $name = trim($_POST["product_name"]);
        $image = trim($_POST["product_image"]);
        $price = trim($_POST["product_price"]);
        $stock = trim($_POST["product_stock"]);
        $total_price = $price * $amount;
        $_SESSION["cart"][$id] = ["id" => $id, "name" => $name, "images" => $image, "amount" => $amount, "price" => $price, "total" => $total_price, "stock" => $stock];
      }  
    }
  }
  ?>