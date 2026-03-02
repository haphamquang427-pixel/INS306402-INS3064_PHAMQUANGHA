<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';

    if ($username === '') {
        $errors[] = "Username required";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password min 6 chars";
    }

    if ($password !== $confirm) {
        $errors[] = "Passwords do not match";
    }

    if (!$errors) {
        $_SESSION['user'] = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'bio' => '',
            'avatar' => ''
        ];
        header('Location: 16_login.php');
        exit;
    }
}
?>

<h2>Register</h2>

<?php foreach ($errors as $e): ?>
<p style="color:red"><?= htmlspecialchars($e) ?></p>
<?php endforeach; ?>

<form method="POST">
    <input name="username" value="<?= htmlspecialchars($username) ?>" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="confirm" placeholder="Confirm">
    <button>Register</button>
</form>