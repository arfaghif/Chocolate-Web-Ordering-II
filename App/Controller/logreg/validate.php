<?php

    include('config.php');
    if (isset($_GET['q'])){
        $username = $_GET['q'];

        
        if (substr($username,-1)=="\\") {
            echo '<p class="error">Invalid character</p>';
        }
        else {
            $result = $connection->query("SELECT * FROM user WHERE username LIKE BINARY '$username'");
            
            if ($result->num_rows > 0) {
                echo '<p class="error">The username is already taken!</p>';
            }
            else {
                echo 'green';
            }
        }
    }
    if (isset($_GET['p'])) {
        $email = $_GET['p'];
        if (substr($email,-1)=="\\") {
            echo '<p class="error">Invalid character</p>';
        }
        else{
            $result = $connection->query("SELECT * FROM user WHERE email LIKE '$email'");
            
            if ($result->num_rows > 0) {
                echo '<p class="error">The email is already registered!</p>';
            }
            else {
                echo 'green';
            }
        }
    }
        
?>