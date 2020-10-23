
<!-- <a class="button" href="controller/transaksi.php">Page 1</a><br>
<a class="button" href="controller/dashboard.php">Page 2</a><br>
<a class="button" href="controller/logreg/register.php">Page register brow</a><br>
<a class="button" href="controller/logreg/login.php">Page login brow</a><br> -->

<?php
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header('location: Controller/logreg/login.php');
}else{
    header('location: Controller/dashboard.php');
}
?>