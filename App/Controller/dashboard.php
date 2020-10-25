<?php
    include "logreg/config.php";
    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])){
        header('location: logreg/login.php');
    }else{
        $user_no_decode = $_COOKIE[$cookie_name];
        $user = base64_decode($user_no_decode);
        $res = $connection->query("SELECT type FROM user WHERE username='$user' LIMIT 10");
        if ($res->num_rows==0){
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



<body>
    <div class = "topnav" >
        <a class="active" href = "#home">Home</a>
<?php
    // echo $user;
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
    echo'
    <table class= "dash-table">
    <tr>
        <td id = "greet"> Hello, '.$user.'</td>
        <td id= "view-choco"> <button type ="button" onclick="showObject(\'hidden-object\'),hideObject(\'view-choco\')">View all chocolate</td>
    </tr>
    </table>'
?>
<?php
$res = $connection->query("SELECT idchocolate,nama, amount_sold, price FROM chocolate ORDER BY amount_sold DESC ");

if($res->num_rows == 0 ){
    echo '<h2>No Chocolate</h2>';
} else{

    while ($row = $res->fetch_assoc()) {
        echo"
            <div class='gallery' >
                <a href='checkuser.php?idchoco=".$row['idchocolate']."'>
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
    echo"<div id ='hidden-object' style = 'display: none;'>";
    if($res->num_rows > 0 ){
        $res = $connection->query("SELECT type FROM user WHERE username='$user' LIMIT 10 OFFSET 10");

        while ( $row = $res->fetch_assoc()){
        
            echo"
                <div class='gallery' >
                    <a href='checkuser.php?idchoco=".$row['idchocolate']."'>
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
    echo"</div>";
}
?>
    </div>
</body>
<script>
    function showObject(id){
    //Menampilkan obyek HTML
    document.getElementById(id).style.display ='block';
    }
    function hideObject(id){
    //Menampilkan obyek HTML
    document.getElementById(id).style.display ='none';
    }
</script>
</html>