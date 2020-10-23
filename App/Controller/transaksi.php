<?php
include "logreg/config.php";
$res = $connection->query("SELECT  nama,idchocolate, amount, total_price,time,address FROM chocolate NATURAL JOIN transaksi WHERE username LIKE 'matsu' ORDER BY time DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> History </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>
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
    $res = $conn->query("SELECT  nama, amount, total_price,time,address FROM chocolate NATURAL JOIN transaksi WHERE username LIKE 'matsu'");
    
    // echo $res->num_rows;
    // while ($row = $res->fetch_assoc()) {
    //   echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    // }
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
?>
    <div class = "topnav">
        <a href = "dashboard.php">Home</a>
        <a class= "active" href="#history">History</a>
        <a href="logout" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>
    
    <div class="page">
        <h2>Transaction History</h2>
        <table>

                <tr>
                    <th>Chocolate Name</th>
                    <th>Amount</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>TIme</th>
                    <th>Address</th>
                </tr>
<?php
// echo $res->num_rows;
    while ($row = $res->fetch_assoc()){
                $datetime = new DateTime($row['time']);

                $date = $datetime->format('d-m-y');
                $time = $datetime->format('H:i:s');
                
               echo 
               '<tr>
                                      
                    <td><a href="detail_choco.php?idchoco='.$row['idchocolate'].'">  '.$row['nama'].'</a></td>
                    
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['total_price'].'</td>
                    <td>'.$date.'</td>
                    <td>'.$time.'</td>
                    <td>'.$row['address'].'</td>
                </td>';
    }
?>
            </table>
        </div>
</body>