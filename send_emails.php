<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Specify your email address
    $to = "abhimanyusikarwar08@gmail.com"; // CHANGE IT to your email address
    $subject = "Message from Website Contact Form";
    
    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Attempt to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank-you page or display a success message
        echo "Thank You! Your message has been sent.";
    } else {
        // Display an error message
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // Not a POST request, display an error message
    echo "There was a problem with your submission, please try again.";
}
?>
