<?php
include "logreg/config.php";
if (isset($_REQUEST['idchoco'])) {

	$idchoco = $_REQUEST['idchoco'];
}else {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>
<?php
echo'
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
    <div class = "choco-name">
            <p>Choclat Enak</p>
            </div>
    ';
    $count_amount = $_REQUEST['totamount'];
    $user = $_COOKIE['user'];
    if($count_amount > 0){
        echo'
        <div class = "buy-succes">
        <h1>Add Amount Produk Success</h1>
        <a href = "dashboard.php">
            <button type = "button">Back to Dashboard</button>
        </a>
        </div>';
        $sql = ("UPDATE chocolate SET amount_remaining='$count_amount' WHERE idchocolate='$idchoco'");
        $connection->query($sql2);

    }else{
        echo'
        <div class = "buy-succes">
        <h1>Transaksi gagal, stok tidak mencukupi</h1>
        <a href = "dashboard.php">
            <button type = "button">Back to Dashboard</button>
        </a>
        </div>';
    }
?>