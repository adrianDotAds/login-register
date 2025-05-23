<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = $connection->query("SELECT * FROM users WHERE users_email='$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email already exists!';
        $_SESSION['active_form'] = 'register';
    } else {
        $connection->query("INSERT INTO users (users_name, users_bdate, users_role, users_email, users_password)
                            VALUES ('$name', '$birthdate', '$role', '$email', '$password')");
    }
    header('Location: index.php');
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $connection->query("SELECT * FROM users WHERE users_email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['users_password'])) {
            $_SESSION['name'] = $user['users_name'];
            $_SESSION['email'] = $user['users_email'];
            $_SESSION['role'] = $user['users_role'];
            $_SESSION['password'] = $user['users_password'];

            if ($user['users_role'] === 'admin') {
                header('Location: admin_page.php');
            } else {
                header('Location: user_page.php');
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Incorrect password!';
            $_SESSION['active_form'] = 'login';
        }
    } else {
        $_SESSION['login_error'] = 'Email not found!';
        $_SESSION['active_form'] = 'login';
    }

    header('Location: index.php');
    exit();
}
?>
