<?php 

include 'link.php';

$ip = $_SERVER['REMOTE_ADDR'];
$sql0 = "SELECT ip FROM useronline WHERE ip = ?";
 
  if($stmt = mysqli_prepare($link, $sql0)){
    mysqli_stmt_bind_param($stmt, "s", $param_userip);
    
    $param_userip = $ip;

    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt) == 1){
      
        } else{
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
          $sql = "INSERT INTO useronline (user_id, timestamp, ip, file) VALUES (?, ?, ?, ?)";
          if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "isss", $param_uid, $param_timestamp, $param_ip, $param_file);
              $param_uid = $_SESSION['id']  ;
              $param_timestamp = time();
              $param_ip = $ip;
              $param_file = $_SERVER['SCRIPT_FILENAME'];
              if(mysqli_stmt_execute($stmt)){
    
              } else{
                
              }
          }
          mysqli_stmt_close($stmt);
        } else {
          $sql = "INSERT INTO useronline (timestamp, ip, file) VALUES (?, ?, ?)";
          if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "sss", $param_timestamp, $param_ip, $param_file);
              $param_timestamp = time();
              $param_ip = $ip;
              $param_file = $_SERVER['SCRIPT_FILENAME'];
              if(mysqli_stmt_execute($stmt)){
        
              } else{
                
              }
        }
        }
    } 
  }
}       
 $timeoutseconds = 300;
  $timestamp=time(); 
  $timeout=$timestamp-$timeoutseconds; 
  $del_inactive = $link -> prepare("DELETE FROM useronline WHERE timestamp < $timeout"); 
  $del_inactive -> execute(); 
?>