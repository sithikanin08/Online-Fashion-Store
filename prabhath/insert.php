<?php

require 'config.php';

$studname=$_POST["fullname"];
$studemail=$_POST["email"];
$studcontact=$_POST["feedback_type"];
$studaddress=$_POST["feedback_message"];
$rating=$_POST["rating"];
  

$sql="INSERT INTO feedbacks VALUES ('$studname','','$studemail','$studcontact','$studaddress','$rating')";

if($con->query($sql))
{
    header("Location: read.php");
}

else
{
    echo "error".$con->error;
}

$con->close();

?>