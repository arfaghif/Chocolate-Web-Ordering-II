<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "choc";
// try {
    // asumsi database test udah ada
    $conn =  new mysqli($servername, $username, $password, $database);
    
    // misal database belum ada, jalanin query ini:
    // $conn = new mysqli($servername, $username, $password);
    // $isCreated = $conn->query("CREATE DATABASE $database");
    // echo isCreated ? "db created successfully" : "db not created (already there or error occured)";
     
    // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    // $conn->query($sql);
    $res = $conn->query("SELECT idchocolate,nama, amount_sold, price FROM chocolate");
    // echo $res->num_rows;
    // while ($row = $res->fetch_assoc()) {
    //   echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    // }
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
?>
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
while ($row = $res->fetch_assoc()) {
    echo"<div class='gallery' >
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
        </div>
    ";
}
?>
</body>