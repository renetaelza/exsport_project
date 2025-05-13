<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <x-navbar2 />>

    <div class="login-container">
        <h1 class="text-center mb-4" style="font-weight: 800; padding-top: 60px;">Welcome Back!</h1>
        <br>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <form class="formLogin" action="{{route('user.login')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <div style="font-size: 13px; display: flex; align-items: center;">
                <input type="checkbox" name="remember" id="remember" class="form-check-input"
                    style="transform: scale(0.6); margin-right: 5px;">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <button style="margin-top: 15px;" class="btn btn-info" type="submit">Login</button>
        </form>
        <p class="register-link">Don't have an account? <a href="{{ route('registerUser') }}">Register here</a></p>
    </div>

    <x-footer />>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
