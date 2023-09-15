<?php
require_once "includes/connect.php";

if (isset($_POST["update"])) {
    $articletitle = $_POST["articletitle"];
    $newTitle = $_POST["newTitle"]; //In this updated code, I introduced a new variable $newTitle which represents the updated value for the articletitle column.
    $authorname = $_POST["authorname"];
    $articletext = $_POST["articletext"];

    $update = "UPDATE blog_writing SET articletitle = '$newTitle', authorname = '$authorname', articletext = '$articletext' WHERE articletitle = '$articletitle' LIMIT 1";

    if ($con->query($update) === TRUE) {
        header("Location: viewBlogs.php");
        exit();
    } else {
        echo "Error: " . $update . "<br>" . $con->error;
    }
}
?>
