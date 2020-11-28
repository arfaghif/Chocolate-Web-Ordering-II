<?php
    include "logreg/config.php";
    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])){
        header('location: logreg/login.php');
    }else{
        $user = $_COOKIE[$cookie_name];
        $duser = base64_decode($user);
        $res = $connection->query("SELECT type FROM user WHERE username='$duser'");
        $type = mysqli_fetch_array($res);
        if ($res->num_rows==0 || $type['type']==1){
            setcookie("user", "", time() - 3600,'/');
            header('location: logreg/login.php');
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add New Chocolate </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>
    <div class = "topnav" >
        <a href = "dashboard.php" >Home</a>
        <a class="active" href="">Add New Chocolate</a>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>

    <div class="page">
        <div class = "container-addchoco">
            <h2>Add New Chocolate</h2><br>
            <div class = "addchoco">
                <form class="form-addchoco" method="post" action="" enctype="multipart/form-data" name="register-form">
                    <table>
                        <tr>
                            <td><label for="name">Name</label></td>
                            <td><input type="text" id="name" name="name" placeholder="Type chocolate name here" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="price">Price</label></td>
                            <td><input type="number" min="1" id="price" name="price" placeholder="Type chocolate price here" required></td>
                        </tr>
                        <tr>
                            <td><label for="resep1">Resep 1</label></td>
                            <td><input type="text" id="resep1" name="resep1" placeholder="Type first receipt here" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="amount1">Jumlah Resep 1</label></td>
                            <td><input type="number" min="1" id="jumlah1" name="jumlah1" placeholder="Type amount first receipt here" required></td>
                        </tr>
                        <tr>
                            <td><label for="resep2">Resep 2</label></td>
                            <td><input type="text" id="resep2" name="resep2" placeholder="Type second receipt here" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="amount2">Jumlah Resep 2</label></td>
                            <td><input type="number" min="1" id="jumlah2" name="jumlah2" placeholder="Type amount second receipt here" required></td>
                        </tr>
                        <tr>
                            <td><label for="resep3">Resep 3</label></td>
                            <td><input type="text" id="resep3" name="resep3" placeholder="Type third receipt here" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="amount3">Jumlah Resep 3</label></td>
                            <td><input type="number" min="1" id="jumlah3" name="jumlah3" placeholder="Type amount third receipt here" required></td>
                        </tr>
                        <tr>
                            <td><label for="desc">Description</label></td>
                            <td><input type="text" id="desc" name="desc" placeholder="Chocolate description..." required></td>
                        </tr>
                        <tr>
                            <td><label for="img">Image</label></td>
                            <td><input type="file"  id="img" name="img" accept="image/jpg" required></td>
                        </tr>
                        <tr>
                            <td><label for="amount">Amount</label></td>
                            <td><input type="number"  min="0" id="amount" name="amount" placeholder="Type chocolate amount here" required></td>
                        </tr>
                    </table>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            include('logreg/config.php');
                            
                            $name = $_POST['name']; //nama 
                            $price = $_POST['price']; // price
                            $desc = $_POST['desc']; //description
                            $amount = $_POST['amount']; //amount_remaining
                            $amount_sold = 0;

                            $target_dir = "phot/";
                            /*
                            $target_test = $target_dir . $number . ".jpg";
                            $target_png = $target_dir . $number . ".png";
                            while (file_exists($target_test) or ) {
                                $number+=1;
                                $target_test = $target_dir . $number . ".jpg";
                            }*/
                            $uploadOk = 1;
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            if($FileType != "jpg") {
                                echo "<p class='error'> Sorry, only JPG files are allowed.</p>";
                                $uploadOk = 0;
                            }


                            if (($price<=0) || ($amount<0)) {
                                echo "<p class='error'>Price or amount invalid</p>";
                                $uploadOk = 0;
                            }


                            if ($uploadOk){
                                $sql = ("INSERT INTO chocolate(nama,amount_sold,price,amount_remaining,description) VALUES ('$name','$amount_sold','$price','$amount','$desc')");
                                $connection->query($sql);
                                
                                $result = $connection->query("SELECT idchocolate FROM chocolate WHERE idchocolate=(select max(idchocolate) from chocolate)");
                                
                                $arr = mysqli_fetch_array($result);

                                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                                
                                $number =  $arr["idchocolate"];
                                $target_test = $target_dir . $number . ".jpg";
                                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_test)) {
                                    echo "<p class='success'>Chocolate ". $name. " has been added.</p>";
                                } 
                                else {
                                    echo "<p class='error'>There was an error uploading your file.</p>";
                                }
                            }
                            else {
                                echo "<p class='error'>There was an error uploading your file.</p>";
                            }
                        }
                            
                        
                        /*
                        // Check if image file is a actual image or fake image
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) {
                                echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }
                        }

                        // Check if file already exists
                        while (file_exists($target_file)) {
                            $number+=1;
                            $target_file = $target_dir . 
                        }

                        // Check file size
                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                            echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats
                        if($imageFileType != "jpg") {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                        }*/
                    
                        ?>
                    <input type="submit" value="Add Chocolate">
                </form>
                
            </div>

        </div>
    </div>

</body>

