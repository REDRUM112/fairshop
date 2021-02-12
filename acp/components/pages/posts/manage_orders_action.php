<?php  
include $_SERVER['DOCUMENT_ROOT'] . '/store/components/link.php';

$input = filter_input_array(INPUT_POST);

if($input["action"] === 'edit') {
$Payer_ID = mysqli_real_escape_string($link, $input["Payer_ID"]);
$Order_Total = mysqli_real_escape_string($link, $input["Order_Total"]);
$Payment_Processor = mysqli_real_escape_string($link, $input["Payment_Processor"]);
$Payment_Status = mysqli_real_escape_string($link, $input["Payment_Status"]);
$Tracking_ID =  mysqli_real_escape_string($link, $input["Tracking_ID"]);
$Order_Status =  mysqli_real_escape_string($link, $input["Order_Status"]);

 $query = "
 UPDATE orders 
 SET payer_id = '".$Payer_ID."', 
 order_total = '".$Order_Total."' ,
 payment_processor = '".$Payment_Processor."' ,
 payment_status = '".$Payment_Status."',
 tracking_id = '".$Tracking_ID."',
 order_status = '".$Order_Status."'
 WHERE id = '".$input["id"]."'
 ";

mysqli_query($link, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM orders 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($link, $query);
}
  
echo json_encode($input);

?>