<?php
require_once "../includes/connect.php";
if(isset($_POST["blogBtn"])){
$name=$_POST["authorname"];
$title=$_POST["articletitle"];
$blogarea=$_POST["writingarea"];
$articleId =$_POST["article_id"];

$existingBlogQuery = "SELECT * FROM blog_writing WHERE article_id = '$articleId'";
$existingBlogResult = $con->query($existingBlogQuery);
if ($existingBlogResult && $existingBlogResult->num_rows > 0) {
    echo "Error: A blog with the same title already exists.";
    exit();
}

$stmt=$con->prepare("INSERT INTO blog_writing(authorname,articletitle,articletext) VALUES(?,?,?)");
$stmt->bind_param("sss",$name,$title,$blogarea);
if($stmt->execute())
{
    header("Location: ../viewBlogs.php");
        exit();
}
else{
    echo "Error: ".$stmt->error;
}
}
$con->close();
?>