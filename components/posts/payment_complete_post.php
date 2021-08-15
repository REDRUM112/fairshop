<?php
include __DIR__ . "/../link.php";
$first_name = $last_name = $address = $app = $country = $city = $state = $zip = $e_email = $e_order_total = "";
$first_name_err = $last_name_err = $address_err = $app_err = $country_err = $city_err = $state_err = $zip_err = $e_email_err = "";
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if($_REQUEST['action'] == 'paypal')
  { 
    $_SESSION['cart'] = [];
    $transaction = $_POST['transaction'];
    $response['transaction'] = json_decode($transaction, true);

    if(!empty($response['transaction'])) {
      $sql = "INSERT INTO orders (payer_id, order_total, transaction_data, payment_processor, payment_status) VALUES (?, ?, ?, ?, ?)";
      
      if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "iisss", $param_id, $param_total, $param_data, $param_processor, $param_status);
          $param_id = $_SESSION['id'];
          $param_total = $response['transaction']['purchase_units'][0]['amount']['value'];
          $param_data = json_encode($response['transaction']);
          $param_processor = "PayPal";
          $param_status = $response['transaction']['status'];

          if(mysqli_stmt_execute($stmt)){
            header("Location: order.php");

          } else{
              echo "Oops! Things took longer than normal, try again.";
          }
      }
      mysqli_stmt_close($stmt);
    }
  }
  if($_REQUEST['action'] == 'Order')
  { 
    if(empty(trim($_POST["first_name"]))){
      $first_name_err = "Please enter your first name.";     
    } else{
      $first_name = trim($_POST["first_name"]);
    }

    if(empty(trim($_POST["last_name"]))){
      $last_name_err = "Please enter your last name.";     
    } else{
      $last_name = trim($_POST["last_name"]);
    }

    if(empty(trim($_POST["address"]))){
      $address_err = "Please enter your address.";     
    } else{
      $address = trim($_POST["address"]);
    }

    if(empty(trim($_POST["country"]))){
      $country_err = "Please enter your country.";     
    } else{
      $country = trim($_POST["country"]);
    }
    if(empty(trim($_POST["appartement"]))){
      $app_err = "";
      $app = "";     
    } else{
      $app = trim($_POST["appartement"]) . "-";
    }
    if(empty(trim($_POST["state"]))){
      $state_err = "Please enter your state or province.";     
    } else{
      $state = trim($_POST["state"]);
    }
    
    if(empty(trim($_POST["city"]))){
      $city_err = "Please enter your city.";     
    } else{
      $city = trim($_POST["city"]);
    }

    if(empty(trim($_POST["zip"]))){
      $zip_err = "Please enter your zip code.";     
    } else{
      $zip = trim($_POST["zip"]);
    }

    if(empty(trim($_POST["e_email"]))){
      $e_email_err = "Please enter your interact email.";     
    } else{
      $e_email = trim($_POST["e_email"]);
    }
    if (empty($first_name_err) && empty($last_name_err) && empty($address_err) && empty($country_err) && empty($state_err) && empty($city_err) && empty($zip_err) && empty($e_email_err)){
    $interact_data = [
      "first_name" => $first_name,
      "last_name" => $last_name,
      "address" => $address,
      "app" => $app,
      "country" => $country,
      "state" => $state,
      "city" => $city,
      "zip" => $zip,
      "order_time" => time(),
      "e_email" => $e_email,
      "items" => $_SESSION['cart']
    ];
    $_SESSION['cart'] = [];
      $sql = "INSERT INTO orders (payer_id, order_total, transaction_data, payment_processor, payment_status) VALUES (?, ?, ?, ?, ?)";
      print_r($interact_data);
      if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "iisss", $param_id, $param_total, $param_data, $param_processor, $param_status);
          $param_id = $_SESSION['id'];
          $param_total = $_POST['interact_order_total'];
          $param_data = json_encode($interact_data);
          $param_processor = "Interact";
          $param_status = "Waiting on payment";

          if(mysqli_stmt_execute($stmt)){
            header("Location: orders.php");

          } else{
              echo "Oops! Things took longer than normal, try again.";
          }
      mysqli_stmt_close($stmt);
     }
    }
  }
}
?>