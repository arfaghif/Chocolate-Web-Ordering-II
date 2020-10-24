<?php
$cookie_name = "user";
    if(isset($_COOKIE[$cookie_name])){
        header('location: ../dashboard.php');
    }
?>
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
                <form method="post" action="" name="login-form">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" placeholder="Type your username here" required><br><br>
                    <label for="psw">Password</label><br>
                    <input type="password" id="psw" name="psw" placeholder="Type your password here" required><br>
                    <div id="message">
                        <?php
                            include('config.php');

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                                $username = $_POST['username'];
                                $password = $_POST['psw'];
                                
                                $res = $connection->query("SELECT password,type FROM user WHERE username='$username'");



                                $hash = mysqli_fetch_array($res);
                            

                                if (password_verify($password,$hash['password'])) {
                                    echo '<p class="success">Login was successful!</p>';
                                    $cookie_name = "user";
                                    $cookie_value = $username;
                                    
                                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
                                    header('location: ../dashboard.php');
                                    
                                }
                                else {
                                    echo '<p class="error">The username or password did not match!</p>';
                                }
                                
                            }
                                
                        ?>
                    </div><br><br><br>
                    <input type="submit" value="Login">
                </form>
            </div>
            
            
        </div>
        
    </body>
</html>