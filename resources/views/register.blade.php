<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h1 class="text-center mb-4" style="font-weight: 800; padding-top: 1px;">Create Account</h1>
        <br>
        <form class="formLogin" action="{{route('user.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Nama" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="text" name="phone" placeholder="Nomor Telepon" required />
            <textarea type="text" name="address" rows="3"
                placeholder="Alamat"></textarea>
            <button style="margin-top: 15px;" class="btn btn-info" type="submit">Register</button>
        </form>
        <p class="register-link">Already have an account? <a href="{{ route('loginUser') }}">Login here</a></p>
    </div>

    <x-footer />>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
