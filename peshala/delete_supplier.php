<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier Profile | Athena Fashions</title>
    <link rel="stylesheet" href="..\peshala\pStyles.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php' ?>

<section class="dbanner">

    <div class="container">
        <h2>Delete Supplier Profile</h2>
        <form method="POST" action="" id="deleteSupplierForm">
            <label for="id">Supplier ID:</label>
            <select id="id" name="id" required>
                <option value="">Select Supplier ID</option>
                <?php
                $result = $con->query("SELECT Supplier_ID FROM Supplier_Profile");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Supplier_ID'] . "'>" . $row['Supplier_ID'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No suppliers found</option>";
                }
                ?>
            </select>
            
            <div class="button-container">
                <input type="submit" name="delete" value="Delete Supplier" class="button red" onclick="return confirmDelete()">
                <a href="view_supplier.php" class="button yellow">View All Suppliers</a>
            </div>
        </form>
    </div>

</section>

<!-- Modal for success message -->
<div class="modal" id="successModal" style="display:none;">
    <div class="modal-content">
        <p>Supplier profile deleted successfully!</p>
        <button class="close-modal" onclick="closeModal()">OK</button>
    </div>
</div>

<script>
// confirm deletion
function confirmDelete() {
    return confirm("Are you sure you want to delete this supplier profile?");
}

// redirect after 3 seconds
function showSuccessModal() {
    document.getElementById('successModal').style.display = 'flex';
    
    setTimeout(function() {
        window.location.href = "../peshala/view_supplier.php";
    },5000);
}

// Function to close the modal
function closeModal() {
    document.getElementById('successModal').style.display = 'none';
}
</script>

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

   
    $stmt = $con->prepare("DELETE FROM Supplier_Profile WHERE Supplier_ID=?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
       
        echo "<script>showSuccessModal();</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$con->close();
?>

<?php include '..\sithika\footer.php' ?>

</body>
</html>
