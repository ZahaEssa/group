<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for fancier styling */
        body {
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); /* Background gradient */
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff; /* Header background color */
            color: white;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }

        .card-title {
            font-size: 24px;
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff; /* Button background color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Button hover background color */
        }

        /* Additional CSS for input fields */
        .form-control {
            border-radius: 8px;
        }

        /* Navigation links */
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
            font-size: 18px;
            padding: 10px;
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

        /* Login form specific styles */
        .login-container {
            text-align: center;
        }

        .login-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['error'])) {
        $error_message = $_GET['error'];
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <div class="container">
        <div class="card login-form">
            <div class="card-header">
                <h2 class="card-title">Login Form</h2>
            </div>
            <div class="card-body">
                <form action="processes/signinprocess.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Author Username</label>
                        <input type="text" class="form-control" id="username" name="authorusername" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" id="password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="Signin" value="Sign In" class="btn btn-primary btn-block">
                    </div>
                </form>
                <p class="text-center">Don't have an account? <a href="test.php">Sign Up Here</a></p>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></script>
</body>
</html>
