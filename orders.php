<?php include 'components/constructors/header.php';
$_SESSION["this_url"] = full_path(); 


$order_data = $link -> prepare('SELECT * from orders WHERE payer_id ='.$_SESSION["id"].'');

$order_data -> execute();
$order_data -> store_result();
$order_data -> bind_result($id, $payer_id, $order_total, $transaction_data, $payment_processor, $payment_status, $tracking_id, $order_status);
$data = json_decode($transaction_data, true);  

?>
<div class="main"> 
<p class="display-5">📇 Orders (<?php echo $link->affected_rows;?>)</p> 
<hr>
</br>
<?php $total_spent = 0;
if ($link->affected_rows > 0) { ?>
    <div class="accordion" id="accordionExample">
<?php  while ($order_data -> fetch()) { 
 include 'components\payments\paypal.php';
 include 'components\payments\interact.php';
  }
} else {
  echo "You have no orders, yet.";
}
?></div><?php if ($link->affected_rows > 0) { ?><br> <hr> <h5 style="line-height: 3rem;">You have spent $<?php echo $total_spent ;?> over a total of <?php echo $link->affected_rows;?> orders.</h5> <?php } ?>
 </div> <?php

 include 'components\constructors\footer.php';?>
 <script>