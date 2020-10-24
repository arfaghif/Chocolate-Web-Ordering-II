<?php
    include "logreg/config.php";
    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])){
        header('location: Controller/logreg/login.php');
    }else{
        $user = $_COOKIE[$cookie_name];
        $res = $connection->query("SELECT type FROM user WHERE username='.$user.'");
        if ($res->num_rows>0){
            setcookie("user", "", time() - 3600,'/');
            header('location: logreg/login.php');
            
        }
        else{
            $type = mysqli_fetch_array($res);
            $user_type = $type['type'];
        }
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
    <div class = "topnav" >
        <a class="active" href = "#home">Home</a>
<?php
    if ($user_type == 1){
        echo 
    
        '<a href="transaksi.php">History</a>';
    }else {
        echo 
    
        '<a href="add_new_choco.php">Add New Chocolate</a>';
    }
?>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>
    <div class="page">
<?php
    echo "<h2>Hello ".$_COOKIE[$cookie_name]."</h2>";
?>
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