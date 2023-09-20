<?php
require_once "../includes/connect.php";

if (isset($_GET['articletitle'])) {
   $articletitle = $_GET["articletitle"];

   // Retrieve the blog entry from the database
   $sql = "SELECT * FROM blog_writing WHERE articletitle = '$articletitle'";
   $result = $con->query($sql);

   if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
   } else {
      // No blog entry found
      echo "Blog entry not found.";
      exit();
   }
} else {
   // No articletitle parameter provided
   echo "Invalid request.";
   exit();
}

if (isset($_POST["submit"])) {
    $articletitle = $_POST["articletitle"];
    $authorname = $_POST["authorname"];
    $articletext = $_POST["articletext"];

    $update = "UPDATE blog_writing SET authorname = '$authorname', articletext = '$articletext' WHERE articletitle = '$articletitle'";

    if ($con->query($update) === TRUE) {
        header("Location: ../viewBlogs.php");
        exit();
    } else {
        echo "Error updating blog entry: " . $con->error;
    }
}

?>
    <h1>Edit Blog Entry</h1>
    <form action="update.processes.php" method="POST">
        <input type="hidden" name="articletitle" value="<?php echo $row['articletitle']; ?>">

        <label for="authorname">Author Name:</label>
        <input type="text" name="authorname" id="authorname" value="<?php echo $row['authorname']; ?>" required> <br><br>

        <label for="articletext">Article Text:</label>
        <textarea name="articletext" id="articletext" rows="10" required><?php echo $row['articletext']; ?></textarea> <br><br>

        <input type="submit" name="update" value="Update">
    </form>

</html>
