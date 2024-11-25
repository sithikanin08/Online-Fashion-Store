<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="Athena Home Page">
    <link rel="stylesheet" type="text/css" href="..\sithika\CSS\home.css">
    <link rel="stylesheet" type="text/css" href="..\sithika\CSS\nav.css">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>

<body>

    <!-- Header and nav bar  -->
    <header class="header" id="header">
        <nav class="navContainer">
            <a href="..\sithika\index.php" class="nav__logo"><img src="..\sithika\images\Athena2.png" class="logo"></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                    <li class="nav__item">
                        <a href="..\sithika\index.php" class="nav__link">
                            <i class="ri-home-2-line"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="..\shehan\product.php" class="nav__link">
                            <i class="ri-t-shirt-2-line"></i>
                            <span>Products</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="..\peshala\view_supplier.php" class="nav__link">
                            <i class="ri-store-2-line"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="..\prabhath\read.php" class="nav__link">
                            <i class="ri-feedback-line"></i>
                            <span>Feedbacks</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="..\dilhani\view_customers.php" class="nav__link">
                            <i class="ri-user-3-line"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="..\sithika\shop_product.php"  class="nav__link">
                            <i class="ri-shopping-cart-2-line"></i>
                            <span>Shop</span>
                        </a>
                    </li>

                    <!--Select Query-->
                    <?php
                        $selectProduct = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
                        $rowCount = mysqli_num_rows($selectProduct);
                          
                    ?>

                    <li class="nav__item">
                        <a href="..\sithika\cart.php" class="cart">
                            <i class="ri-shopping-cart-2-line"></i>
                            <span><sup><?php echo $rowCount ?></sup></span>
                        </a>
                    </li>

                    <li>
                        <a href="..\dilhani\login.php" class="">
                            <span><img src="..\sithika\images\profilePic.png"></span>
                        </a>
                    </li>
                </ul>   
            </div>
            
            <!--close button-->
            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <!--Toggele Button-->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-2-line"></i>
            </div>


            </div>
        </nav>

    </header>

    <script src="../sithika/JS/athena.js"></script>

</body>

</html>