<?php
include 'components\link.php';

$username = $password = "";
$username_err = $password_err = "";
$cart = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['action'] == 'Login') {

    if(empty(trim($_POST["username"]))){
        $username_err = "Username was empty.";
    } else{
        $username = trim($_POST["username"]);
    }
      if(empty(trim($_POST["password"]))){
        $password_err = "Password was empty.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password, email, admin, date FROM accounts WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $email, $admin, $date);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["admin"] = $admin;
                            $_SESSION["date"] = $date;
                            $_SESSION["this_url"]  = "";  
                            $_SESSION["cart"]  = $cart;                    
                            header("location: index.php");
                     
                        } else{
                            $password_err = "Wrong password.";
                        }
                    }
                } else{

                    $username_err = "Wrong username.";
                }
            } else{
                echo "Something went wrong. Please try again.";
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
