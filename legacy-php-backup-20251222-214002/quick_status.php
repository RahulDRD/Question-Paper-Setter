<?php
/**
 * Quick Endpoint Status Check
 */

echo "=== ENDPOINT STATUS CHECK ===\n\n";

$tests = [
    'get_department_options.php' => function() {
        ob_start();
        $_POST = [];
        include 'get_department_options.php';
        $out = ob_get_clean();
        return strpos($out, '<option') !== false ? (substr_count($out, '<option') . " options") : "FAIL";
    },
    'viewques.php (mca)' => function() {
        ob_start();
        $_POST = ['dept' => 'mca'];
        include 'viewques.php';
        $out = ob_get_clean();
        $rows = substr_count($out, '<tr>') - 1;
        return $rows > 0 ? "$rows questions" : "FAIL";
    },
    'sub.php (mca)' => function() {
        ob_start();
        $_POST = ['dep' => 'mca'];
        include 'sub.php';
        $out = ob_get_clean();
        return strlen($out) > 20 ? "OK" : "FAIL";
    },
    'test_neon.php' => function() {
        ob_start();
        include 'test_neon.php';
        $out = ob_get_clean();
        return strpos($out, "✓") !== false ? "PASS" : "FAIL";
    },
];

foreach ($tests as $name => $fn) {
    echo "$name: ";
    try {
        echo "✓ " . $fn() . "\n";
    } catch (Throwable $e) {
        echo "✗ " . substr($e->getMessage(), 0, 40) . "\n";
    }
}

echo "\n=== CHECK COMPLETE ===\n";
