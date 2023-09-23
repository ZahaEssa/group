<?php
require_once "includes/connect.php";
session_start();
if (!isset($_SESSION['data'])) {
    header('Location: signin.php');
    exit();
}
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
             background: linear-gradient(135deg, #c3e0dc, #a8d8e6); 
            font-family: Arial, sans-serif;
            
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
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 36px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 20px;
            margin: 0;
            border-radius: 0;
        }

        h2 {
            font-size: 28px;
            margin-top: 20px;
            color: #333;
        }

        h3 {
            font-size: 24px;
            color: #555;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
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
            border-radius: 10px;
            transition: box-shadow 0.3s;
            background: white;
        }

        .blog-entry:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .delete-button,
        .edit-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 10px;
            margin-right: 10px;
            font-weight: bold;
            text-align: right;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .edit-button {
            background-color: #28a745;
            color: white;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        .edit-button:hover,
        .delete-button:hover {
            background-color: #0056b3;
            text-decoration: none;
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
            
            <h1 class="card-title">View Blogs</h1>
            <div class="card-body">
    <?php
    if ($result && $result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="blog-entry">';
            echo "<h2>" . $row["articletitle"] . "</h2>";
            echo "<h3>" . "By " . $row["authorname"] . " on " . $row["publicationdate"] . "</h3>";
            echo "<p>" . $row["articletext"] . "</p>";
            echo '<button class="edit-button" onclick="location.href=\'processes/edit.php?article_id=' . $row["article_id"] . '\'">Edit</button>';
            ?><a class="delete-button" href="processes/delete.php?article_id=<?php echo $row['article_id']; ?>" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
       <?php echo "</div>";
        }
    }
    ?>
    </div>
    </div>
    </div>
    </div>

</body>
</html>

<?php
$con->close();
?>
