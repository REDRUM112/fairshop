<?php
include '../components/link.php';

$acp_payer_id = $acp_order_total = $acp_payment_processor = $acp_payment_status = $acp_tracking_id = $acp_order_status = "";
$acp_payer_id_err = $acp_order_total_err = $acp_payment_processor_err = $acp_payment_status_err = $acp_tracking_id_err = $acp_order_status_err ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'Create Order') {
    if(empty(trim($_POST["payer_id"]))){  
        $acp_payer_id_err = "Thep payer id cannot be empty.";
      } else{
        $acp_payer_id = trim($_POST["payer_id"]);
    }
  
    if(empty(trim($_POST["order_total"]))){
        $acp_order_total_err = "Your order total cannot be empty.";     
    } else{
        $acp_order_total = trim($_POST["order_total"]);
    }
    

    if(empty(trim($_POST["payment_processor"]))){
      $acp_payment_processor_err = "Your payment processor cannot be empty.";     
    } else{
      $acp_payment_processor = trim($_POST["payment_processor"]); 
    }

    if(empty(trim($_POST["payment_status"]))){
      $acp_payment_status_err = "Your payment status cannot be empty.";     
    } else{
      $acp_payment_status = trim($_POST["payment_status"]);
    }

    if(empty(trim($_POST["tracking_id"]))){
      $acp_tracking_id_err = "Your tracking ID cannot be empty.";     
    } else{
      $acp_tracking_id = trim($_POST["tracking_id"]);
    }

    if(empty(trim($_POST["order_status"]))){
      $acp_order_status_err = "Your order status cannot be empty.";     
    } else{
      $acp_order_status = trim($_POST["order_status"]);
    }

    if(empty($acp_payer_id_err) && empty($acp_order_total_err) && empty($acp_payment_processor_err) && empty($acp_payment_status_err) && empty($acp_tracking_id_err) && empty($acp_order_status_err)){
        $tdata = "Manual Order";
        $sql = "INSERT INTO orders (payer_id, order_total, transaction_data, payment_processor, payment_status, tracking_id, order_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7);
            $p1 = $acp_payer_id;
            $p2 = $acp_order_total;
            $p3 = json_encode($tdata);
            $p4 = $acp_payment_processor;
            $p5 = $acp_payment_status;
            $p6 = $acp_tracking_id;
            $p7 = $acp_order_status;
            
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