<?php  
include $_SERVER['DOCUMENT_ROOT'] . '/store/components/link.php';

$input = filter_input_array(INPUT_POST);

if($input["action"] === 'edit') {
$category = mysqli_real_escape_string($link, $input["Category"]);
$name = mysqli_real_escape_string($link, $input["Name"]);
$short_desc = mysqli_real_escape_string($link, $input["Short_Desc"]);
$long_desc = mysqli_real_escape_string($link, $input["Long_Desc"]);
$price =  mysqli_real_escape_string($link, $input["Price"]);
$shipping =  mysqli_real_escape_string($link, $input["Shipping"]);
$stock =  mysqli_real_escape_string($link, $input["Stock"]);
$promote =  mysqli_real_escape_string($link, $input["Promote"]);
$active =  mysqli_real_escape_string($link, $input["Active"]);

 $query = "
 UPDATE products 
 SET category = '".$category."', 
 name = '".$name."' ,
 short_desc = '".$short_desc."' ,
 long_desc = '".$long_desc."',
 price = '".$price."',
 shipping = '".$shipping."',
 stock = '".$stock."',
 active = '".$active."'
 WHERE id = '".$input["id"]."'
 ";

mysqli_query($link, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM products 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($link, $query);
}
  
echo json_encode($input);

?>