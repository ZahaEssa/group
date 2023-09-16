<?php
require_once "../includes/connect.php";

class UserUpdater {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function updateUser($id, $username, $password, $confirmPassword) {
        if ($password === $confirmPassword) 
        {   
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->con->prepare("UPDATE verify SET authorusername=?, authorpassword=? WHERE id=?");
        $stmt->bind_param("ssi", $username, $hashpass, $id);

        if ($stmt->execute()) {
            header("Location: ../blogsubmission.php");
        } else {
            return "Error updating user: " . $stmt->error;
        }
    }
    else{
        echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>";
        echo "Passwords do not match. ";
        echo "You will be redirected to the sign up page once again. ";
        echo "If not, <a href='../signup.php' style='color: white; text-decoration: underline;'>click here</a>.<br><br>";
        header("refresh:7;url=../signup.php?id=".$id);
        echo "</div>";
    }
}
}


if (isset($_POST["registrationBtn"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpass"];

    $userUpdater = new UserUpdater($con);
    $userUpdater->updateUser($id, $username, $password, $confirmPassword);

    
}
?>
