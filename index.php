<?php
require_once "includes/connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
            background: linear-gradient(135deg, #c3e0dc, #a8d8e6); /*Background gradient */
            background-image: url("images/retrosupply-jLwVAUtLOAQ-unsplash.jpg"); /* Set the background image */
            background-size: cover; /*Ensure the image covers the entire viewport */
            background-repeat: no-repeat; /* Prevent image repetition */
            background-attachment: fixed; /* Keep the background fixed while scrolling */
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
            background-color: #333; /* Header background color */
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

<body>

        </div>
        <div class="clearfix"></div>
    </div> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">New User?</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center">
                            Verify your <a href="test.php">Email here</a><br />
                            <p class="text-center">Already have an account? <a href="signin.php">Login here</a></p>
                            <p class="text-center"> <a href="#">Terms and Conditions</a> and <a href="#">Policy And Privacy</a></p>
                        </p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
