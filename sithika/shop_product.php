<?php
    include 'connect.php';
    if(isset($_POST['Add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        // select cart data  based on condition
        $selectCart = mysqli_query($con, "SELECT * FROM cart WHERE name = '$product_name'");
        if(mysqli_num_rows($selectCart) > 0){
            $message = "Product already in cart";
            
        }else{
            //insert data into cart table
            $insert_product = mysqli_query($con, "insert into cart (name, price, image, quantity) values 
            ('$product_name', '$product_price', '$product_image', $product_quantity)");
            $message = "Product added to cart";
        }

        
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Athena Fashions</title>
    <link rel="stylesheet" type="text/css" href="..\sithika\CSS\athenaShop.css">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css> 
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>

<body>
    
 
    <?php
        include '..\sithika\header.php';
    ?>

 
    <div class="container">
        <?php if(isset($message)){ ?>
            <script>
                var displayMessage = "<?php echo $message; ?>";
            </script>

            <?php } ?>
            
        
        <section class="products">
            <h1 class="heading">Here are some of our products</h1>
            <div class="product_container">
                <?php
                $selectProduct = mysqli_query($con, "SELECT * FROM `product`");
                if(mysqli_num_rows($selectProduct) > 0){
                    while ($fetchProduct = mysqli_fetch_assoc($selectProduct)){                       
                ?>
                    <form method="post" action="">
                        <div class="edit_form">
                            <img src="..\shehan\img\<?php echo $fetchProduct['image'] ?>" alt="">
                            <h3><?php echo $fetchProduct['name'] ?></h3>
                            <div><p>Price: $ <?php echo number_format($fetchProduct['price'],2) ?> /-</p></div>
                            <input type="hidden" name="product_name" value = "<?php echo $fetchProduct['name'] ?>">
                            <input type="hidden" name="product_price" value = "<?php echo $fetchProduct['price'] ?>" >
                            <input type="hidden" name="product_image" value = "<?php echo $fetchProduct['image'] ?>">
                            <input type="submit" class="" value="Add to Cart" name="Add_to_cart">
                        </div>
                    </form>
                <?php
                }
                    }else{
                        echo "<div class ='noProducts' >No products Available</div>";
                    }
                ?>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p id="modalMessage"></p>
                </div>
            </div>
                

        </section>
        
    </div>

    <?php
        include '..\sithika\footer.php';
    ?>

    <script src = "..\sithika\JS\athena.js"></script>
  
</body>