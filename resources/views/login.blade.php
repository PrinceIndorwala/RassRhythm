<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            border-radius: 10px;
            overflow: hidden;
        }
        .welcome-section {
            width: 40%;
            background-color: #e78be7;
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .welcome-section h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .welcome-section p {
            font-size: 1rem;
            margin-top: 15px;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons i {
            font-size: 20px;
            margin-right: 10px;
            cursor: pointer;
        }
        .login-section {
            width: 60%;
            padding: 50px;
        }
        .login-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-login {
            width: 100%;
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
        .forgot-password {
            text-align: right;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
        <h1>Welcome!</h1>
        <p>Log in to your account to continue your journey into the vibrant world of Garba! Whether you're a beginner or an experienced dancer, our classes offer something for everyone.</p>
        <p>Get ready to enjoy energetic moves, build your rhythm, and celebrate the tradition of Garba!</p>
        <div class="social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-pinterest"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="login-section">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password" required>

            <button type="submit" class="btn btn-login btn-block">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register here.</a></p>
        <div class="text-center mt-3">
        <a href="{{ route('index') }}" class="btn btn-outline-secondary">Continue without login</a>
    </div>
    </div>
</div>
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(request()->has('message'))
    <div class="alert alert-warning">
        {{ request()->get('message') }}
    </div>
@endif


<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
