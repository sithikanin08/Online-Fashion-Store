Share


You said:
<?php 
include('config.php'); 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
  
    $sql = "INSERT INTO Customer_Profile (Name, Email, Contact_No, Age, Address, DoB, Password) 
            VALUES ('$name', '$email', '$contact', '$age', '$address', '$dob', '$password')";
    
 
    if ($con->query($sql) === TRUE) {
        $message = "Customer profile created successfully!";
        $popupType = 'success';
    } else {
        $message = "Error: " . $con->error;
        $popupType = 'error';
    }
    
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer Profile | Athena Fashions</title>
    <link rel="stylesheet" href="..\dilhani\dStyle.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">

  
    <style>
       
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
            padding-top: 60px;
        }

      
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 400px;
        }

      
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>

</head>
<body>

<?php include '..\sithika\header.php'; ?>

<section class="banner">
    <div class="container">
        <h1>Create Customer Profile</h1>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="modal-message"></p>
            </div>
        </div>

        <?php 
        
        if (isset($message) && isset($popupType)) {
            echo "<script>
                    window.onload = function() {
                        showModal('$message', '$popupType');
                    }
                  </script>";
        }
        ?>

        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" pattern="^\d{10}$" title="Please enter exactly 10 digits." required>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="1" max="120" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <div class="button-group">
            <input type="submit" name="submit" value="Create Account">
            <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</section>

<?php include '..\sithika\footer.php'; ?>

<!-- JavaScript for handling modal popup -->
<script>
    // Function to show the modal with a message
    function showModal(message, type) {
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var modalMessage = document.getElementById("modal-message");

        
        modalMessage.className = type;
        modalMessage.innerHTML = message;

      
        modal.style.display = "block";

       
        span.onclick = function() {
            modal.style.display = "none";
        }

        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>

</body>
</html>