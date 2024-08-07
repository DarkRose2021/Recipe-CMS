<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = htmlspecialchars($_POST['message']);

    // Prepare the email
    $to = "jaceandrj@gmail.com"; 
    $headers = "From: " . $email;
    $body = "Subject: $subject\n\nMessage:\n$message";


    // Debugging output
    echo "Form submitted successfully.<br>";
    echo "Email: $email<br>";
    echo "Subject: $subject<br>";
    echo "Message: $message<br>";



    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us! We will get back to you shortly.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
    
}
?>

<form action="" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Submit">
</form>
