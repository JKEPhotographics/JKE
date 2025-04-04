<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email config
    $to = "business30115002@outlook.com"; // Replace with your email
    $subject = "New Contact Form Message";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Message sent successfully
        $messageSent = "Message sent successfully!";
    } else {
        // Error while sending email
        $messageSent = "There was a problem sending your message.";
    }
}
?>

<!-- Contact Form (HTML) -->
<section class="contact">
    <h2>Get in Touch</h2>
    <p>If you have any questions or want to collaborate, feel free to reach out.</p>

    <!-- If there is a message, display it -->
    <?php if (isset($messageSent)): ?>
        <p><?php echo $messageSent; ?></p>
    <?php endif; ?>

    <form action="contact.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send</button>
    </form>
</section>
