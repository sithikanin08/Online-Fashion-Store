<?php
    include 'connect.php';

    //update cart quantity

    if(isset($_POST['updateCartQuantity'])){
        $updateValue = $_POST['updateQuantity'];
        $updateId = $_POST['updateQuantityId'];
        $updateQuantityQuery = mysqli_query($con, "UPDATE `cart` SET quantity = '$updateValue' WHERE id = '$updateId'");
        if($updateQuantityQuery)
        {
            echo "<script>alert('Quantity Updated Successfully')</script>";
            echo "<script>window.location.href = 'cart.php'</script>";
        }
    }

    if(isset($_GET['remove'])){
        $removeId = $_GET['remove'];
        $removeQuery = mysqli_query($con, "DELETE FROM `cart` WHERE id = $removeId");
        if($removeQuery){
            echo "<script>alert('Product Removed Successfully')</script>";
            echo "<script>window.location.href = 'cart.php'</script>";
        }
    }

    if(isset($_GET['delete_all'])){
        $deleteAllQuery = mysqli_query($con, "DELETE FROM cart");
        if($deleteAllQuery){
            echo "<script>alert('Cart Cleared Successfully')</script>";
            echo "<script>window.location.href = 'cart.php'</script>";
        }
    }
?>


<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | Athena Fashions</title>
        <link rel="stylesheet" type="text/css" href="..\sithika\CSS\cart.css">
        <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css> 
        <link rel="icon" href="..\sithika\images\athenaIcon.png">
    </head>

    <body>

        <!--header-->
        <?php
            include '..\sithika\header.php';
        ?>
        <section class="cartContainer1">
            <div class = "cartBack">
                <section class = "cartContainer">
                    <h1 class = "heading">My Cart</h1>
                    <table class = "table">

                        <?php
                            $selectCart = mysqli_query($con, "SELECT * FROM `cart`");
                            $num = 1;
                            $grandTotal = 0;
                            if(mysqli_num_rows($selectCart) > 0){
                                echo 
                                "<tread>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tread>
                                    <tbody>";
                                    
                                while($fetchCart = mysqli_fetch_assoc($selectCart)){
                                    ?>

                                    <tr>
                                        <td><?php echo $num ?></td>
                                        <td><?php echo $fetchCart['name'] ?></td>
                                        <td><img src = "..\shehan\img\<?php echo $fetchCart['image'] ?>" alt = "<?php echo $fetchCart['name'] ?>"></td>
                                        <td>$ <?php echo number_format((float)$fetchCart['price'],2) ?> /-</td>
                                        <td>
                                            <form action = "" method = "post">
                                                <input type = "hidden" value = "<?php echo $fetchCart['id'] ?>" name = "updateQuantityId">
                                            <div class = "quantityBox">
                                                <input type = "number" min = "1" value = "<?php echo $fetchCart['quantity'] ?>" name = "updateQuantity">
                                                <input type = "submit" class = "updateQuantity" value = "Update" name = "updateCartQuantity">
                                            </div>
                                            </form>
                                        </td>
                                        <td>$<?php echo $subTotal = number_format((float)$fetchCart['price'] * (int)$fetchCart['quantity'], 2) ?>/-</td>
                                        <td>
                                            <a href="cart.php?remove=<?php echo $fetchCart['id']; ?>" class ="remove" onclick="return confirm('Are you sure you want to delete this item?')" >
                                                <i class="ri-delete-bin-2-fill"></i>Remove
                                            </a>
                                        </td>

                                    </tr>

                                    <?php

                                    $grandTotal = (float)$grandTotal;
                        

                                    $grandTotal += ((float)$fetchCart['price'] * (int)$fetchCart['quantity']);
                                    $num++;
                                }

                            } else {
                                echo "<div class = 'emptyText'>Cart Is Empty</div>";
                            }
                        ?>
                        
                            
                        </tbody>
                    </table>

                    <!--PHP code for empty cart-->
                    <!--bottom Area-->
                    <?php
                        if ($grandTotal > 0) {
                            echo "
                                <div class='tableBottom'>
                                    <a href='shop_product.php' class='bottom_btn'>Continue Shopping</a>
                                    <h3 class='bottom_btn'>Grand Total : $ <span id='grandTotalAmount'>".number_format($grandTotal, 2)."</span></h3>
                                    <a href='checkout.php' class='bottom_btn' onclick='saveGrandTotal()'>Proceed to Checkout</a>
                                </div>
                            ";

                        ?>
                            <a href='cart.php?delete_all' class='clearCart' onclick="return confirm('Are you sure you want to delete all the items?')">
                                <i class='ri-delete-bin-2-fill'></i>Clear Cart
                            </a>

                        <?php

                        } else {
                            echo "";
                        }
                        ?>


                </section>
            </div>

        </section>  
        
        <script src = "..\sithika\JS\athena.js"></script>

        <!--footer-->
        <?php
            include '..\sithika\footer.php';
        ?>

    </body>

</html>