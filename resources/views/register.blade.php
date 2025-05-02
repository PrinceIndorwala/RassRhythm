<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            width: 70%;
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
        .register-section {
            width: 60%;
            padding: 50px;
        }
        .register-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-register {
            width: 100%;
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
        <h1>Welcome!</h1>
        <p>Create an account to join us and enjoy our services.</p>
        <div class="social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-pinterest"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="register-section">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your full name" required>

            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" class="form-control" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter your address" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter your phone number" pattern="[0-9]{10}" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>

            <!-- Add Password Confirmation if needed -->
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>

            <button type="submit" class="btn btn-register btn-block">Register</button>
        </form>

        <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here.</a></p>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
