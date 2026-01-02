<?php
// register.php
require 'admin/functions.php';
if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
                alert('Registration successful! Please login.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Registration failed! Please try again.');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serene - Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            
            <div class="header-icon">
                <i class="material-icons">hotel</i>
            </div>

            <h1 class="title">Register</h1>

            <!-- form register -->
            <form id="registerForm" method="POST" action="">
                <input type="hidden" name="role" value="user">
                <input type="hidden" name="location" value="indonesia">
                <div class="form-grid">

                    <div class="form-group">
                        <label for="name">name</label>
                        <div class="input-icon-container">
                            <input type="text" id="name" name="name" placeholder="Enter your Last name" required>
                        </div>
                    </div>

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
                    
                    

                </div>
                
                <button type="submit" name="register" class="register-button">Register</button>
            </form>

            <div class="footer-links">
                <p>Already have account</p>
                <a href="index.php" class="sign-in-link">Sign In</a>
            </div>
        </div>

        <div class="legal-text">
            <p>By signing in, you agree to our</p>
            <a href="#">Terms of Service</a>
            <span>and</span>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <!-- <script src="script/register.js"></script> -->
</body>
</html>