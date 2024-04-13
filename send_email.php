<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Mail headers
    $to = 'support@justcryptome.com';
    $subject = 'New Inquiry from Website';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Send email
    if(mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Mail sending failed.";
    }
}
?>