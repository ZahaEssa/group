<?php
require_once "includes/connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog Submission Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for the form */
        body {
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); /* Background gradient */
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #007BFF; /* Button background color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Button hover background color */
        }

        .btn-secondary {
            background-color: #6c757d; /* Button background color */
            border: none;
        }

        .btn-secondary:hover {
            background-color: #4d545c; /* Button hover background color */
        }

        /* Adjust the textarea height to cover the entire form */
        textarea {
            height: 150px;
        }

        /* Style the title to match the "Sign Up" form */
        .card-title {
            font-size: 24px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            border-radius: 0;
            padding: 20px;
        }

        /* Navigation section styles */
        .nav-section {
            background-color: #333;
            padding: 20px;
            
            text-align: center;
            color: white;
        }

        .nav-section a {
            display: inline-block;
            margin-right: 20px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px; /* Increase font size */
            padding: 10px; /* Add padding for better hover effect */
            transition: background-color 0.3s; /* Smooth hover effect */
        }

        .nav-section a:last-child {
            margin-right: 0;
        }

        .nav-section a:hover {
            background-color: #007BFF; /* Hover background color */
            text-decoration: none;
            color:white;
        }
    </style>
</head>

<?php
session_start();
if(isset($_SESSION["data"])){
?>
    <?php print "Welcome " . $_SESSION["data"]["authorname"]; ?>
    <a class="btn btn-link" href="processes/signOut.php">Sign Out</a>
    <?php
}
?>

<body>
    <!-- Navigation section with links -->
    <div class="nav-section">
        <div class="float-left">
            <a href="blogsubmission.php">Blog Submission</a>
            <a href="viewBlogs.php">View Blogs</a>
            
        </div>
        <div class="float-right">
            <a class="btn btn-link" href="processes/signOut.php">Sign Out</a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="container">
        <div class="card">
            <!-- Updated title style -->
            <h1 class="card-title">Blog Submission</h1>
            <div class="card-body">
                <form action="blogentry.php" method="POST" autocomplete="off" id="blogForm">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Please enter your full name" name="authorname" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Please enter the title of the blog" name="articletitle" required>
                    </div>
                    <div class="form-group">
                        <label for="article">Blog Writing Area</label>
                        <textarea class="form-control" id="article" name="writingarea" placeholder="Write your blog here..." required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="blogBtn" value="Submit Blog" class="btn btn-primary">
                        <input type="reset" value="Reset Form" class="btn btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Popper.js and jQuery are not needed for this example) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
