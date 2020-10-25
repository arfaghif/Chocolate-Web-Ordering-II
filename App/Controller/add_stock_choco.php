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
        <title> Add Stock Choco </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>
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
<?php
    $res = $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE idchocolate =".$idchoco);
    $row = $res->fetch_assoc();
    echo '

    <div class="page">
        <div class = "container-chocodetail">
            <div class = "choco-name">
            <h2>Choco Detail</h2>
            </div>
            <div class = "chocodetail">
                <div class="list-image" id = "chocodetail">
                    <img src="phot/'.$idchoco.'.jpg" alt="choco 1" width="600" height="400">
                    <div class="details" id = "details-choco">
                        <h3>'.$row['nama'].'</h3>
                        <p>
                            Amount sold : '.$row['amount_sold'].' </br>
                            Price : '.$row['price'].' </br>
                            Amount Remaiing : '.$row['amount_remaining'].'</br>
                            Description :</br>
                            '.$row['description'].'</br>

                        </p>
                    </div>
                </div>
                <a href = "add_amount_choco.php?idchoco='.$idchoco.'" class = "a-btn">
                <button type = "button" class = "btn-buy">Add</button>
                </a>
            </div>

        </div>
    </div>

</body>';
?>