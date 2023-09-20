<?php
require_once "../includes/connect.php";

if (isset($_GET['article_id'])) {
    $articleId = $_GET["article_id"];
    $sql = "DELETE FROM blog_writing WHERE article_id = '$articleId'"; 
    $result = $con->query($sql);

    if ($result) {
        // Deletion successful
        header("Location: ../viewBlogs.php");
        exit();
    } else {
        echo "Error deleting entry: " . $con->error; 
    }
    $con->close();
}
?>
