<?php 
session_start();
require 'admin/functions.php';

if(isset($_POST["login"])) {
    login($_POST);
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serene - Sign In</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="login-container">
        <div class="login-card">
            
            <div class="header-icon">
                <i class="material-icons">hotel</i>
            </div>

            <h1 class="title">Sign In</h1>
            <p class="subtitle">Welcome back to your booking account</p>

            <!-- login form -->
            <form id="loginForm" method="POST" action="">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-icon-container">
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <i class="material-icons input-icon-right">mail_outline</i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon-container">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <i class="material-icons input-icon-right toggle-password" onclick="togglePasswordVisibility()">visibility_off</i>
                    </div>
                </div>

                <a href="#" class="forgot-password">Forgot Password?</a>

                <button type="submit" name="login" class="sign-in-button">Sign In</button>
            </form>

            <div class="footer-links">
                <p>Don't have an account?</p>
                <a href="register.php" class="create-account">Create Account</a>
            </div>
        </div>

        <div class="legal-text">
            <p>By signing in, you agree to our</p>
            <a href="#">Terms of Service</a>
            <span>and</span>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <!-- <script src="script/index.js"></script> -->
</body>
</html>