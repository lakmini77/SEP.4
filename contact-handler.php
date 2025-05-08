<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // You can store this in a database or send it via email
    // Example: Sending a confirmation (you can replace this with database insertion)

    // Send email (optional)
    $to = "janiduillesinghe@gmail.com"; // Replace with your admin email
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your message has been sent successfully.'); window.location.href='contact-us.php';</script>";
    } else {
        echo "<script>alert('Message could not be sent. Please try again.'); window.history.back();</script>";
    }
} else {
    header("Location: contact-us.php");
    exit;
}
