<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['cf-name'] ?? '');
    $email = trim($_POST['cf-email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['cf-message'] ?? '');

    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "E-mail must be valid and message must be longer than 1 character."]);
        exit;
    }

    // Nastavenie e-mailu (prispôsob si podľa potreby)
    $to = "your@email.com";
    $headers = "From: $email\r\n" . "Reply-To: $email\r\n" . "Content-Type: text/plain; charset=UTF-8\r\n";
    $fullMessage = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo json_encode(["status" => "success", "message" => "Your message has been sent successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Message could not be sent."]);
    }
    exit;
}
