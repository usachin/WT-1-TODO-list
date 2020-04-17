<?php
    $errors="";

    $db=mysqli_connect('localhost','root','','login');
    // insert a quote if submit button is clicked
    if (isset($_POST['submit'])) {
            $uname=$_POST['username'];
            $password=$_POST['password'];
        if (empty($uname)) {
            $errors = "You Must Fill Username";
        }else{
            
            $uname = $_POST['username'];
            $password = $_POST['password'];
            $query = "INSERT INTO login (user) VALUES ('$uname')";
            $sql = "INSERT INTO loginfom (user,pass) VALUES ('$uname','$password')";
            mysqli_query($db,$sql);
            
            
            header('location: login.php');
        }
    }   

    

  ?>



<html>
<head>
    <title> Register Form </title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">   
</head>
    <body>
    <div class="login-box">
    <img src="avatar1.png" alt="login_img" class="avatar">
        <h1>Register Here</h1>
            <form method="post" action="#">
                <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php } ?>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username...." required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password...." required>
            <input type="submit" name="submit" value="SignUp">
            <a href="#">Forget Password</a>    
            <a href="homepage.html" class="h">Home Page</a>
            </form>
        
        
        </div>
    
    </body>
</html>