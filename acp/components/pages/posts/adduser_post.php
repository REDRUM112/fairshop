<?php
include '../components/link.php';

$cr_username = $cr_password = $cr_confirm_password = $cr_email = "";
$cr_username_err = $cr_password_err = $cr_confirm_password_err = $cr_email_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'Add User') {
    if(empty(trim($_POST["username"]))){  
        $cr_username_err = "Your username cannot be empty.";
    } else{
        $sql = "SELECT id FROM accounts WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $cr_username_err = "This username is already taken.";
                } else{
                    $cr_username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! things took longer than expected, try again.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $cr_password_err = "You password cannot be empty.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $cr_password_err = "You password must be 6 characters long.";
    } else{
        $cr_password = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $cr_confirm_password_err = "You password cannot be empty.";     
    } else{
        $cr_confirm_password = trim($_POST["confirm_password"]);
        if(empty($cr_password_err) && ($cr_password != $cr_confirm_password)){
          $cr_confirm_password_err = "Your passwords don't match.";
        }
    }
    if(empty(trim($_POST["email"]))){
      $cr_email_err = "Your email cannot be empty.";     
    } else{
      $cr_email = trim($_POST["email"]);
    }

    if(empty($cr_username_err) && empty($cr_password_err) && empty($cr_confirm_password_err) && empty($cr_email_err)){
        
        $sql = "INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            $param_username = $cr_username;
            $param_password = password_hash($cr_password, PASSWORD_DEFAULT);
            $param_email = $cr_email;

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