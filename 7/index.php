<?php
$host = "localhost";
$dbname = "shopdb";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Lấy dữ liệu từ các table
$users = $conn->query("SELECT * FROM users LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
$products = $conn->query("SELECT * FROM products LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
$orders = $conn->query("SELECT * FROM orders LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test PDO</title>
</head>
<body>

<h2>Check Console (F12)</h2>

<script>
console.log("Users:", <?php echo json_encode($users); ?>);
console.log("Products:", <?php echo json_encode($products); ?>);
console.log("Orders:", <?php echo json_encode($orders); ?>);
</script>

</body>
</html>