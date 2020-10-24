<?php
    include "logreg/config.php";
    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])){
        header('location: logreg/login.php');
    }else{
        $user = $_COOKIE[$cookie_name];
        $res = $connection->query("SELECT type FROM user WHERE username='$user'");
        if ($res->num_rows==0){
            setcookie("user", "", time() - 3600,'/');
            header('location: logreg/login.php');
        }
        else{
            $type = mysqli_fetch_array($res);
            $user_type = $type['type'];
            if($user_type!=1){
                header('location: dashboard.php');
            }
        }
    }

$res = $connection->query("SELECT  nama,idchocolate, amount, total_price,time,address FROM chocolate NATURAL JOIN transaksi WHERE username LIKE '".$user."' ORDER BY time DESC");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> History </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>

    <div class = "topnav">
        <a href = "dashboard.php">Home</a>
        <a class= "active" href="#history">History</a>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
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