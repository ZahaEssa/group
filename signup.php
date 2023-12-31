<?php
require_once "includes/connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); 
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
            background-color: #007bff; 
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
            color:white;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Sign Up</h1>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center">It's free and only takes a minute</h4>
                        <?php
                        $id = isset($_GET["id"]) ? $_GET["id"] : null; // Check if 'id' is set in $_GET
                        $action = "processes/register.php?id=" . $id;
                        ?>
                       <form action="<?php echo $action; ?>" method="POST" autocomplete="off">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Please enter your username" name="username" required>
    </div>
    <div class="form-group">
        
    </div>
    <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" id="pass" placeholder="Please enter your password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirmedpassword">Password Confirmation</label>
        <input type="password" class="form-control" id="confirmedpassword" placeholder="Please enter your password again" name="confirmpass" required>
    </div>
    <div class="form-group text-center">
        <button type="submit" name="registrationBtn" class="btn btn-primary btn-block">Sign Up</button>
    </div>
</form>

                        <p class="text-center">
                            By clicking on the Sign Up button, you agree to our<br />
                            <a href="#">Terms and Conditions</a> and <a href="#">Policy And Privacy</a>
                        </p>
                        <p class="text-center">Already have an account? <a href="signin.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Popper.js and jQuery are not needed for this example) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
