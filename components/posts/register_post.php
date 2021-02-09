<?php
include 'components\link.php';
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['action'] == 'Register') {
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte trag deinen Benutzernamen ein.";
    } else{
        $sql = "SELECT id FROM accounts WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Der Benutzername ist bereits in benutzung.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Es ist etwas schief gelaufen. Bitte versuch es nochmal.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Bitte trag ein Passwort ein.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Das Passwort muss mindestens 6 Zeichen beinhalten.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bitte bestätige dein Passwort.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
          $confirm_password_err = "Die Passwörter unterscheiden sich. Bitte überprüfe diese.";
        }
    }
    if(empty(trim($_POST["email"]))){
      $email_err = "Bitte bestätige dein Passwort.";     
    } else{
      $email = trim($_POST["email"]);
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){
        
        $sql = "INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
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