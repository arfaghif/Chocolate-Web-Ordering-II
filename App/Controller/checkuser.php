<?php
include "logreg/config.php";
$idchoco = $_GET['idchoco'];
include "logreg/config.php";
    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])){
        header('location: Controller/logreg/login.php');
    }else{
        $user = $_COOKIE[$cookie_name];
        $res = $connection->query("SELECT type FROM user WHERE username='$user'");
        if ($res->num_rows==0){
            setcookie("user", "", time() - 3600,'/');
            header('location: logreg/login.php');
        }
        else{
            $type = mysqli_fetch_array($res);
            $user_type = $type['type'];
            if($user_type == 0 ){
                header('location: add_stock_choco.php?idchoco='. intval($idchoco));
            }else{
                header('location: detail_choco.php?idchoco='.intval($idchoco));
            }
        }
    }