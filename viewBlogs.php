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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>View Blogs</h1>
   
    <?php
    if ($result && $result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["articletitle"] . "</h2>";
            echo "<h3>" . "By " . $row["authorname"] . " on " . $row["publicationdate"] . "</h3>";
            echo $row["articletext"];
            echo '[<a href="edit.php?articletitle=' . $row["articletitle"] . '">Edit</a>] ';
            echo '[<a href="delete.php?articletitle=' . $row["articletitle"] . '">Del</a>]';
        }
    }
    ?>
</body>
</html>

<?php
$con->close();
?>
