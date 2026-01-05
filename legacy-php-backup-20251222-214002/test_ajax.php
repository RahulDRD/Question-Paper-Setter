<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

echo "Testing get_department_options.php...\n\n";

// Test include
ob_start();
try {
    include 'get_department_options.php';
    $output = ob_get_clean();
    echo "SUCCESS:\n";
    echo $output;
    echo "\n\nOption count: " . substr_count($output, '<option');
} catch (Throwable $e) {
    ob_end_clean();
    echo "ERROR: " . $e->getMessage();
    echo "\nFile: " . $e->getFile();
    echo "\nLine: " . $e->getLine();
}
?>
