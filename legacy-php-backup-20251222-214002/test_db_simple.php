<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing db.php connection...\n";

try {
    require 'db.php';
    echo "PDO exists: " . (isset($pdo) ? 'YES' : 'NO') . "\n";
    if (isset($pdo)) {
        echo "Connection method: " . ($pdo_method ?? 'unknown') . "\n";
        echo "PDO class: " . get_class($pdo) . "\n";
    }
    if (isset($pdo_errors) && !empty($pdo_errors)) {
        echo "Errors:\n";
        print_r($pdo_errors);
    }
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
?>
