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
    <a  href = "dashboard.php">Home</a>
    <a href="add_new_choco.php">Add New Chocolate</a>
    <a href="logout.php" class= "nav-bar-right">Logout</a>

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
    $res = $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE idchocolate =".$idchoco);
    $row = $res->fetch_assoc();
    $count_amount = base64_decode($_COOKIE['add-amount']);
    $user = $_COOKIE['user'];
    if($count_amount > 0){
        echo'
        <div class = "buy-succes">
        <h1>Add Amount Produk Success</h1>
        <a href = "dashboard.php">
            <button type = "button">Back to Dashboard</button>
        </a>
        </div>';
        $tot_amount = intval($row['amount_remaining']) + intval($count_amount);
        $sql = ("UPDATE chocolate SET amount_remaining='$tot_amount' WHERE idchocolate='$idchoco'");
        $connection->query($sql);

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