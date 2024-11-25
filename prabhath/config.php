<?php
 $con=new mysqli("localhost","root","","athena_fashion_store");

 if($con->connect_error)
 {
    die("connection failed".$con->connect_error);
 }
 
?>