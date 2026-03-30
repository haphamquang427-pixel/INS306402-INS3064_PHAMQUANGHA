<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = $_POST['name'];
    header('Location: 7.php');
    exit;
}
?>
<form method="POST">
    <input name="name">
    <button>Next</button>
</form>