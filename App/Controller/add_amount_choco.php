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
<script>
    let count_amount = 0;
    let tot_harga = 0;
    addamount = ()=>{
        count_amount +=1;
        change_field();
    }
    minamount = ()=>{
        if(count_amount>0){
            count_amount -=1;
        }
        change_field();
    }
   change_field= ()=>{
        document.getElementById("field-amount").innerHTML = count_amount;
    }
    add_action = ()=>{
        if(getCookie("add-amount")){
            eraseCookie("add-amount");
        }
        createCookie("add-amount",String(count_amount),"1");
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function createCookie(name, value, days) {
        var expires; 
        
        if (days) { 
            var date = new Date(); 
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
            expires = "; expires=" + date.toGMTString(); 
        } 
        else { 
            expires = ""; 
        } 
        
        document.cookie = escape(name) + "=" +  
            escape(value) + expires + "; path=/"; 
    }
    function eraseCookie(name) {
        createCookie(name,"",-1);
    } 
</script>
<?php
$res = $connection->query("SELECT idchocolate,nama, amount_sold, price,amount_remaining,description FROM chocolate WHERE idchocolate =".$idchoco);
$row = $res->fetch_assoc();
echo'
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
                <div class="chocodetail-buy" id = "chocodetail">
                    <div class = "img-detail">
                        <img src="phot/2.jpg" alt="choco 1" width="100%" height="100%">
                    </div>
                    <div class="details-buy" id = "details-choco">
                        <h3>'.$row['nama'].'</h3>
                        <p>
                            Amount sold : '.$row['amount_sold'].' </br>
                            Price : '.$row['price'].' </br>
                            Amount Remaiing : '.$row['amount_remaining'].'</br>
                            Description :</br>
                            '.$row['description'].'</br>

                        </p>
                        <div class = "pembelian">
                            <div class = "amount-to-buy">
                                <p>Amount to add: </p>
                                <div class = "add-min-amount">
                                    <div class = "add-amount">
                                        <button class = "add-amount" onclick = "addamount()"><img src = "icon/plus-icon.png" width = "100%" height = "100%"></button>
                                    </div>
                                    <div class = "field-amount">
                                        <h1 id = "field-amount" font-size = "100%">0</h1>
                                    </div>
                                    <div class = "min-amount">
                                        <button class = "min-amount" onclick = "minamount()"><img src = "icon/min-icon.png" width="100%" height = "100%"></button>
                                    </div>
                                </div>
                            </div>
                            <div class = "total-price">
                            </div>
                    </div>
                    </div>
                </div>
                <form class = "input-address">
                    <div class = "input-address">
                    </div>
                    <div class = "submit-address">
                        <div class = "button-ok">
                            <a href = "add_succes.php?idchoco='.$idchoco.'">
                            <button type = "button" class = "btn-buy" onclick = "add_action()">Add</button>
                            </a>
                        </div>
                        <div class = "button-cancle">
                            <a href = "add_stock_choco.php?idchoco='.$idchoco.'">
                            <button type = "button" class = "btn-buy">Cancle</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>';