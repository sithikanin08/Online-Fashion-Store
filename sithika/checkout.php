<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page | Athena Fashions</title>
    <link rel="stylesheet" href="..\sithika\CSS\checkOut.css"> 
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php'; ?>

<div class="container">

    <form action="lastpage.html" onsubmit="return validateForm()"> 

        <div class="row">

            <div class="col">

                <h3 class="title">Billing address</h3>

                <div class="inputBox">
                    <span>Full name :</span>        
                    <input type="text" placeholder="Full Name" required>
                </div>
                <div class="inputBox">
                    <span>Email :</span>        
                    <input type="email" placeholder="example@gmail.com" required>
                </div>
                <div class="inputBox">
                    <span>Telephone Number :</span>     
                    <input type="text" id="num" placeholder="07X XXX XXXX" maxlength="10" required>
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <div class="flex">              
                        <input type="text" placeholder="No">
                        <input type="text" placeholder="Street Name" required>
                    </div>
                </div>
                <div class="inputBox">
                    <span>city :</span>     
                    <input type="text" placeholder="Colombo" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Country :</span>      
                        <input type="text" placeholder="Sri Lanka" required>
                    </div>
                    <div class="inputBox">
                        <span>Zip code :</span>     
                        <input type="text" placeholder="12345" maxlength="5" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Payment Details</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>       
                    <img src="..\sithika\images\card_img.png" alt="Card logos">
                </div>
                <div class="inputBox">
                    <span>Cardholder's Full Name :</span>       
                    <input type="text" placeholder="Full Name" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>   
                    <input type="text" id="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16" required>
                </div>
                <div class="inputBox">
                    <span>Expiry Date :</span>  
                    <input type="month" id="start" min="2023-06" required>
                </div>

                <div class="inputBox">
                    <span>CVV :</span>     
                    <input type="text" id="CVV" placeholder="123" maxlength="3" required>
                </div>
                <div class="checkbox">
                    Agree to the terms and conditions.      
                    <input type="checkbox" name="T&C" required>
                </div>
            </div>
    
        </div>
        <div class="total">
            <h2 class="tot">Your Total </h2>
            <h2 class="amount" id="checkoutTotal">LKR 0.00</h2>
        </div>


        <input type="submit" value="Confirm Order" class="submit-btn">

        
    </form>

</div> 

<script src="..\sithika\JS\athena.js"></script> 

<?php include '..\sithika\footer.php'; ?>
    
</body>
</html>