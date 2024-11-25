<?php
require 'config.php'; // Include the database connection file

// Retrieve data from the student2 table
$sql = "SELECT Id, NAME, Email, Contact, feedback_message, rating FROM feedbacks"; 
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..\prabhath\table2.css">
    <title>Feedback Data | Athena Fashions</title>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
    <script type="text/javascript">
        // Function to confirm deletion
        function confirmDelete() {
            return confirm("Do you want to delete this record?");
        }
        
        // Function to confirm editing
        function confirmEdit() {
            return confirm("Do you want to edit this field?");
        }
    </script>
</head>
<body>

<?php include '..\sithika\header.php'; ?>

<section class="banner">

    <div class="data-table">
        <h2>Feedback Submissions</h2>
        <button onclick="window.location.href='../prabhath/index.php'">Create New Feedback</button>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback Type</th>
                    <th>Feedback Message</th>
                    <th>Rating</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are results
                if ($result && $result->num_rows > 0) {
                    $counter = 1; // Initialize a counter variable
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $counter++ . "</td> <!-- Increment counter for each row -->
                                <td>" . htmlspecialchars($row["NAME"]) . "</td>
                                <td>" . htmlspecialchars($row["Email"]) . "</td>
                                <td>" . htmlspecialchars($row["Contact"]) . "</td>
                                <td>" . htmlspecialchars($row["feedback_message"]) . "</td>
                                <td>" . htmlspecialchars($row["rating"]) . "</td>
                                <td><a href='edit.php?id=" . $row["Id"] . "' onclick = 'confirmEdit();' >Edit</a></td>
                                <td><a href='delete.php?id=" . $row["Id"] . "' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No feedback submissions found.</td></tr>";
                }
                ?>
            </tbody>
        </table>


        <button onclick="window.location.href='index.php'">Back</button>
        
    </div>

</section>

    <?php
    // Close the database connection
    $con->close();
    ?>

<?php include '..\sithika\footer.php'; ?>

</body>
</html>
