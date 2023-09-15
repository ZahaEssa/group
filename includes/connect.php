<?php
class Connect {
    private $con;

    public function __construct($servername, $username, $password, $db) {
        $this->con = new mysqli($servername, $username, $password, $db);

        if ($this->con->connect_error) {
            die("Error: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }

    public function closeConnection() {
        if ($this->con) {
            $this->con->close();
        }
    }
}

// Usage:
$servername = "localhost";
$username = "root";
$password = "786110Zahabiya";
$db = "db_blog";

$dbConnection = new Connect($servername, $username, $password, $db);
$con = $dbConnection->getConnection();



?>