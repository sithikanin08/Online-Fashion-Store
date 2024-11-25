<?php
include 'config.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_id= mysqli_query($conn, "Delete from `product` where id='$delete_id'") or die("Query failed");
    if ($delete_id){
        header('Lacation:..\shehan\NEW.php');
        exit();
    }
    else
    {
        echo "Product not deleted";
        header('Lacation:NEW.php');
    }
}



?>