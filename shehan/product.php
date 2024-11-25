<!DOCTYPE html>
<html>
    <head>
        <title>Products Management | Athena Fashions</title>
        <link rel="stylesheet" href="..\shehan\css\product.css">
        <script src="JS/product.js"></script>
        <link rel="icon" href="..\sithika\images\athenaIcon.png">
    </head>
    <body>

        <!--header-->
        <?php
            include '..\sithika\header.php';
        ?>

        <section class="mid">
            
            <div class="top">
                PRODUCTS
            </div>

            <div class="container">                
                <div class="add">
                    <br>
                    <h2>Add Product</h2>
                    <button class="btn1" onclick= "addproduct()">ADD</button>
                    
                </div>

                <div class="add">
                    <br><br>
                    <h2>View Product</h2>
                    <button class="btn2" onclick="viewproduct()">VIEW</button>
                </div>
            </div>
        </section> 
        
        <script>
            function addproduct(){
                window.location.href = "../shehan/addpage.php";
            }

            function viewproduct(){
                window.location.href = "../shehan/NEW.php";
            }
        </script>

        <?php
            include '..\sithika\footer.php';
        ?>

    </body>
</html>