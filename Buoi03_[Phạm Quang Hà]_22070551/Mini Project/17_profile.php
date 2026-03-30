<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if (!($_SESSION['auth'] ?? false)) {
    header('Location: 16_login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<h2>Profile</h2>

<p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
<p><strong>Bio:</strong> <?= htmlspecialchars($user['bio']) ?></p>

<?php if ($user['avatar']): ?>
<img src="<?= htmlspecialchars($user['avatar']) ?>" width="150">
<?php endif; ?>

<br><br>
<a href="18_edit.php">Edit Profile</a> |
<a href="19_logout.php">Logout</a>