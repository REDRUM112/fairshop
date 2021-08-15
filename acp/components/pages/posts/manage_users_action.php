<?php  
include $_SERVER['DOCUMENT_ROOT'] . '/components/link.php';

$input = filter_input_array(INPUT_POST);

if ($input["action"] === 'edit') {
$username = mysqli_real_escape_string($link, $input["Username"]);
$password = mysqli_real_escape_string($link, $input["Password"]);
$email = mysqli_real_escape_string($link, $input["Email"]);
$admin = mysqli_real_escape_string($link, $input["Admin"]);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

 $query = "
 UPDATE accounts 
 SET username = '".$username."', 
 password = '".$hashed_password."' ,
 email = '".$email."',
 admin = '".$admin."' 
 WHERE id = '".$input["id"]."'
 ";

mysqli_query($link, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM accounts 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($link, $query);
}

echo json_encode($input);

?>