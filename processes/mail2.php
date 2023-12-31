<?php
date_default_timezone_set('Africa/Nairobi');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer/vendor/autoload.php";
require_once "../includes/connect.php";

class Mail {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer();
    }

    public function sendEmail($email, $name, $subject, $token) {
        try {
            $this->mail->isSMTP();
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->SMTPAuth = true;
            $this->mail->Username = "noreplyunique123@gmail.com";
            $this->mail->Password = "lvxbvjweyoxcqsrv";
            $this->mail->SMTPSecure = "tls";
            $this->mail->Port = 587;

            $this->mail->setFrom("noreplyunique123@gmail.com", "No Reply");
            $this->mail->addAddress($email, $name);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $link = "https://localhost/group/processes/verify.php?token=$token";
            $this->mail->Body = "Hello $name, You have signed up for the Blogs website. To complete signing up, click <a href='$link'>here</a>.<br>  Please note that the link will expire within two hours and in the event you have not completed the registration process, you will be redirected to the Email verification page to enter your credentials once again<br><br>Kind regards,<br>Blogs Website Admin.";

            if ($this->mail->send()) {
                echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>";
                echo "Email sent successfully. ";
              
                echo "You will be redirected back to the dashboard. If you were not redirected back to the dashboard, <a href='../test.php' style='color: white; text-decoration: underline;'>click here</a>.<br><br>";
                echo "If you did not receive the verification email click <a href='../test.php' style='color: white; text-decoration: underline;'>here</a>.";
                echo "</div>";
                header("refresh:7;url=../index.php");
            } else {
                echo "<div style='background-color: #FF5733; color: white; text-align: center; padding: 10px;'>";
                echo "Email could not be sent. Try again later";
                echo "</div>";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

if (isset($_POST["send"])) {
    $subject = "Complete Registration";
    $email = $_POST["email"];
    $name = $_POST["name"];
    $token = bin2hex(random_bytes(32));
    $expire = date("Y-m-d H:i:s", strtotime("+2 hours"));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center;'>";
        echo "The email provided is invalid. ";
        echo "You will be redirected back to the previous page once again to enter your details ";
        echo "If not, <a href='../test.php' style='color: white; text-decoration: underline;'>click here</a>.<br><br>";
        header("refresh:7;url=../test.php");
        echo "</div>";
    } else {
        $sql = "INSERT INTO verify (name, token, email, expiry_time) VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE token = VALUES(token), expiry_time = VALUES(expiry_time)";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss", $name, $token, $email, $expire);
        
        if ($stmt->execute()) {
            $send = new Mail();
            $result = $send->sendEmail($email, $name, $subject, $token);
            echo $result;
        } else {
            echo "Failed to insert/update user data.";
        }
    }
}
?>
