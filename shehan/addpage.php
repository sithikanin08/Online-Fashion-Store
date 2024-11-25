<?php include 'config.php';

if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $proType=$_POST['Ptype'];
    if (isset($_POST['size']) && is_array($_POST['size'])) {
        $proSize = implode(",", $_POST['size']);
    } else {
        $proSize = ''; 
    }
    $proQty=$_POST['qty'];
    $proPrice=$_POST['prs'];
    $proImg=$_FILES['pic']['name'];
    $proImgTempName=$_FILES['pic']['tmp_name'];
    $proImgFolder='img/'.$proImg;
    
    $insertQry = mysqli_query($conn, "INSERT INTO `product` (`id`, `name`, `product_type`, `size`, `quantity`, `price`, `image`) value('','$name','$proType','$proSize','$proQty','$proPrice','$proImg') ")
    or die("Insert query Failed");

    if($insertQry)
    {
        move_uploaded_file($proImgTempName,$proImgFolder);
        echo "<script> alert('Product Inserted Successfylly') </script>";
    }
    else
    {
        echo "<script> alert('Product Insertion Failed') </script>";
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Product | Athena Fashions</title>
        <link rel="stylesheet" href="..\shehan\css\addProduct.css">
        <link rel="icon" href="..\sithika\images\athenaIcon.png">
    </head>

    <body>
        <?php
            include '..\sithika\header.php';
        ?>
        
        <section class="all">
           

            <div class="top">
                ADD PRODUCTS
            </div>
            <div class="box">
                <?php

                if(isset($display_message)){
                echo"<div class='display_message'>
                <span>$display_message</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
                </div>";
                }


                ?>

                <div class="mid">
                    <br>
                    <form method="post" action="" enctype="multipart/form-data">
                    <label >Name</label><br>
                    <input type="text" name ="name" placeholder="Enter your name">
                    

                    <br><br>    
                        
                    <label>Product Type</label><br>
                    <input type="text" name ="Ptype" placeholder="T-shirt/Shirt/Frock/Trouser">
                        <br>
                        <br>

                        <label>Avilable Sizes</label><br>
                        <input type="checkbox" name ="size[]" value = "S"> S<br>
                        <input type="checkbox" name ="size[]" value ="M"> M<br>
                        <input type="checkbox" name ="size[]" value ="L"> L<br>
                        <input type="checkbox" name ="size[]" value ="XL"> XL<br>
                        <input type="checkbox" name ="size[]" value ="XXL"> XXL<br>
                        <br>

                        <label>Avilable Quantity</label><br>
                        <input type="number" min="0" name="qty"><br>
                        <br>

                        <label>Price</label><br>
                        <input type="number" min="0" name="prs"><br>
                        <br>

                        <label>Add Product Photo</label><br>
                        <input type="file" name="pic"  accept="image/png, image/jpg, image/jpeg"><br>
                        

                        <br><br>
                        <input type="submit" name="submit" class="submit" value="Add Product" >
                        <br><br>
                    </form>    
                </div>
            </div>
        </section>

        <?php
            include '..\sithika\footer.php';
        ?>

    </body>
</html>