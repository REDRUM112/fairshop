<!DOCTYPE html>
<html lang="en">

<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
function chopExtension($filename) {
  return substr($filename, 0, strrpos($filename, '.'));
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
      include 'components/config.php';
      include 'components/info.php';
      include 'components/user_logger.php';
      include 'components/posts/login_post.php';
      include 'components/posts/register_post.php';
      include 'components/posts/cart_post.php';
      include 'components/posts/cart_delete_post.php';
      include 'components/posts/payment_complete_post.php';    
?> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <title><?php echo $site_name; ?> | <?php 
  if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'index') {
    echo 'Home';
  } else if (basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'categories') {
    echo $_GET['category'];
  } else {
    echo basename($_SERVER["SCRIPT_FILENAME"], '.php');
  }
  
  ?></title>
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypal_clientid;?>"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><?php echo $site_name;?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav collapse navbar-collapse justify-content-center">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Product Categories</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <?php while ($product_category -> fetch()) { ?> 

             <li><a class="dropdown-item" href="categories.php?category=<?php echo $id;?>"><?php echo $name;?></a></li>
            <?php  } ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Digital Store</a>
        </li>
      </ul>
      <?php include 'components/logged_nav.php'; ?>
    </div>
  </div>
</nav>
<?php 
      include 'components/modals/cart_modal.php'; 
      include 'components/modals/register_modal.php'; 
      include 'components/modals/login_modal.php';
      include 'components/modals/interact_modal.php';
?>
