<html>
    <head>
        <title>Willy Wangky Login Page</title>
        <link rel="stylesheet" type="text/css" href="login-style.css">
    </head>
    <body style='text-align:center'>
        <div class="container">
            
            <div id="title-box">
                <h1>Willy Wangky Choco Factory</h1>
            </div>
            <div id="main-box">
                <form method="post" action="" name="register-form">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Type your username here"><br><br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Type your email here"><br><br>
                    <label for="psw">Password</label><br>
                    <input type="password" id="psw" name="psw" placeholder="Type your password here"><br><br>
                    <label for="psw2">Confirm Password</label><br>
                    <input type="password"  id="psw2" name="psw2" placeholder="Retype your password here"><br><br><br>
                    <input type="submit" value="Register">
                </form>
            </div>
            
            
        </div>
        
        
    </body>
</html>

<?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM user WHERE user.email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO user(username,nama,email,password,type) VALUES (:username,:username,:email,:password_hash,1)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
 
?>

