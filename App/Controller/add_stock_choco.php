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
    $res = $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE idchocolate =".$idchoco);
    $row = $res->fetch_assoc();
    echo '
<body>
    <div class = "topnav" >
        <a class="active" href = "#home">Home</a>
        <a href="#history">History</a>
        <a href="logout" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><img src="icon/search.png" alt="submit"></i></button>
            </form>
        </div>
    </div>

    <div class="page">
        <div class = "container-chocodetail">
            <div class = "choco-name">
            <p>Choclat Enak</p>
            </div>
            <div class = "chocodetail">
                <div class="list-image" id = "chocodetail">
                    <img src="phot/2.jpg" alt="choco 1" width="600" height="400">
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
                <button type = "button" class = "btn-buy">Add Stock</button>
            </div>

        </div>
    </div>

</body>';
?>