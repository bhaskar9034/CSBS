<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Login Page</title>
    <style>
        body {
            background-image: url('LOGIN.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(173, 216, 230, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .signup-link {
            margin-top: 10px;
        }

        .notification {
            background-color: #ff9999;
            padding: 10px;
            text-align: center;
            width: 100%;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="post" action="login2.php">
            <h1>DIGITAL LIBRARY</h1>
            <div class="notification">
                <!-- Place your notification message here -->
                Your notification message goes here.
            </div>
            <div class="input-group">
                <label for="REG">REG:</label>
                <input type="text" id="REG" name="REG" />
            </div>

            <div class="input-group">
                <label for="PASSWORD">PASSWORD:</label>
                <input type="password" id="PASSWORD" name="PASSWORD" />
            </div>
            <div class="input-group">
                <button type="submit" class="btn
