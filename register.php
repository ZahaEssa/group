<?php
require_once "../includes/connect.php";
if(isset($_POST["registrationBtn"])){
    $name=$_POST["authorname"];
    $email=$_POST["emailaddress"];
    $username=$_POST["username"];
    $pass=$_POST["password"];
    $confpass=$_POST["confirmpass"];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Email is invalid";
        echo "<br>";
    }
    if($pass!=$confpass)
    {
        echo "Passwords do not match";
    }
    else{
        $hashpass=password_hash($pass, PASSWORD_DEFAULT);
        $hashconfpass=password_hash($confpass, PASSWORD_DEFAULT);
    }

$stmt=$con->prepare("INSERT INTO author(authorname,authoremail,authorusername,authorpassword,authorconfirmpassword) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$name,$email,$username,$hashpass,$hashconfpass);
if($stmt->execute())
{
    header("Location: ../signup.php");
}

else{
    echo "Error: ".$stmt->error;
}


}

?>