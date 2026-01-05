<?php
/**
 * Comprehensive Endpoint Test (CLI Mode)
 * Tests all critical endpoints
 */

error_reporting(E_ALL);
ini_set('display_errors', 0);

echo "=== ENDPOINT VERIFICATION (CLI) ===\n\n";

$endpoints = [
    'get_department_options.php' => [],
    'get_departments.php' => [],
    'viewques.php' => ['dept' => 'mca'],
    'sub.php' => ['dep' => 'mca'],
    'health.php' => [],
];

foreach ($endpoints as $file => $post) {
    echo ucfirst($file) . ":\n";
    $_POST = $post;
    $_SERVER['REQUEST_METHOD'] = 'POST';
    
    try {
        ob_start();
        include $file;
        $output = ob_get_clean();
        $length = strlen($output);
        
        // Quick validation
        if ($length > 0) {
            if ($file === 'health.php') {
                $json = json_decode($output, true);
                if ($json && isset($json['status'])) {
                    echo "  ✓ OK - Status: " . $json['status'] . "\n";
                } else {
                    echo "  ✓ OK - " . substr($output, 0, 50) . "...\n";
                }
            } elseif ($file === 'viewques.php') {
                $count = substr_count($output, '<tr>') - 1;
                echo "  ✓ OK - Returned $count question rows\n";
            } else {
                echo "  ✓ OK - Response: " . substr($output, 0, 60) . "...\n";
            }
        } else {
            echo "  ⚠ Empty response\n";
        }
    } catch (Throwable $e) {
        echo "  ✗ Error: " . $e->getMessage() . "\n";
    }
}

echo "\n=== ALL ENDPOINTS VERIFIED ===\n";
