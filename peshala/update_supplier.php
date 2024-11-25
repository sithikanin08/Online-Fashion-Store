<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Supplier Profile | Athena Fashions</title>
    <link rel="stylesheet" href="..\peshala\pStyles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php' ?>

<section class="banner">
    
    <div class="container">
        <h2>Update Supplier Profile</h2>
        <form method="POST" action="">
            <label for="id">Supplier ID:</label>
            <select id="id" name="id" required>
                <option value="">Select Supplier ID</option>
                <?php
                $result = $con->query("SELECT Supplier_ID FROM Supplier_Profile");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Supplier_ID'] . "'>" . $row['Supplier_ID'] . "</option>";
                    }
                }
                ?>
            </select>
            <br><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"> 
            
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact"> 
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"> 

            <div class="button-container">
                <input type="submit" name="update" value="Update Supplier" class="button blue">
                <a href="view_supplier.php" class="button yellow">View All Suppliers</a>
            </div>
        </form>
    </div>

</section>

<!-- Modal for success message -->
<div class="modal" id="successModal" style="display:none;">
    <div class="modal-content">
        <p>Supplier profile updated successfully!</p>
        <button class="close-modal" onclick="closeModal()">OK</button>
    </div>
</div>

<script>
$(document).ready(function() {
    
    $('#id').change(function() {
        var supplierID = $(this).val();
        if (supplierID != "") {
          
            $.ajax({
                url: 'get_supplier.php',
                type: 'POST',
                data: { id: supplierID },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#name').val(data.Name);
                        $('#contact').val(data.Contact_Number);
                        $('#email').val(data.Email);
                    }
                },
                error: function() {
                    alert('Error fetching supplier data.');
                }
            });
        } else {
            // Clear the fields if no supplier is selected
            $('#name').val('');
            $('#contact').val('');
            $('#email').val('');
        }
    });
});

// Function to close the modal
function closeModal() {
    document.getElementById('successModal').style.display = 'none';
}
</script>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    
    $stmt = $con->prepare("UPDATE Supplier_Profile SET Name=?, Contact_Number=?, Email=? WHERE Supplier_ID=?");
    $stmt->bind_param("ssss", $name, $contact, $email, $id);

    if ($stmt->execute()) {
        echo "<script>document.getElementById('successModal').style.display = 'flex';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$con->close();
?>

<?php include '..\sithika\footer.php' ?>`

</body>
</html>
