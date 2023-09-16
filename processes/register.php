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
            return true; 
        } else {
            return "Error updating user: " . $stmt->error;
        }
    }
    else{
        echo "Passwords do not match";
    }
}
}


if (isset($_POST["registrationBtn"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpass"];

    $userUpdater = new UserUpdater($con);
    $result = $userUpdater->updateUser($id, $username, $password, $confirmPassword);

    if ($result === true) {
        header("Location: ../blogsubmission.php");
        exit();
    } else {
        // Handle the error, e.g., display it to the user
        echo $result;
    }
}
?>
