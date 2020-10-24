<?php
class Test{
    public function __construct(){
        echo "hello";
        echo '<div class = "pembelian">
        <div class = "amount-to-buy">
            <p>Amount to buy: </p>
            <div class = "add-min-amount">
                <div class = "add-amount">
                    <button class = "add-amount"><img src = "icon/plus-icon.png" width = "100%" height = "100%"></button>
                </div>
                <div class = "field-amount">
                    <h1 id = "field-amount">8</h1>
                </div>
                <div class = "min-amount">
                    <button class = "min-amount"><img src = "icon/min-icon.png" width="100%" height = "100%"></button>
                </div>
            </div>
        </div>
        <div class = "total-price">
            <div class = "text-total-price">
                <p>Total Price:</p>
            </div>
            <div class = "field-total-price">
                <p id = "field-total-price">100.000</p>
            </div>
        </div>
</div>';

    }

}