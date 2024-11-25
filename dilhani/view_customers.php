<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer Profiles | Athena Fashions</title>
    <link rel="stylesheet" href="..\dilhani\dStyle.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php' ?>

<section class="dbanner">
    
    <div class="container">
        <h1>Customer Profiles</h1>
        <a href="create_customer.php" class="btn create">Create New Customer</a>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM Customer_Profile";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["Customer_ID"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Contact_No"]."</td><td>".$row["Age"]."</td><td>".$row["Address"]."</td><td>".$row["DoB"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No customers found</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <a href="update_customer.php" class="btn update">Update Customer Profile</a> |
        <a href="delete_customer.php" class="btn delete">Delete Customer Profile</a>
    </div>

</section>

<?php $con->close(); ?>

<?php include '..\sithika\footer.php' ?>

</body>
</html>
