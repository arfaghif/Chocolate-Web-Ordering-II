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
        <title> Buy Choco </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
</html>
<body>
    <div class = "topnav" >
        <a  href = "dashboard.php">Home</a>
        <a href="transaksi.php">History</a>
        <a href="logout.php" class= "nav-bar-right">Logout</a>
        
        <div class="search-container">
            <form action="search_result.php" method ="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" ><img src="icon/search.png" alt="submit"></button>
            </form>
        </div>
    </div>
<script>
    let count_amount = 0;
    let tot_harga = 0;
    addamount = ()=>{
        count_amount +=1;
        change_field();
        count_price();
    }
    minamount = ()=>{
        if(count_amount>0){
            count_amount -=1;
        }
        change_field();
        count_price();
    }
   change_field= ()=>{
        document.getElementById("field-amount").innerHTML = count_amount;
    }
    count_price = ()=>{
        harga = window.atob(getCookie("harga"));
        tot_harga = harga*count_amount;
        document.getElementById("field-total-price").innerHTML = tot_harga;
    }
    buy_action = () =>{
        var text = document.getElementById("textareaaddress").value;
        if(getCookie("data-pembelian")){
            eraseCookie("data-pembelian");
        }
        data = "amount="+String(count_amount)+"&totharga="
        +String(tot_harga)+"&address="+text;
        enc = window.btoa(data);
        createCookie('data-pembelian', enc, '1');
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
echo '

    <div class="page">
        <div class = "container-chocodetail">
            <div class = "choco-name">
            <p>Buy Choco</p>
            </div>
            <div class = "chocodetail">
                <div class="chocodetail-buy" id = "chocodetail">
                    <div class = "img-detail">
                    <img src="phot/'.$idchoco.'.jpg" alt="'.$row['nama'].'" width="100%" height="100%">
                    </div>
                    <div class="details-buy" id = "details-choco">
                        <h3>'.$row['nama'].'</h3>
                        <p>
                            Amount sold : '.$row['amount_sold'].' </br>
                            Price : '.$row['price'].' </br>
                            Amount Remaining : '.$row['amount_remaining'].'</br>
                            Description :</br>
                            '.$row['description'].'</br>

                        </p>
                        <div class = "pembelian">
                            <div class = "amount-to-buy">
                                <p>Amount to buy: </p>
                                <div class = "add-min-amount">
                                    <div class = "add-amount">
                                        <button class = "add-amount" onclick = "minamount()"><img src = "icon/min-icon.png" width = "100%" height = "100%"></button>
                                    </div>
                                    <div class = "field-amount">
                                        <h1 id = "field-amount">0</h1>
                                    </div>
                                    <div class = "min-amount">
                                        <button class = "min-amount" onclick = "addamount()"><img src = "icon/plus-icon.png" width="100%" height = "100%"></button>
                                    </div>
                                </div>
                            </div>
                            <div class = "total-price" id = "idfield-total-price">
                                <div class = "text-total-price">
                                    <p>Total Price:</p>
                                </div>
                                <div class = "field-total-price">
                                    <p id = "field-total-price">0</p>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
                <form class = "input-address">
                    <div class = "input-address">
                    <p>Address: </p>
                    <textarea id="textareaaddress" rows = "5%" cols = "100%"></textarea>
                    <p id="warn-address"></p>
                    </div>
                    <div class = "submit-address">
                        <div class = "button-ok">
                        <a href = "detail_choco.php?idchoco='.$idchoco.'" class = "a-btn">
                            <button type = "button" class = "btn-buy">Cancel</button>
                        </a>
                        </div>
                        <div class = "button-cancle">
                        <a href = "buy_sucess.php?idchoco='.$idchoco.'" class = "a-btn">
                            <button type = "button" class = "btn-buy" onclick = "buy_action()">Buy</button>
                        </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>';