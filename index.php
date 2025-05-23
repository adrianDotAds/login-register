<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error)
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm)
{
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login',$activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h1>Login</h1>
                <?= showError($errors['login']); ?>
                <input type="text" id="email" name="email" placeholder = "Email" required/>
                <br />
                <input type="password" id="password" name="password" placeholder="Password" required/>
                <br />
                <button type="submit" name='login'>Login</button>
            </form>
            <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register here</a></p>
        </div>
        <div class="form-box <?= isActiveForm('register',$activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h1>Register</h1>
                <?= showError($errors['register']); ?>
                <input type="text" id="name" name="name" placeholder="Name" required/>
                <input type="date" id="birthdate" name="birthdate" placeholder="Birthdate" required/>
                <select id="role" name="role" placeholder='Role' required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                <input type="text" id="email" name="email" placeholder="Email" required/>
                <br />
                <input type="password" id="password" name="password" placeholder="Password" required/>
                <br />
                <button type="submit" name='register'>Sign Up</button>
            </form>
            <br />
            <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login here</a></p>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>