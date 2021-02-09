<?php
include $_SERVER['DOCUMENT_ROOT'] . '/store/components/link.php';
$image_array=array();
$banner_url = "";
$category = $name = $short_desc = $long_desc = $price = $shipping = $shipping = $stock = $promote = $active = "";
$category_err = $name_err = $short_desc_err = $long_desc_err = $price_err = $shipping_err = $stock_err = $promote_err = $active_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'AddProduct') {
    
    if(empty(trim($_POST["product-form-category"]))){
      $category_err = "Your category field cannot be empty.";     
    } else{
      $category = trim($_POST["product-form-category"]);
    }

    if(empty(trim($_POST["name"]))){
      $name_err = "Your name field cannot be empty.";     
    } else{
      $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["short_desc"]))){
      $short_desc_err = "Your short_desc field cannot be empty.";     
    } else{
      $short_desc = trim($_POST["short_desc"]);
    }

    if(empty(trim($_POST["long_desc"]))){
      $long_desc_err = "Your long_desc field cannot be empty.";     
    } else{
      $long_desc = trim($_POST["long_desc"]);
    }
    if(empty(trim($_FILES["image"]["name"][0]))){
      $images_err = "You must add images.";     
    } else{
      $error=array();
      $extension=array("jpeg","jpg","png","gif");
      foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
          $file_name=$_FILES["image"]["name"][$key];
          $file_tmp=$_FILES["image"]["tmp_name"][$key];
          $ext=pathinfo($file_name,PATHINFO_EXTENSION);
      
          if(in_array($ext,$extension)) {
              if(!file_exists($_SERVER['DOCUMENT_ROOT'] . "/store/images/products/" . $file_name)) {
                  move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"][$key], $_SERVER['DOCUMENT_ROOT'] . "/store/images/products/" . $file_name);
                  array_push($image_array, $file_name);
              }
              else {
                  $filename=basename($file_name,$ext);
                  $newFileName=$filename.time().".".$ext;
                  move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"][$key], $_SERVER['DOCUMENT_ROOT'] . "/store/images/products/" . $file_name);
                  array_push($image_array, $file_name);
                }
          }
          else {
              array_push($error,"$file_name, ");
          }
      }
    }
    if($_FILES["banner"]["error"] > 0){
      $banner_url_err = "You must add a image banner.";     
    } else{
      move_uploaded_file($_FILES["banner"]["tmp_name"],
      $_SERVER['DOCUMENT_ROOT'] . "/store/images/products/banner/" . $_FILES["banner"]["name"]);
      $banner_url = $_FILES["banner"]["name"];
    }

    if(empty(trim($_POST["price"]))){
      $price_err = "Your price field cannot be empty.";     
    } else{
      $price = trim($_POST["price"]);
    }

    if(empty(trim($_POST["shipping"]))){
      $shipping_err = "Your shipping field cannot be empty.";     
    } else{
      $shipping = trim($_POST["shipping"]);
    }
    if(empty(trim($_POST["stock"]))){
      $stock_err = "Your stock field cannot be empty.";     
    } else{
      $stock = trim($_POST["stock"]);
    }
    if(empty(trim($_POST["promote"]))){
      $promote_err = "Your promote field cannot be empty.";     
    } else{
      $promote = trim($_POST["promote"]);
    }
    if(empty(trim($_POST["active"]))){
      $active_err = "Your active field cannot be empty.";     
    } else{
      $active = trim($_POST["active"]);
    }
  
    if(empty($category_err) && empty($name_err) && empty($short_desc_err) && empty($long_desc_err) && empty($price_err) && empty($shipping_err) && empty($stock_err) && empty($promote_err) && empty($active_err)){
        
        $sql = "INSERT INTO products (category, name, short_desc, long_desc, images, banner_url, price, shipping, stock, promote, active) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssssssss", $param_category, $param_name, $param_short_desc, $param_long_desc, $param_images, $param_banner, $param_price, $param_shipping, $param_stock, $param_promote, $param_active);
            $param_category = $category;
            $param_name = $name;
            $param_short_desc = $short_desc;
            $param_long_desc = $long_desc;
            $param_images = json_encode($image_array);
            $param_banner = $banner_url;
            $param_price = $price;
            $param_shipping = $shipping;
            $param_stock = $stock;
            $param_promote = $promote;
            $param_active = $active;

            if(mysqli_stmt_execute($stmt)){
                header("location: acp.php");
            } else{
                echo "Oops! Things took longer than normal, try again.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
    } else {
      mysqli_close($link);
    }
}
?>
