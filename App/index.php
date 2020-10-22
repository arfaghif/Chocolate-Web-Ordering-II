<?php // App.php
// ini buat router urlnya jadi berfungsi buat server
//profil.php itu controller buat ngatur request sama responenya
/*
switch ($_SERVER["REQUEST_URI"]){

case "/profil":
  include("Controller/profil.php");
  break;
case "/home":
  echo "Ini halaman Home";
  break;
default:
  echo "404: Halaman tidak ditemukan";
}
*/
  echo ('<p>HELLO WORLD</p>');
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "choc";
  $conn =  new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";


?>