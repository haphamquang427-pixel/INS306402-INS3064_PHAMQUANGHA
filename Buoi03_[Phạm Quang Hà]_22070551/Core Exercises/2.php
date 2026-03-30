<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

function calculate(float $a, float $b, string $op): float {
    return match ($op) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $b != 0.0 ? $a / $b : throw new Exception("Divide by zero"),
        default => throw new Exception("Invalid operator"),
    };
}

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float)$_POST['a'];
    $b = (float)$_POST['b'];
    $op = $_POST['op'];
    $result = calculate($a, $b, $op);
}
?>
<form method="POST">
    <input name="a">
    <input name="b">
    <select name="op">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <button>Calculate</button>
</form>
<?php if ($result !== null) echo "Result: " . htmlspecialchars((string)$result); ?>