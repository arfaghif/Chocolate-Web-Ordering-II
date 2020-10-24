<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>

<body>
    <div class = "topnav" >
        <a href = "dashboard.php" >Home</a>
        <a class="active" href="">Add New Chocolate</a>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><img src="icon/search.png" alt="submit"></i></button>
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
                            <td><input type="number" id="price" name="price" placeholder="Type chocolate price here" required></td>
                        </tr>
                        <tr>
                            <td><label for="desc">Description</label></td>
                            <td><input type="text" id="desc" name="desc" placeholder="Chocolate description..." required></td>
                        </tr>
                        <tr>
                            <td><label for="img">Image</label></td>
                            <td><input type="file"  id="img" name="img" accept="image/*" required></td>
                        </tr>
                        <tr>
                            <td><label for="amount">Amount</label></td>
                            <td><input type="number"  id="amount" name="amount" required></td>
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

                        $sql = ("INSERT INTO chocolate(nama,amount_sold,price,amount_remaining,description) VALUES ('$name','$amount_sold','$price','$amount','$desc')");
                        $connection->query($sql);
                        
                        $result = $connection->query("SELECT idchocolate FROM chocolate WHERE idchocolate=(select max(idchocolate) from chocolate)");
                        
                        $arr = mysqli_fetch_array($result);

                        $target_dir = "phot/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        
                        $number =  $arr["idchocolate"];
                        echo $number;
                        $target_test = $target_dir . $number . ".jpg";

                        /*
                        $target_test = $target_dir . $number . ".jpg";
                        $target_png = $target_dir . $number . ".png";
                        while (file_exists($target_test) or ) {
                            $number+=1;
                            $target_test = $target_dir . $number . ".jpg";
                        }*/
                        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_test)) {
                            echo "The file ". htmlspecialchars( $target_test). " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
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
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
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

