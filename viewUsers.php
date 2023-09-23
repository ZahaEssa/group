<?php

require_once "includes/connect.php";
session_start();
if (!isset($_SESSION['data'])) {
    header('Location: signin.php');
    exit();
}
$sql = "SELECT * FROM verify ORDER BY id ASC";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Users</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); 
        }

        .nav-section {
            background-color: #333;
            padding: 20px;
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .nav-section a {
            display: inline-block;
            margin-right: 20px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .nav-section a:last-child {
            margin-right: 0;
        }

        .nav-section a:hover {
            background-color: #007BFF;
            text-decoration: none;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 20px 0;
            margin: 0;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            font-size: 24px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            border-radius: 0;
            padding: 20px;
        }

    </style>
    
</head>
<body>

<div class="nav-section">
        <div class="float-left">
            <a href="homepage.php">Home page</a>
            <a href="blogsubmission.php">Blog Submission</a>
            <a href="viewBlogs.php">View Blogs</a>
            <a href="viewUsers.php">View Users</a>
        </div>
        <div class="float-right">
            <a class="btn btn-link" href="processes/signOut.php">Sign Out</a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="container">
        <div class="card">
            
            <h1 class="card-title">View Users</h1>
            <div class="card-body">
        <?php
        if ($result && $result->num_rows > 0) {

            echo '<ol>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo "<h2>User ID: " . $row["id"] . "</h2>";
                echo "<p>Username: " . $row["authorusername"] . "</p>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Registration Date: " . $row["registration_date"] . "</p>";
                echo "</li>";
                echo "<hr>"; // a horizontal line to separate user entries
                echo "</li>";
            }
        } else {
            echo "No users found.";
        }
        ?>
    </div>
    </div>
    </div>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

$con->close();
?>
