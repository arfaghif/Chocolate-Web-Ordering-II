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
    echo $res->num_rows;
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
    <h2>Hello Wanky</h2>
    <p style="text-align: right;">View all chocolates</p>
<?php
while ($row = $res->fetch_assoc()) {
    echo"<div class='gallery'>
            <a target='_blank' href='phot/".$row['idchocolate'].".jpg'>
              <img src='phot/".$row['idchocolate'].".jpg' alt='choco 1' width='600' height='400'>
            </a>
            <div class='desc'>
                <h3>".$row['nama']."</h3>
                <p>
                    Amount sold : ".$row['amount_sold']."</br>
                    Price : ".$row['price']."
                </p>
            </div>
        </div>
    ";
}


//       <div class="gallery">
//             <a target="_blank" href="phot/2.jpg">
//               <img src="phot/2.jpg" alt="choco 2" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 2</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/3.jpg">
//               <img src="phot/3.jpg" alt="choco 3" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 3</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/4.jpg">
//               <img src="phot/4.jpg" alt="choco 4" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 4</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/5.jpg">
//               <img src="phot/5.jpg" alt="choco 5" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 5</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/6.jpg">
//               <img src="phot/6.jpg" alt="choco 6" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 6</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/7.jpg">
//               <img src="phot/7.jpg" alt="choco 7" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 7</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/8.jpg">
//               <img src="phot/8.jpg" alt="choco 8" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 8</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/9.jpg">
//               <img src="phot/9.jpg" alt="choco 9" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 9</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/10.jpg">
//               <img src="phot/10.jpg" alt="choco 10" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 10</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/11.jpg">
//               <img src="phot/11.jpg" alt="choco 11" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 11</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>

//       <div class="gallery">
//             <a target="_blank" href="phot/12.jpg">
//               <img src="phot/12.jpg" alt="choco 12" width="600" height="400">
//             </a>
//             <div class="desc">
//                 <h3>Choco 12</h3>
//                 <p>
//                     Amount sold : 1</br>
//                     Price : 30000000
//                 </p>
//             </div>
//         </div>
//     </div>



?>
</body>