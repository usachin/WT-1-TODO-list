<?php
    require 'config.php';
            
    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "select * from loginfom WHERE user = '$username' AND pass = '$password'";
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run) >0){
            echo " You Have Successfully logged in";
            header('location:index.php');

        }
        
        else{
             echo'<script type="text/javascript">alert("Invalid Credentials !")</script>';
        }
    }
            
?>


<html>
<head>
    <title> Login Form </title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">   
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" alt="login_img" class="avatar">
        <h1>Login Here</h1>
            <form method="POST" action="#">
            <p>Username</p>
            <input type="text" id="username" name="username" placeholder="Enter Username"  required>
            <p>Password</p>
            <input type="password" id = "password" name="password" placeholder="Enter Password"  required>
            <input type="submit" name="submit" value="Login">
            <a href="loginform.php" class="b">New user</a>
            <a href="#">Forget Password</a>    
            <a href="homepage.html">Homepage</a>
            </form>
        
        
        </div>
    
    </body>
</html>