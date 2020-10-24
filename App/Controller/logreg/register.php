<?php
$cookie_name = "user";
    if(isset($_COOKIE[$cookie_name])){
        header('location: ../dashboard.php');
    }
?>


<html>
    <head>
        <title>Willy Wangky Register Page</title>
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
                    <input type="text" id="username" name="username" pattern="^[a-zA-Z0-9_?]+$" onkeyup="checkUser(this.value)" placeholder="Type your username here" required>
                    <div id="user_message"></div><br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" onkeyup="checkEmail(this.value)" placeholder="Type your email here" required><br>
                    <div id="email_message"></div><br>
                    <label for="psw">Password</label><br>
                    <input type="password" id="psw" name="psw" placeholder="Type your password here" onkeyup="pass_matcher()" required><br><br>
                    <label for="psw2">Confirm Password</label><br>
                    <input type="password"  id="psw2" name="psw2" placeholder="Retype your password here" onkeyup="pass_matcher()" required><br>
                    <div id="pass_message">
                        <?php
                            include('config.php');

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['psw'];
                                $confirm_pass = $_POST['psw2'];
                                
                                if ($password!=$confirm_pass) {
                                    echo '<p class="error">Password did not match!</p>';
                                }
                                else {
                                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                                    $result = $connection->query("SELECT * FROM user WHERE (email='$email' or username='$username')");


                                    if ($result->num_rows > 0) {
                                        echo '<p class="error">The username or email address is already registered!</p>';
                                    }
                                
                                    if ($result->num_rows == 0) {
                                       echo 'masuk ke tidak eror';
                                        $sql = ("INSERT INTO user(username,nama,email,password,type) VALUES ('$username','$username','$email','$password_hash',1)");
                                        $connection->query($sql);

                                        $result = $connection->query("SELECT * FROM user WHERE username='$username'");

                                        if ($result->num_rows==1) {
                                            echo '<p class="success">Your registration was successful!</p>';
                                            $cookie_name = "user";
                                            $cookie_value = $username;
                                            $encode = base64_encode($cookie_value);
                                            setcookie($cookie_name, $encode, time() + (86400 * 30), "/"); 
                                            header('location: ../dashboard.php');
    
                                        } else {
                                            echo '<p class="error">Something went wrong!</p>';
                                        }
                                    }
                                }
                                        

                                
                            }
                                
                        ?>
                    </div><br><br><br>
                    <input type="submit" value="Register">
                </form>
                <p id="switch-page">Already have an account? <a href="login.php"><u>Login</u></a></p>
            </div>
            
            
        </div>
        

    </body>
    <script type="text/javascript">
    function pass_matcher() {
        pass = document.getElementById("psw").value;
        cpass = document.getElementById("psw2").value;
        if (pass==cpass){
            document.getElementById("pass_message").innerHTML="match!";
            document.getElementById("pass_message").style.color="green";
            document.getElementById("psw2").style.border="4px solid green";
        }
        else {
            document.getElementById("pass_message").innerHTML="Password must match";
            document.getElementById("pass_message").style.color="red";
            document.getElementById("psw2").style.border="1px solid black";

        }   
    }
    function checkUser(str) {
        if (str == "") {
            document.getElementById("pass_message").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("user_message").innerHTML = this.responseText;
                    
                    if (this.responseText=="green") {
                        if (str!="") {
                            document.getElementById("username").style.border="4px solid green";
                            document.getElementById("user_message").innerHTML = "";
                        }
                        else {
                            document.getElementById("username").style.border="1px solid black";
                        }
                    }
                    else {
                        document.getElementById("username").style.border="1px solid black";
                        document.getElementById("user_message").innerHTML = this.responseText;   
                    }
                }
            };
            xmlhttp.open("GET","validate.php?q="+str,true); 
            xmlhttp.send();

        }
    }
    function checkEmail(str) {
        if (str == "") {
            document.getElementById("email_message").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("user_message").innerHTML = this.responseText;
                    
                    if (this.responseText=="green") {
                        if (str!="") {
                            document.getElementById("email").style.border="4px solid green";
                            document.getElementById("email_message").innerHTML = "";
                        }
                        else {
                            document.getElementById("email").style.border="1px solid black";
                        }
                    }
                    else {
                        document.getElementById("email").style.border="1px solid black";
                        document.getElementById("email_message").innerHTML = this.responseText;   
                    }
                }
            };
            xmlhttp.open("GET","validate.php?p="+str,true); 
            xmlhttp.send();

        }
    }
</script>

</html>

