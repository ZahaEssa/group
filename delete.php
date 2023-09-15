<?php
require_once "includes/connect.php";

if (isset($_GET['articletitle'])) {
    $articletitle = $_GET["articletitle"];
    $sql = "DELETE FROM blog_writing WHERE articletitle = '$articletitle'"; 
    $result = $con->query($sql);

    if ($result) {
        // Deletion successful
        header("Location: viewBlogs.php");
        exit();
    } else {
        echo "Error deleting entry: " . $con->error; 
    }
    $con->close();
}
?>
