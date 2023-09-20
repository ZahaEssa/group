<?php
require_once "../includes/connect.php";

if (isset($_GET['article_id'])) {
    $articleId = $_GET["article_id"];

   // Retrieve the blog entry from the database
   $sql = "SELECT * FROM blog_writing WHERE article_id = '$articleId'";
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

    $update = "UPDATE blog_writing SET authorname = '$authorname', articletext = '$articletext', articletitle = '$articletitle' WHERE article_id = '$articleId'";

    if ($con->query($update) === TRUE) {
        header("Location: ../viewBlogs.php");
        exit();
    } else {
        echo "Error updating blog entry: " . mysqli_error($con);
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Blog Entry</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        body {
            margin: 20px;
            padding: 50px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); 
        }

        h1 {

            font-size: 28px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            border-radius: 0;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
        }

        input[type="submit"]:hover {
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

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="card">
            
            <h1 class="card-title">Edit Blog</h1>
            <div class="card-body">
    <form action="update.processes.php" method="POST">
        <input type="hidden" name="article_id" value="<?php echo $row['article_id']; ?>">

    <label for="articletitle">Article Title:</label>
        <input type="text" name="articletitle" value="<?php echo $row['articletitle']; ?>">

        <label for="authorname">Author Name:</label>
        <input type="text" name="authorname" id="authorname" value="<?php echo $row['authorname']; ?>" required> <br><br>

        <label for="articletext">Article Text:</label>
        <textarea name="articletext" id="articletext" rows="10" required><?php echo $row['articletext']; ?></textarea> <br><br>

        <input type="submit" name="update" value="Update">
    </form>
    </div>
    </div>
    </div>
</body>
</html>
