<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Admin Credentials</title>
</head>
<body>
    <h2>Hello {{ $name }},</h2>

    <p>Your admin account has been successfully created.</p>

    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <p>Please log in to the system and change your password immediately for security.</p>

    <br>
    <p>Regards,<br>
    School Management System</p>
</body>
</html>
