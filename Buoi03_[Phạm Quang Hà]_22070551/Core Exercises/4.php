<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$q = trim($_GET['q'] ?? '');
?>
<form>
    <input name="q" value="<?= htmlspecialchars($q) ?>">
    <button>Search</button>
</form>
<?php if ($q !== '') echo "You searched: " . htmlspecialchars($q); ?>