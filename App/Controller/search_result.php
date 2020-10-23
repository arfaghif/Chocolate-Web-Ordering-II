<?php
include "logreg/config.php";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $res =  $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE nama LIKE '%".$search."%'");
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
        <a href="logout" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>

    <div class="page">
 <?php 
//  echo $res->num_rows;
 if($res->num_rows == 0 ){
     echo '<h2>No Result</h2>';
} else{
    while ($row = $res->fetch_assoc()){
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

 }
 ?>
    

    </div>
</body>