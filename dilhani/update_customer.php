<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer Profile | Athena Fashions</title>
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
        function fetchCustomerData(customerId) {
            if (customerId == "") {
                // Clear the fields if no customer ID is selected
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("contact").value = "";
                document.getElementById("age").value = "";
                document.getElementById("address").value = "";
                document.getElementById("dob").value = "";
                return;
            }

            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_customer_data.php?id=" + customerId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var customer = JSON.parse(xhr.responseText);
                    document.getElementById("name").value = customer.Name;
                    document.getElementById("email").value = customer.Email;
                    document.getElementById("contact").value = customer.Contact_No;
                    document.getElementById("age").value = customer.Age;
                    document.getElementById("address").value = customer.Address;
                    document.getElementById("dob").value = customer.DoB;
                }
            };
            xhr.send();
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

<!-- Notification box -->
<div id="notification" class="notification"></div>

<section class="banner">

    <div class="container">
        <h1>Update Customer Profile</h1>
        <form method="POST" action="">
            <label for="id">Customer ID:</label>
            <select id="id" name="id" onchange="fetchCustomerData(this.value)" required>
                <option value="">Select Customer ID</option>
                <?php
                $result = $con->query("SELECT Customer_ID FROM Customer_Profile");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Customer_ID'] . "'>" . $row['Customer_ID'] . "</option>";
                }
                ?>
            </select>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            
            <div class="button-container">
                <input type="submit" name="update" value="Update Customer">
                <a href="view_customers.php" class="button yellow">View All Customers</a>
            </div>
        </form>
    </div>

</section>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

    // Validate if the fields are filled
    if (!empty($id) && !empty($name) && !empty($email) && !empty($contact) && !empty($age) && !empty($address) && !empty($dob)) {
        $sql = "UPDATE Customer_Profile SET Name='$name', Email='$email', Contact_No='$contact', Age='$age', Address='$address', DoB='$dob' 
                WHERE Customer_ID='$id'";
        
        if ($con->query($sql) === TRUE) {
            echo "<script>showNotification('Customer profile updated successfully!', 'success');</script>";
        } else {
            echo "<script>showNotification('Error updating customer profile: " . addslashes($con->error) . "', 'error');</script>";
        }
    } else {
        echo "<script>showNotification('Please fill out all fields before updating.', 'error');</script>";
    }
}
$con->close();
?>

<?php include '..\sithika\footer.php'; ?>

</body>
</html>
