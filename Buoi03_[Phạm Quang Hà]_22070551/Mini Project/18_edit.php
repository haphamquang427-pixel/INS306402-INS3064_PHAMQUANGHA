<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if (!($_SESSION['auth'] ?? false)) {
    header('Location: 16_login.php');
    exit;
}

$user = &$_SESSION['user'];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user['bio'] = trim($_POST['bio'] ?? '');

    if (!empty($_FILES['avatar']['name'])) {

        $allowed = ['image/jpeg','image/png'];

        if (in_array($_FILES['avatar']['type'], $allowed, true)) {

            if (!is_dir('uploads')) {
                mkdir('uploads');
            }

            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $file = 'uploads/' . bin2hex(random_bytes(6)) . '.' . $ext;

            move_uploaded_file($_FILES['avatar']['tmp_name'], $file);
            $user['avatar'] = $file;
        }
    }

    $message = "Updated";
}
?>

<h2>Edit Profile</h2>

<p style="color:green"><?= htmlspecialchars($message) ?></p>

<form method="POST" enctype="multipart/form-data">
    <textarea name="bio"><?= htmlspecialchars($user['bio']) ?></textarea><br>
    <input type="file" name="avatar"><br>
    <button>Save</button>
</form>

<a href="17_profile.php">Back</a>