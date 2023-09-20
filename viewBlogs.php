<?php
require_once "includes/connect.php";

// Retrieve blog entries from the database
$sql = "SELECT * FROM blog_writing ORDER BY publicationdate DESC LIMIT 4";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Blogs</title>
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

        h3 {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        .blog-entry {
            margin-bottom: 40px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            transition: box-shadow 0.3s;
        }

        .blog-entry:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

.edit-button,
.delete-button {
    display: inline-block;
    padding: 6px 10px; 
    font-size: 14px; 
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
    font-weight: bold;
    text-align: right;
    text-decoration: none;
    transition: background-color 0.3s;
    margin-top: 10px;
}

.edit-button:hover,
.delete-button:hover {
    background-color: #0056b3; 
    text-decoration: none;
}

    </style>
</head>
<body>

<div class="nav-section">
        <div class="float-left">
            <a href="blogsubmission.php">Blog Submission</a>
            <a href="viewUsers.php">View Users</a>
        </div>
        <div class="float-right">
            <a class="btn btn-link" href="processes/signOut.php">Sign Out</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <h1>View Blogs</h1>
   
    <?php
    if ($result && $result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["articletitle"] . "</h2>";
            echo "<h3>" . "By " . $row["authorname"] . " on " . $row["publicationdate"] . "</h3>";
            echo $row["articletext"]; ?> <br> 
            <?php
            echo '<button class="edit-button" onclick="location.href=\'processes/edit.php?article_id=' . $row["article_id"] . '\'">Edit</button>';
            echo '<button class="delete-button" onclick="location.href=\'processes/delete.php?article_id=' . $row["article_id"] . '\'">Delete</button>';
            
        }
    }
    ?>
</body>
</html>

<?php
$con->close();
?>
