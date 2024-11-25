<?php
include 'config.php';

if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE `id` = '$delete_id'") or die("Query failed");

    if ($delete_query) {
        header('Location: NEW.php'); // Correct redirect
        exit(); // Always use exit after header redirection
    } else {
        echo "Product not deleted";
    }
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>View Products | Athena Fashions</title>
            <link rel="stylesheet" href="..\shehan\css\NEW.css">
            <link rel="icon" href="..\sithika\images\athenaIcon.png">
        </head>

         <BOdy>

            <?php
                include '..\sithika\header.php';
            ?>

            <div class="all">
                <div class="top">
                    VIEW PRODUCTS
                </div>
                    <div class="mid">
                        <div class="box">
                            <div class="ptable">   
                                <table class="tbl" border="1">
                                    <thead>
                                        <th class="id">ID</th>
                                        <th class="pic">Photo</th>
                                        <th class="ut">User Type</th>
                                        <th class="pt">Product Type</th>
                                        <th class="quan">Quantity</th>
                                        <th class="price">Price</th>
                                        <th class="size">Available <br>Sizes</th>
                                        <th class="act">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $display_product=mysqli_query($conn,"select * from `product`");
                                            if(mysqli_num_rows( $display_product)>0){
                                               while($row=mysqli_fetch_assoc($display_product)){
                                               

                                                ?>

                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td class="image"><img  src="..\shehan\img\<?php echo $row['image'] ?>" alt="<?php echo $row['id'] ?>"></td>
                                                    <td> <?php echo $row['name'] ?> </td>
                                                    <td><?php echo $row['product_type'] ?></td>
                                                    <td><?php echo $row['quantity'] ?></td>
                                                    <td><?php echo $row['price'] ?> </td>
                                                    <td><?php echo $row['size'] ?></td>
                                                    <td>
                                                        <button class="edt">
                                                            <a href="..\shehan\update.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color: inherit;">
                                                                Edit
                                                            </a>
                                                        </button>

                                                        <button class="dlt" onclick="return confirm('Are you sure you want to delete this item?');">
                                                            <a href="..\shehan\NEW.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color: inherit;">
                                                                Delete
                                                            </a>
                                                        </button>
                                                    </td>
                                                </tr>      

                                                <?php
                                               }
                                                                                              
                                            }
                                            else
                                            {
                                                echo "<div class='empty'> No Product Availabe<div>";
                                            }
                                        ?>
                                        
                                    </tbody>

                                </table>    
                            </div>
                        </div>
                    </div>
            </div>

            <?php
                include '..\sithika\footer.php';
            ?>

        </Body>
    </html>