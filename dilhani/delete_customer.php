<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer Profile | Athena Fashions</title>
    <link rel="stylesheet" href="..\dilhani\dStyle.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
    <style>
        .notification {
            display: none;
            padding: 15px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            border-radius: 5px;
            color: #fff;
        }
        .notification.success {
            background-color: #4CAF50; 
        }
        .notification.error {
            background-color: #f44336; 
        }
    </style>
    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this customer profile? This action cannot be undone.");
        }

        function showNotification(message, type) {
            var notification = document.getElementById("notification");
            notification.innerText = message;
            notification.className = "notification " + type;
            notification.style.display = "block";
            
            setTimeout(function() {
                notification.style.display = "none";
                if (type === 'success') {
                    window.location.href = 'view_customers.php'; 
                }
            }, 2000); 
        }
    </script>
</head>
<body>

<?php include '..\sithika\header.php'; ?>


<div id="notification" class="notification"></div>

<section class="dbanner">

    <div class="container">
        <h1>Delete Customer Profile</h1>
        <form method="POST" action="" onsubmit="return confirmDeletion();">
            <label for="id">Customer ID:</label>
            <select id="id" name="id" required>
                <option value="">Select Customer ID</option>
                <?php
                
                $sql = "SELECT Customer_ID FROM Customer_Profile";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Customer_ID'] . "'>" . $row['Customer_ID'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No customers found</option>";
                }
                ?>
            </select>
            
            <input type="submit" name="delete" value="Delete Customer">
        </form>
        <a href="view_customers.php">View All Customers</a>
    </div>

</section>

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    
    $sql = "DELETE FROM Customer_Profile WHERE Customer_ID='$id'";
    
    if ($con->query($sql) === TRUE) {
        echo "<script>showNotification('Customer profile deleted successfully!', 'success');</script>";
    } else {
        echo "<script>showNotification('Error deleting customer profile: " . addslashes($con->error) . "', 'error');</script>";
    }
}
$con->close();
?>

<?php include '..\sithika\footer.php'; ?>

</body>
</html>
