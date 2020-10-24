<?php
$cookie_name = "user";
    if(isset($_COOKIE[$cookie_name])){
        header('location: Controller/dashboard.php');
    }else{
        header('location: Controller/logreg/login.php');
    }
?>