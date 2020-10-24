<?php
include "logreg/config.php";
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header('location: logreg/login.php');
}else{
    $user = $_COOKIE[$cookie_name];
    $res = $connection->query("SELECT type FROM user WHERE username='$user'");
    if ($res->num_rows==0){
        setcookie("user", "", time() - 3600,'/');
        header('location: logreg/login.php');
    }
}

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $res =  $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE nama LIKE '%".$search."%' ORDER BY amount_sold DESC, idchocolate LIMIT 3");
}
else{
    header("Location: localhost:8000/controller/dashboard.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>
    <div class = "topnav">
        <a href = "dashboard.php">Home</a>
        <a href="transaksi.php">History</a>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>

    <div class="page">
    <div id= "list-search-result">
 <?php 
//  
 if($res->num_rows == 0 ){
     echo '<h2>No Result</h2>';
} else{
    
    while ($row = $res->fetch_assoc() ){
    echo'
        <div class="list-image">
            <a  href="detail_choco.php?idchoco='.$row['idchocolate'].'">
            <img src="phot/'.$row["idchocolate"].'.jpg" alt="choco 1">
     
            <div class="details">
            <h3>'.$row["nama"].'</h3>
            <p>
                Amount sold : '.$row['amount_sold'].' </br>
                Price : '.$row["price"].' </br>
                Amount REMAINING : '.$row["amount_remaining"].'</br>
                Description :</br>
                '.$row['description'].'</br>

            </p>
            </div>
            </a>
        </div>';
    }

 
 
    echo "</div>";
    $res =  $connection->query("SELECT idchocolate FROM chocolate WHERE nama LIKE '%".$search."%'");
    $i = $res->num_rows;
    if ($i > 3){
        $page = 1;
        $offset = ($page-1) *3;
        echo
        "<div class = 'pagination'>
            <span> Page </span>";
        while ($i>0){
            echo"
            <button type ='button' onclick = 'openPage(\"".$search."\",".$offset.")'>".$page."</button>";
            $i = $i -3;
            $page = $page +1;
            $offset = ($page-1)*3;
        }
        echo
        "</div>";
        
    }
}   
        
?>

<script>
function openPage(search,offset) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("list-search-result").innerHTML =this.responseText;
    }
  };
  xhttp.open("GET", "getsearch.php?offset="+offset+"&search="+search, true);
  xhttp.send();
}
</script>


    </div>
</body>