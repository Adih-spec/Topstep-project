<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $role }} Account Credentials</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 30px; }
        .card { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h2 { color: #2d3748; }
        .credentials { background: #f1f1f1; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome to {{ $role }} Portal</h2>
        <p>Hello <strong>{{ $name }}</strong>,</p>
        <p>Your {{ $role }} account has been created successfully. Use the credentials below to log in:</p>

        <div class="credentials">
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>

        <p><a href="{{ url('/login') }}">Click here to log in</a></p>
        <p><em>Please change your password immediately after login for security reasons.</em></p>

        <div class="footer">
            &copy; {{ date('Y') }} School Management System. All rights reserved.
        </div>
    </div>
</body>
</html>
