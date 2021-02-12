<?php 
function chopExtension($filename) {
  return substr($filename, 0, strrpos($filename, '.'));
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
} 
include 'components/acp_data.php';
include 'components/pages/posts/adduser_post.php';
include 'components/pages/posts/addproduct_post.php';
include 'components/pages/posts/create_order_post.php';
?>
<!doctype html>
<html lang="en">
  <head>
  <title><?php echo $site_name; ?> | <?php echo basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


  </head>
  <body onload="ShowHome()">
		