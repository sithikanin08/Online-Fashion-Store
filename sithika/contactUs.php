<?php
 include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Athena Fashions</title>
    <link rel="stylesheet" href="..\sithika\CSS\contactUs.css">
    <link rel="icon" href="..\sithika\images\athenaIcon.png">
</head>
<body>

    <?php include '..\sithika\header.php'; ?>

    <div class="contact-container">
        <header>
            <h1>Contact Us</h1>
            <p>We’d love to hear from you! Let’s get in touch.</p>
        </header>

        <section class="contact-form">
            <form action="contact_process.php" method="POST">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <div class="submit-btn">
                    <input type="submit" value="Send Message">
                </div>
            </form>
        </section>

        <section class="contact-info">
            <h2>Other Ways to Connect</h2>
            <p>Email: <a href="mailto:support@athenafashions.com">support@athenafashions.com</a></p>
            <p>Phone: <a href="tel:+94775674890">+94 (77) 567 4890</a></p>
            <p>Address: 123 Park Ave, Thibirigasyaya, Colombo, SL</p>
        </section>

    </div>

    <?php include '..\sithika\footer.php'; ?>

</body>
</html>
