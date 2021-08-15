<?php
include 'link.php';

$account_data = $link -> prepare('SELECT * from accounts');

$account_data -> execute();
$account_data -> store_result();
$account_data -> bind_result($id, $username, $password, $email, $admin, $date);

$featured_products_header = $link -> prepare('SELECT * from products WHERE active != 0 ORDER BY id DESC LIMIT 12');

$featured_products_header -> execute();
$featured_products_header -> store_result();
$featured_products_header -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);

$featured_products_header3 = $link -> prepare('SELECT * from products WHERE active != 0 ORDER BY id DESC LIMIT 12');

$featured_products_header3 -> execute();
$featured_products_header3 -> store_result();
$featured_products_header3 -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);


$featured_products_mid = $link -> prepare('SELECT * from products WHERE active != 0 AND promote != 0');
$featured_products_mid -> execute();
$featured_products_mid -> store_result();
$featured_products_mid -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);

$product_category = $link -> prepare('SELECT * from categories');

$product_category -> execute();
$product_category -> store_result();
$product_category -> bind_result($id, $name);

$products_promoted = $link -> prepare('SELECT count(*) from products WHERE active != 0 AND promote != 0');

$products_promoted -> execute();
$products_promoted -> store_result();
$products_promoted -> bind_result($total_promoted);

$link->close();
?>