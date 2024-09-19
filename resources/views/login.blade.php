<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stock Pathshala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('{{ asset('images/bg-image.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            text-align: center;
        }
        .login-card h3 {
            margin-bottom: 1rem;
            font-size: 1.75rem;
            color: #333;
        }
        .login-card .brand-logo {
            width: 120px; /* Adjust size as needed */
            margin-bottom: 1rem;
        }
        .login-card .form-control {
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .login-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 1rem;
        }
        .login-card .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .login-card .alert {
            margin-top: 1rem;
            border-radius: 8px;
        }
        .login-card .footer {
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-card">
    <img src="{{ asset('images/stock-logo.jpg') }}" alt="Stock Pathshala" class="brand-logo">
        <h3>Login to Stock Pathshala</h3>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="user_name" class="form-label">Mobile Number</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter yourr mobile number" required>
                @error('user_name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            @if(session('login_error'))
                <div class="alert alert-danger">{{ session('login_error') }}</div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Send OTP</button>
        </form>

        <div class="footer">
            <small>© {{ date('Y') }} Stock Pathshala. All rights reserved.</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
