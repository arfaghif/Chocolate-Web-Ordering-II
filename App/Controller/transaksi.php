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
    $res = $conn->query("SELECT  nama, amount, total_price,time,address FROM chocolate, transaksi WHERE chocolate.idchocolate = transaksi.idchocolate AND transaksi.username LIKE 'matsu'");
    
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
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><img src="icon/search.png" alt="submit"></i></button>
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
                    <td>'.$row['nama'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['total_price'].'</td>
                    <td>'.$date.'</td>
                    <td>'.$time.'</td>
                    <td>'.$row['address'].'</td>
                </td>';
    }
?>
<!-- 
                <tr>
                    <td>Choco 2</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 3</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 4</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 5</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 6</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 7</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 8</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 9</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 10</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 11</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td>

                <tr>
                    <td>Choco 12</td>
                    <td>3</td>
                    <td>3000000</td>
                    <td>17 - 06 - 2020</td>
                    <td>23.59</td>
                    <td>Jalan tersesat</td>
                </td> -->
            </table>
        </div>
</body>