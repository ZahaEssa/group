<?php
require_once "../includes/connect.php";

class SignInManager
{
    private $con;

    public function __construct($dbConnection)
    {
        $this->con = $dbConnection;
    }

    public function signIn($authorUsername, $password)
    {
        $enteredUsername = mysqli_escape_string($this->con, $authorUsername);
        $enteredPassword = mysqli_escape_string($this->con, $password);

        $findAuthor = "SELECT * FROM verify WHERE authorusername = '$enteredUsername' LIMIT 1";

        $findAuthorRes = $this->con->query($findAuthor);
        if ($findAuthorRes->num_rows > 0) {
            $authorRow = $findAuthorRes->fetch_assoc();
            $storedPassword = $authorRow["authorpassword"];
            if (password_verify($enteredPassword, $storedPassword)) {
                session_start();
                $_SESSION["data"] = $authorRow;
                header("Location: ../homepage.php");
                exit();
            } else {

               $error_message = "Incorrect password";
                header("Location: ../signin.php?error=" . urlencode($error_message));
                exit();
            }
        } else {
            $error_message = "Incorrect username";
            header("Location: ../signin.php?error=" . urlencode($error_message));
            exit();
        }
    }
}

// Usage:
$signInManager = new SignInManager($con);

if (isset($_POST["Signin"])) {
    $signInManager->signIn($_POST["authorusername"], $_POST["password"]);
} else {
    header("Location: ../signin.php");
    exit();
}
?>
