<?php
// Include your database connection file here
require_once "includes/connect.php";

// Retrieve user data from the database
$sql = "SELECT * FROM author";
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
        /* Your CSS styles for the page */
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

        /* Other CSS styles for your user list */
    </style>
</head>
<body>
    <h1>View Users</h1>
   
    <div class="container">
        <?php
        if ($result && $result->num_rows > 0) {
            // Output data of each user
            while ($row = $result->fetch_assoc()) {
                echo "<h2>User ID: " . $row["id"] . "</h2>";
                echo "<p>Username: " . $row["authorusername"] . "</p>";
                echo "<p>Email: " . $row["authoremail"] . "</p>";
                echo "<p>Registration Date: " . $row["registration_date"] . "</p>";
                // You can add more user information fields here
                echo "<hr>"; // Add a horizontal line to separate user entries
            }
        } else {
            echo "No users found.";
        }
        ?>
    </div>

    <!-- Add Bootstrap JS (Popper.js and jQuery are not needed for this example) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$con->close();
?>
