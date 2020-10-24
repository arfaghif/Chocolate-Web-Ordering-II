<?php
include "logreg/config.php";

$search = $_GET['search'];
$offset = $_GET['offset'];
// echo "SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE nama LIKE '%".$search."%' ORDER BY amount_sold DESC,idchocolate LIMIT 3 OFFSET ".$offset;
$res =  $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE nama LIKE '%".$search."%' ORDER BY amount_sold DESC,idchocolate LIMIT 3 OFFSET ".$offset);

if($res->num_rows == 0 ){
    echo '<h2>No Result</h2>';
} else{
   $i = $res->num_rows;
   while ($row = $res->fetch_assoc()){
   echo'
       <div class="list-image">
           <a  href="checkuser.php?idchoco='.$row['idchocolate'].'">
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