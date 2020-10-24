<?php
include('config.php');
$username = $_REQUEST['username'];
$connection->query($sql);
$result = $connection->query("SELECT * FROM user WHERE username='$username'");
if ($result->num_rows==1) {
    echo '<p class="success">Your registration was successful!</p>';
    $cookie_name = "user";
    $cookie_value = $username;
    $encode = base64_encode($cookie_value);
    setcookie($cookie_name, $encode, time() + (86400 * 30), "/"); 
    header('location: ../dashboard.php');
    echo "masuk kelogin";
} else {
    echo '<p class="error">Something went wrong!</p>';
}
?>