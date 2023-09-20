<?php

require_once "includes/connect.php";

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
            margin: 20px;
            padding: 50px;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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

    </style>
    
</head>
<body>

<div class="nav-section">
        <div class="float-left">
            <a href="blogsubmission.php">Blog Submission</a>
            <a href="viewBlogs.php">View Blogs</a>
        </div>
        <div class="float-right">
            <a class="btn btn-link" href="processes/signOut.php">Sign Out</a>
        </div>
        <div class="clearfix"></div>
    </div>

    <h1>View Users</h1>

    <div class="container">
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

 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

$con->close();
?>
