<?php
include 'config.php';

if (isset($_POST['up_BTN'])) {
    $update_UT = $_POST['up_UT'];
    $update_UP = $_POST['up_PT'];
    $update_QTY = $_POST['up_QTY'];
    $update_ID = $_POST['up_ID'];
    $update_PRC = $_POST['up_PRC'];
    $update_SIZE = $_POST['up_SIZE'];
    $update_PIC = $_FILES['up_IMG']['name'];
    $update_image = $_FILES['up_IMG']['tmp_name'];
    $update_folder = 'img/' . $update_PIC;

    $up_BTN = mysqli_query($conn, "UPDATE `product` SET
        `name` = '$update_UT',
        `product_type` = '$update_UP',
        `size` = '$update_SIZE',
        `quantity` = '$update_QTY',
        `price` = '$update_PRC',
        `image` = '$update_PIC'
        WHERE id = '$update_ID'");

    if ($up_BTN) {
        move_uploaded_file($update_image, $update_folder);
        echo "Product updated successfully!";
    } else {
        echo 'Error updating product';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="..\shehan\css\updateProduct.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php'; ?>

    <div class="all">
        <div class="top">
            UPDATE PRODUCT
        </div>
        <div class="mid">
            <?php
            if (isset($_GET['id'])) {
                $edit_id = $_GET['id'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `product` WHERE id = '$edit_id'");
                
                if (mysqli_num_rows($edit_query) > 0) {
                    $fetch_data = mysqli_fetch_assoc($edit_query);
            ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <img src="img/<?php echo $fetch_data['image']; ?>" alt="Product Image" style="max-width: 200px;"><br>
                        <input type="hidden" value="<?php echo $fetch_data['id']; ?>" name="up_ID">
                        <input type="text" class="inputField" required value="<?php echo $fetch_data['name']; ?>" name="up_UT" placeholder="Product Name"><br>
                        <input type="text" class="inputField" required value="<?php echo $fetch_data['product_type']; ?>" name="up_PT" placeholder="Product Type"><br>
                        <input type="text" class="inputField" required value="<?php echo $fetch_data['quantity']; ?>" name="up_QTY" placeholder="Quantity"><br>
                        <input type="text" class="inputField" required value="<?php echo $fetch_data['price']; ?>" name="up_PRC" placeholder="Price"><br>
                        <input type="text" class="inputField" required value="<?php echo $fetch_data['size']; ?>" name="up_SIZE" placeholder="Size"><br>
                        <input type="file" class="inputField" name="up_IMG"><br><br>

                        <div class="btn">
                            <input type="submit" class="edit_btn" value="Change" name="up_BTN">
                        </div>
                    </form>
            <?php
                } else {
                    echo "No product found with this ID.";
                }
            } else {
                echo "No product selected to edit.";
            }
            ?>
        </div>
    </div>

<?php include '..\sithika\footer.php'; ?>

</body>
</html>
