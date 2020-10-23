<?php
    include "logreg/config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>
    <div class = "topnav" >
        <a class="active" href = "#home">Home</a>
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
    <h2>Hello Wanky</h2>
    <p style="text-align: right;">View all chocolates</p>
<?php
$res = $connection->query("SELECT idchocolate,nama, amount_sold, price FROM chocolate ORDER BY amount_sold DESC LIMIT 10");
if($res->num_rows == 0 ){
    echo '<h2>No Chocolate</h2>';
} else{
    while ($row = $res->fetch_assoc()) {
        echo"
            <div class='gallery' >
                <a href='detail_choco.php?idchoco=".$row['idchocolate']."'>
                <img src='phot/".$row['idchocolate'].".jpg' alt='choco 1' width='600' height='400'>
            
                <div class='desc'>
                    <h3>".$row['nama']."</h3>
                    <p>
                        Amount sold : ".$row['amount_sold']."</br>
                        Price : ".$row['price']."
                    </p>
                </div>
                </a>
            </div>";
    }
}
?>
    </div>
</body>