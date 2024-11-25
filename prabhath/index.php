<html>
<head>
    <link rel="stylesheet" type="text/css" href="..\prabhath\new5.css">
    <title>Feedback Form | Athena Fashions</title>
    <script src="feescript.js" defer></script>
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>

<body>

<?php include '..\sithika\header.php'; ?>

    <section class = "banner">

        <div class="feedback-form">
            <h2>Feedback Form</h2>
            <form method="post" action="insert.php">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required> <br>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required> <br>

                <label for="feedback_type">Feedback Type:</label>
                <select id="feedback_type" name="feedback_type" required>
                    <option value="" disabled selected></option>
                    <option value="clothes">Clothes</option>
                    <option value="service">Service</option>
                    <option value="product">Product</option>
                </select> <br>

                <label for="feedback_message">Feedback Message:</label> <br>
                <textarea id="feedback_message" name="feedback_message" rows="4" required></textarea> <br>

                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="" disabled selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select> <br>

                <div class="button-container">
                    <input type="submit" value="Submit"> 
                </div>
            </form>
        </div>

    </section>

    <?php
        require 'config.php';
    ?>

    <?php include '..\sithika\footer.php'; ?>

</body>
</html>
