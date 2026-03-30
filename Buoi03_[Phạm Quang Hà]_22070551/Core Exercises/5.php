<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$name = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name === '') {
        $error = "Name required";
    }
}
?>
<form method="POST">
    <input name="name" value="<?= htmlspecialchars($name) ?>">
    <button>Submit</button>
</form>
<p style="color:red"><?= htmlspecialchars($error) ?></p>