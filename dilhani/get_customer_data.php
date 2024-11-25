<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Customer_Profile WHERE Customer_ID='$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        echo json_encode($customer);
    } else {
        echo json_encode([]);
    }
}

$con->close();
?>
