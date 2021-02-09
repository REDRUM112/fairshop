<?php 
include 'components\link.php';
$parsed_url = parse_url($_GET['category']);

if ($parsed_url["path"] == "featured") {
  $product_get = $link -> prepare('SELECT * from products WHERE promote != 0');

  $product_get -> execute();
  $product_get -> store_result();
  $product_get -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);
} else {
$product_get = $link -> prepare('SELECT * from products WHERE id = "'.$parsed_url["path"].'"');

$product_get -> execute();
$product_get -> store_result();
$product_get -> bind_result($id, $category, $name, $short_desc, $long_desc, $images, $banner_url, $price, $shipping, $stock, $promote, $active, $date);
}
?>