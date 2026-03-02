<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

function sanitize(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function isValidEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

$email = '';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    $msg = isValidEmail($email) ? "Valid email" : "Invalid email";
}
?>
<form method="POST">
    <input name="email" value="<?= htmlspecialchars($email) ?>">
    <button>Check</button>
</form>
<p><?= htmlspecialchars($msg) ?></p>