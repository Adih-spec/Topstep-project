<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardian Login</title>
  <style>
    body {
      margin: 0; font-family: Arial, sans-serif;
      background: #f3f6fa; display: flex;
      justify-content: center; align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #fff; padding: 30px; border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 100%; max-width: 350px; text-align: center;
    }
    .input-box { margin-bottom: 15px; text-align: left; }
    .input-box label { font-size: 14px; color: #555; display: block; margin-bottom: 5px; }
    .input-box input {
      width: 100%; padding: 10px; border: 1px solid #ddd;
      border-radius: 8px; font-size: 14px;
    }
    .login-btn {
      width: 100%; padding: 10px; background: #0066cc;
      border: none; color: white; font-size: 16px;
      border-radius: 8px; cursor: pointer;
    }
    .login-btn:hover { background: #004d99; }
    .extra-links { margin-top: 15px; font-size: 14px; }
    .extra-links a { color: #0066cc; text-decoration: none; }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Guardian Login</h2>

    {{-- Error Message --}}
    @if(session('error'))
      <p style="color:red;">{{ session('error') }}</p>
    @endif
    @if(session('success'))
      <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('guardian.login') }}" method="POST">
      @csrf
      <div class="input-box">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        @error('username') <small style="color:red;">{{ $message }}</small> @enderror
      </div>
      <div class="input-box">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <small style="color:red;">{{ $message }}</small> @enderror
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="extra-links">
      <p>Don’t have an account? <a href="{{ route('guardian.register') }}">Register</a></p>
    </div>
  </div>
</body>
</html>
