<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

$_SESSION['attempts'] ??= 0;
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['user'] === 'admin' && $_POST['pass'] === '1234') {
        $_SESSION['attempts'] = 0;
        $msg = "Login success";
    } else {
        $_SESSION['attempts']++;
        $msg = "Failed. Attempts: " . $_SESSION['attempts'];
    }
}
?>
<form method="POST">
    <input name="user">
    <input type="password" name="pass">
    <button>Login</button>
</form>
<p><?= htmlspecialchars($msg) ?></p>