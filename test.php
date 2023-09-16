<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMAIL VERIFICATION</title>
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
            background-color: #007BFF; 
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
        }

        
        input[type="text"],
        input[type="email"] {
            border-radius: 8px;
        }

        
        h2 {
            font-size: 24px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            border-radius: 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            
            <h2>Email Verification</h2>
            <div class="card-body">
                <form action="processes/mail2.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Send" name="send" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
