<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

session_destroy();
header('Location: 16_login.php');
exit;