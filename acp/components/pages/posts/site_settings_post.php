<?php
include '../components/link.php';

$site_name = $site_name_short = $site_fqdn = $site_domain = $paypal_clientid = $geoloc_key = "";
$site_name_err = $site_name_short_err = $site_fqdn_err = $site_domain_err = $paypal_clientid_err = $geoloc_key_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'save-site-settings') {

    if(empty(trim($_POST["site_name"]))){  
        $site_name_err = "Your site name cannot be empty.";
    } else{
        $site_name = trim($_POST["site_name"]);
    }
  
    if(empty(trim($_POST["site_name_short"]))){  
      $site_name_short_err = "Your site short name cannot be empty.";
    } else{
      $site_name_short = trim($_POST["site_name_short"]);
    }

    if(empty(trim($_POST["site_fqdn"]))){  
      $site_fqdn_err = "Your site fqdn cannot be empty.";
    } else{
       $site_fqdn = trim($_POST["site_fqdn"]);
    }

    if(empty(trim($_POST["site_domain"]))){  
      $site_domain_err = "Your site domain cannot be empty.";
    } else{
      $site_domain = trim($_POST["site_domain"]);
    }

    if(empty($site_name_err) && empty($site_name_short_err) && empty($site_fqdn_err) && empty($domain_err)){
        
        $sql = "UPDATE settings SET site_name = '".$site_name."', site_name_short = '".$site_name_short."', site_fqdn = '".$site_fqdn."', site_domain = '".$site_domain."' WHERE id = 1";
         
        mysqli_query($link, $sql);
    }
    mysqli_close($link);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'save-payment-settings') {

    if(empty(trim($_POST["paypal_clientid"]))){  
      $paypal_clientid_err = "Your client id cannot be empty.";
    } else{
      $paypal_clientid = trim($_POST["paypal_clientid"]);
    }

    if(empty($paypal_clientid_err)){
        
        $sql1 = "UPDATE settings set paypal_client_id = '".$paypal_clientid."' WHERE id = 1";
        mysqli_query($link, $sql1);
    }

    mysqli_close($link);
    } 
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'save-api-settings') {

    if(empty(trim($_POST["geoloc_key"]))){  
      $geoloc_key_err = "Your geoloc api key cannot be empty.";
    } else{
      $geoloc_key = trim($_POST["geoloc_key"]);
    }

    if(empty($geoloc_key_err)){
        
        $sql2 = "UPDATE settings set geoloc_api_key = '".$geoloc_key."' WHERE id = 1";
        mysqli_query($link, $sql2);
    }

    mysqli_close($link);

    }
}
?>