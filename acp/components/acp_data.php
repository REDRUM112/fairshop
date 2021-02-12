<?php 
include '../components/link.php';

$acp_orders = $link -> prepare('SELECT * from orders');

$acp_orders -> execute();
$acp_orders -> store_result();
$acp_orders -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payments_status, $tracking_id, $order_status);

$acp_edit_orders = $link -> prepare('SELECT * from orders');

$acp_edit_orders -> execute();
$acp_edit_orders -> store_result();
$acp_edit_orders -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payments_status, $tracking_id, $order_status);


$acp_wait_orders = $link -> prepare('SELECT * from orders WHERE order_status = "Processing" AND tracking_id = "" AND payment_status = "COMPLETED" ORDER BY id DESC LIMIT 3');
$acp_wait_orders -> execute();
$acp_wait_orders -> store_result();
$acp_wait_orders -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payments_status, $tracking_id, $order_status);

$acp_fetch_categories = $link -> prepare('SELECT * from categories');
$acp_fetch_categories -> execute();
$acp_fetch_categories -> store_result();
$acp_fetch_categories -> bind_result($id, $name);

$acp_accounts = $link -> prepare('SELECT * from accounts');
$acp_accounts -> execute();
$acp_accounts -> store_result();
$acp_accounts -> bind_result($id, $username, $password, $email, $admin, $date);

$acp_get_accounts = $link -> prepare('SELECT * from accounts');
$acp_get_accounts -> execute();
$acp_get_accounts -> store_result();
$acp_get_accounts -> bind_result($id, $username, $password, $email, $admin, $date);

$acp_products = $link -> prepare('SELECT * from products');
$acp_products -> execute();
$acp_products -> store_result();
$acp_products -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);

$acp_get_products = $link -> prepare('SELECT * from products');
$acp_get_products -> execute();
$acp_get_products -> store_result();
$acp_get_products -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);

$acp_paypal_orders = $link -> prepare('SELECT * from orders WHERE payment_processor = "PayPal"');
$acp_paypal_orders -> execute();
$acp_paypal_orders -> store_result();
$acp_paypal_orders -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payments_status, $tracking_id, $order_status);

$acp_interact_orders = $link -> prepare('SELECT * from orders WHERE payment_processor = "Interact"');
$acp_interact_orders -> execute();
$acp_interact_orders -> store_result();
$acp_interact_orders -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payments_status, $tracking_id, $order_status);

$acp_users_viewing = $link -> prepare('SELECT * from useronline WHERE user_id != 777777');
$acp_users_viewing -> execute();
$acp_users_viewing -> store_result();
$acp_users_viewing -> bind_result($id, $timestamp, $ip, $file);

$acp_guests_viewing = $link -> prepare('SELECT * from useronline WHERE user_id = 777777');
$acp_guests_viewing -> execute();
$acp_guests_viewing -> store_result();
$acp_guests_viewing -> bind_result($id, $timestamp, $ip, $file);

$acp_viewing = $link -> prepare('SELECT * from useronline');
$acp_viewing -> execute();
$acp_viewing -> store_result();
$acp_viewing -> bind_result($id, $timestamp, $ip, $file);

$acp_products_price = $link -> prepare('SELECT * from products');
$acp_products_price -> execute();
$acp_products_price -> store_result();
$acp_products_price -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);

$acp_products_stock = $link -> prepare('SELECT * from products');
$acp_products_stock -> execute();
$acp_products_stock -> store_result();
$acp_products_stock -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);


// $acp_fhead_query = $link -> prepare('SELECT SUM(products.stock) FROM products INNER JOIN categories on products.category = categories.id GROUP BY categories.name;');
// $acp_fhead_query -> execute();
// $acp_fhead_query -> store_result();
// $acp_fhead_query -> bind_result($stocks);

function GetCats() {
  include '../components/link.php';
$acp_categories = $link -> prepare('SELECT * from categories');
$acp_categories -> execute();
$acp_categories -> store_result();
$acp_categories -> bind_result($id, $name);
return $acp_categories->affected_rows;
}
function GetCatName() {
  include '../components/link.php';
$acp_categories_name = $link -> prepare('SELECT * from categories');
$acp_categories_name -> execute();
$acp_categories_name -> store_result();
$acp_categories_name -> bind_result($id, $name);
$cats_array = array();
  while ($acp_categories_name -> fetch()) {
    array_push($cats_array, array($id => $name));
  }
  return json_encode($cats_array);
}
function ID2UserName($id) {
  include '../components/link.php';
  if ($id == 777777) {
    return "guest";
  }
  $get_name = $link -> prepare('SELECT username from accounts WHERE id = '. $id .'');
  $get_name -> execute();
  $get_name -> store_result();
  $get_name -> bind_result($username);
    while ($get_name -> fetch()) {
      return $username;
    }
  }
?>
