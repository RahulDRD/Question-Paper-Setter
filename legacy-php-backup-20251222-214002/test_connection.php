<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing db.php connection...\n\n";

require_once __DIR__ . '/db.php';

echo "pdo isset: " . (isset($pdo) ? 'true' : 'false') . "\n";
echo "pdo instanceof PDO: " . (isset($pdo) && $pdo instanceof PDO ? 'true' : 'false') . "\n";
echo "pdo_method: " . ($pdo_method ?? 'null') . "\n";
echo "pdo_errors: " . json_encode($pdo_errors ?? []) . "\n\n";

if ($pdo) {
    echo "Successfully connected to database!\n";
    try {
        $version = $pdo->query('SELECT version()')->fetchColumn();
        echo "Version: $version\n";
    } catch (Exception $e) {
        echo "Error getting version: " . $e->getMessage() . "\n";
    }
} else {
    echo "Failed to connect to database\n";
    echo "Errors: " . json_encode($pdo_errors ?? []) . "\n";
}
