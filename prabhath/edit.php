<?php
require 'config.php'; // Include the database connection file

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID and ensure it's an integer

    // Retrieve the existing data for the given ID
    $sql = "SELECT Id, NAME, Email, Contact, feedback_message, rating FROM feedbacks WHERE Id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the ID parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the existing data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

// Handle form submission to update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and sanitize input data
    $studname = $con->real_escape_string(trim($_POST["fullname"]));
    $studemail = $con->real_escape_string(trim($_POST["email"]));
    $studcontact = $con->real_escape_string(trim($_POST["feedback_type"]));
    $studaddress = $con->real_escape_string(trim($_POST["feedback_message"]));
    $rating = (int)$_POST["rating"]; // Cast to integer for safety

    // Update the database
    $update_sql = "UPDATE feedbacks SET NAME = ?, Email = ?, Contact = ?, feedback_message = ?, rating = ? WHERE Id = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("ssssii", $studname, $studemail, $studcontact, $studaddress, $rating, $id);

    if ($update_stmt->execute()) {
        // Redirect to read.php after successful update
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . $update_stmt->error;
    }

    // Close the update statement
    $update_stmt->close();
}

// Close the initial statement
$stmt->close();

// Close the connection only if it's open
if ($con) {
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..\prabhath\form.css">
    <title>Edit Feedback | Athena Fashions</title>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
    <style>
        
        .toast {
            display: none; 
            position: fixed; 
            right: 20px; 
            top: 20px; 
            background-color: #4CAF50;
            color: white; 
            padding: 15px;
            border-radius: 5px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); 
            z-index: 1000; 
            transition: opacity 0.5s ease; 
        }
    </style>
</head>
<body>
    <?php include '..\sithika\header.php'; ?>

    <section class="banner">

    <div class="feedback-form">
        <h2>Edit Feedback</h2>
        <form method="post" action="">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($row['NAME']); ?>" required> <br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['Email']); ?>" required> <br>

            <label for="feedback_type">Feedback Type:</label>
            <select id="feedback_type" name="feedback_type" required>
                <option value="" disabled>Select feedback type</option>
                <option value="clothes" <?php echo ($row['Contact'] == 'clothes') ? 'selected' : ''; ?>>Clothes</option>
                <option value="service" <?php echo ($row['Contact'] == 'service') ? 'selected' : ''; ?>>Service</option>
                <option value="product" <?php echo ($row['Contact'] == 'product') ? 'selected' : ''; ?>>Product</option>
            </select> <br>

            <label for="feedback_message">Feedback Message:</label> <br>
            <textarea id="feedback_message" name="feedback_message" rows="4" required><?php echo htmlspecialchars($row['feedback_message']); ?></textarea> <br>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="" disabled selected>Select rating</option>
                <option value="1" <?php echo ($row['rating'] == 1) ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo ($row['rating'] == 2) ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo ($row['rating'] == 3) ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo ($row['rating'] == 4) ? 'selected' : ''; ?>>4</option>
                <option value="5" <?php echo ($row['rating'] == 5) ? 'selected' : ''; ?>>5</option>
            </select> <br>

            <div class="button-container">
                <input type="submit" value="Update" onclick='return confirm(\"Are you sure you want to delete this entry?\")\'> 
            </div>
        </form>
    </div>

    </section>

    <?php include '..\sithika\footer.php'; ?>
</body>
</html>
