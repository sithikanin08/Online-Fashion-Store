<?php

$conn= new mysqli("localhost","root","","athena_fashion_store");

if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}

?>