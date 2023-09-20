<?php
require_once "../includes/connect.php";

if (isset($_POST["update"])) {
    $articleId =$_POST["article_id"];
    $articletitle = $_POST["articletitle"];
    $authorname = $_POST["authorname"];
    $articletext = $_POST["articletext"];

    $update = "UPDATE blog_writing SET articletitle = '$articletitle', authorname = '$authorname', articletext = '$articletext' WHERE article_id = '$articleId' LIMIT 1";

    if ($con->query($update) === TRUE) {
        header("Location: ../viewBlogs.php");
        exit();
    } else {
        echo "Error: " . $update . "<br>" . $con->error;
    }
}
?>
