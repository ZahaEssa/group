<?php
require_once "../includes/connect.php";

session_start();
unset($_SESSION["data"]);


if (isset($_POST["Signin"])) {
    $entered_username = mysqli_escape_string($con, $_POST["authorusername"]);
    $entered_password = mysqli_escape_string($con, $_POST["password"]);

    $find_author = "SELECT * FROM author WHERE authorusername = '$entered_username' LIMIT 1";
    
    $find_author_res = $con->query($find_author);
    if($find_author_res->num_rows > 0){
        $author_row = $find_author_res->fetch_assoc();
        $stored_password = $author_row["authorpassword"];
        if(password_verify($entered_password, $stored_password)){
            $_SESSION["data"] = $author_row;
             header("Location: ../blogsubmission.php"); 
             exit();
        }else{
            $error_message = "Incorrect password";
            header("Location: ../signin.php?error=" . urlencode($error_message)); 
            exit();
            }     
    }else{
            $error_message = "Incorrect username";
            header("Location: ../signin.php?error=" . urlencode($error_message)); 
            exit();
    }
    }else{
        header("Location: ../signin.php");
        exit();
    }
?>
