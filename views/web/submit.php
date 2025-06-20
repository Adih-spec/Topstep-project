<?php
$feedback = ""; // Empty feedback initially

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "contact_db");

    if ($conn->connect_error) {
        $feedback = "❌ Connection failed: " . $conn->connect_error;
    } else {
        // Get and sanitize form data
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $message = $conn->real_escape_string($_POST['message']);

        // Insert into database
        $sql = "INSERT INTO messages (name, email, subject, message)
                VALUES ('$name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            $feedback = "✅ Your message was sent successfully!";
        } else {
            $feedback = "❌ Error: " . $conn->error;
        }

        $conn->close();
    }
}
?>