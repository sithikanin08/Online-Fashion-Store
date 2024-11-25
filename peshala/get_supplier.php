<?php
include('config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM Supplier_Profile WHERE Supplier_ID = '$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $supplier = $result->fetch_assoc();
        echo json_encode($supplier);
    } else {
        echo json_encode(null);
    }
}

$con->close();
?>
