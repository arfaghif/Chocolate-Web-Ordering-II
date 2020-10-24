<?php
$cookie_name = "user";
    if(isset($_COOKIE[$cookie_name])){
        setcookie("user", "", time() - 3600,'/');
        header('location: logreg/login.php');
    }

?>