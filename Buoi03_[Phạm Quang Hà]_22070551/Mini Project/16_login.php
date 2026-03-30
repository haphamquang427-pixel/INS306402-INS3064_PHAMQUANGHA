<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (
        isset($_SESSION['user']) &&
        $_SESSION['user']['username'] === $username &&
        password_verify($password, $_SESSION['user']['password'])
    ) {
        $_SESSION['auth'] = true;
        header('Location: 17_profile.php');
        exit;
    }

    $error = "Invalid credentials";
}
?>

<h2>Login</h2>

<p style="color:red"><?= htmlspecialchars($error) ?></p>

<form method="POST">
    <input name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
</form>