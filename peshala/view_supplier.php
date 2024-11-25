<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Supplier Profiles | Athena Fashions</title>
    <link rel="stylesheet" href="..\peshala\pStyles.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php' ?>

<section class="banner">
    
    <div class="container">
        <h2>Supplier Profiles</h2>

        <div class="center-button-container">
        <a href="create_supplier.php" class="button green">Create New Supplier</a>
        </div>


        <table>
            <thead>
                <tr>
                    <th>Supplier ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM Supplier_Profile";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["Supplier_ID"]."</td><td>".$row["Name"]."</td><td>".$row["Contact_Number"]."</td><td>".$row["Email"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No suppliers found</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="update_supplier.php" class="button blue">Update Supplier Profile</a>
            <a href="delete_supplier.php" class="button red">Delete Supplier Profile</a>
        </div>
    </div>

</section>

<?php $con->close(); ?>

<?php include '..\sithika\footer.php' ?>

</body>
</html>
