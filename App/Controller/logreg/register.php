<script type="text/javascript">
    function pass_matcher() {
        pass = document.getElementById("psw").value;
        cpass = document.getElementById("psw2").value;
        if (pass==cpass){
            document.getElementById("message").innerHTML="match!";
            document.getElementById("message").style.color="green";
        }
        else {
            document.getElementById("message").innerHTML="Password must match";
            document.getElementById("message").style.color="red";
            document.getElementById("message").style.border="2px solid red";
            document.getElementById("username").style.border="4px solid green";


        }   
    }
    function showUser(str) {
        if (str == "") {
            document.getElementById("message").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("message1").innerHTML = this.responseText;
                    
                    if (this.responseText=="green") {
                        if (str!="") {
                            document.getElementById("username").style.border="4px solid green";
                            document.getElementById("message1").innerHTML = "";
                        }
                        else {
                            document.getElementById("username").style.border="1px solid black";
                        }
                    }
                    else {
                        document.getElementById("username").style.border="1px solid black";
                        document.getElementById("message1").innerHTML = this.responseText;   
                    }
                }
            };
            xmlhttp.open("GET","userCheck.php?q="+str,true); 
            xmlhttp.send();

        }
    }
</script>
/*
Pengecekan keunikan nilai field dilakukan menggunakan AJAX. Jika unik, border field akan berwarna hijau.
Jika tidak unik, akan muncul pesan error pada form.
Validasi lain yang dilakukan pada sisi klien pada halaman ini adalah:

Email memiliki format email standar seperti “example@example.com”.
Username hanya menerima kombinasi alphabet, angka, dan underscore.*/

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
                    <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" onkeyup="showUser(this.value)" placeholder="Type your username here" required>
                    <div id="message1">

                    </div><br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Type your email here" required><br><br>
                    <label for="psw">Password</label><br>
                    <input type="password" id="psw" name="psw" placeholder="Type your password here" required><br><br>
                    <label for="psw2">Confirm Password</label><br>
                    <input type="password"  id="psw2" name="psw2" placeholder="Retype your password here" onkeyup="pass_matcher()" required><br>
                    <div id="message">
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
                                       
                                        $sql = ("INSERT INTO user(username,nama,email,password,type) VALUES ('$username','$username','$email','$password_hash',1)");
                                        $connection->query($sql);

                                        $result = $connection->query("SELECT * FROM user WHERE username='$username'");

                                        if ($result->num_rows==1) {
                                            echo '<p class="success">Your registration was successful!</p>';
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
            </div>
            
            
        </div>
        

    </body>

</html>

