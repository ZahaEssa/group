<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/signin.css">
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            $error_message = $_GET['error'];
            echo "<p style='color: red;'>$error_message</p>";
        }
        ?>
        <div class="container">
            <img src="Images/home-bg-2.jpg"/>
            <div class="content">
                <h2>Login Form</h2>
                <form action="processes/signinprocess.php" method="POST" autocomplete="off">

                    <label for="username">Author Username</label>
                    <input type="text" id="username" name="authorusername" placeholder="Enter your username" required><br>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" id="password" required><br>

                    <input type="submit" name="Signin" value="Sign In">

                </form>

                <p>Don't have an account? <a href="SignUp.php">Sign Up Here</a></p>

            </div>
        </div>
        
    </body>
</html>
