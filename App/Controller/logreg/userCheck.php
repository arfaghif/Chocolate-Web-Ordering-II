<?php

    include('config.php');
    if (isset($_GET['q'])){
        $username = $_GET['q'];

        $result = $connection->query("SELECT * FROM user WHERE username LIKE BINARY '$username'");
        
        if ($result->num_rows > 0) {
            echo '<p class="error">The username is not unique!</p>';
        }
        else {
            echo 'green';
        }
    }
        
?>