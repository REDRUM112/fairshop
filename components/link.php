<?php
$host = 'localhost'; // Host
$user = 'root'; // Username
$password = ''; // Password
$db = 'store'; 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $link = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>

