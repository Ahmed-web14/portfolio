<?php

// Replace this with your email address
$to = "ahmadsolangi814@gmail.com";

// Get values from the form
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validate
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  http_response_code(400);
  echo "Please fill in all fields.";
  exit;
}

// Email headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Email body
$body = "New contact form submission:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n";
$body .= "Message:\n$message\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
  echo "Your message has been sent. Thank you!";
} else {
  http_response_code(500);
  echo "Something went wrong. Message could not be sent.";
}
?>
