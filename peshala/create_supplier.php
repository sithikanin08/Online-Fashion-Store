<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Supplier Profile | Athena Fashions</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="..\peshala\pStyles.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
    <style>
        /* Add some basic styling for the modal */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%;
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            text-align: center; 
        }

        .close-modal {
            background-color: #4CAF50; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            cursor: pointer; 
        }

        .close-modal:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>

<?php include '..\sithika\header.php' ?>

<section class="banner">
    
    <div class="container">
        <h2>Create Supplier Profile</h2>
        <form method="POST" action="" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" pattern="\d{10}" required title="Please enter exactly 10 digits.">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <div class="button-container">
                <input type="submit" name="submit" value="Create Supplier">
                <a href="view_supplier.php" class="button yellow">View All Suppliers</a>
            </div>
        </form>
    </div>

</section>

<!-- Modal for success message -->
<div class="modal" id="successModal">
    <div class="modal-content">
        <p>Supplier profile created successfully!</p>
        <button class="close-modal" onclick="closeModal()">OK</button>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    // contact number (10 digits)
    if (!preg_match('/^\d{10}$/', $contact)) {
        echo "Contact number must be exactly 10 digits.";
        exit;
    }

    // email validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $sql = "INSERT INTO Supplier_Profile (Name, Contact_Number, Email) VALUES ('$name', '$contact', '$email')";
    
    if ($con->query($sql) === TRUE) {
        echo "<script>
                document.getElementById('successModal').style.display = 'block';
                setTimeout(function() {
                    window.location.href = 'view_supplier.php'; // Redirect after 3 seconds
                }, 2000);
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
$con->close();
?>

<script>
    // Function to close the modal
    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
    }

    //  form validation
    function validateForm() {
        const contact = document.getElementById("contact").value;
        const email = document.getElementById("email").value;
        const contactPattern = /^\d{10}$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validate contact number (10 digits)
        if (!contactPattern.test(contact)) {
            alert("Please enter a valid 10-digit contact number.");
            return false;
        }

        // Validate email format
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        return true;
    }
</script>

<?php include '..\sithika\footer.php' ?>

</body>
</html>
