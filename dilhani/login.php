<?php 
include('config.php'); 
session_start();


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Customer_Profile WHERE Email='$email'";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();

        
        if (password_verify($password, $row['Password'])) {
           
            $_SESSION['email'] = $email;
            header("Location: ../sithika\index.php");
            exit(); 
        } else {
            
            echo "<script> alert('Invalid password.')</script>";
        }
    } else {
        
        echo "<p>No user found with this email.</p>";
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Athena Fashions</title>
    <link rel="stylesheet" href="..\dilhani\dStyle.css"> 
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

<?php include '..\sithika\header.php'?>

<section class="dbanner">
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" name="login" value="Login">
        </form>

        <h4>Don't have an account? <a href="create_customer.php">Sign Up</a></h4>
    </div>
</section>

<?php include '..\sithika\footer.php' ?>

</body>
</html>
