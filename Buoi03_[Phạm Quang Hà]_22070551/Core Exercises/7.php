<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

$name = $_SESSION['name'] ?? 'Guest';
echo "Welcome " . htmlspecialchars($name);