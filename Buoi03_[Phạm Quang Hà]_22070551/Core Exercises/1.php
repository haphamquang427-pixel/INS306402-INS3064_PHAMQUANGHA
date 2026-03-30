<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$name = '';
$email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '' || $email === '') {
        $message = "Missing fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email";
    } else {
        $message = "Thank you, " . htmlspecialchars($name);
    }
}
?>
<form method="POST">
    <input name="name" placeholder="Name" value="<?= htmlspecialchars($name) ?>">
    <input name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>">
    <button>Send</button>
</form>
<p><?= $message ?></p>