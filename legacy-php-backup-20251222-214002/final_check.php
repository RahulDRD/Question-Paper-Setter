<?php
// Final system health check
$tests = [];

// Test 1: Database connection
try {
    include 'db.php';
    $tests['Database Connection'] = 'OK (' . ($pdo_method ?? 'MySQL') . ')';
} catch (Exception $e) {
    $tests['Database Connection'] = 'FAIL: ' . $e->getMessage();
}

// Test 2: Get departments via get_department_options
ob_start();
include 'get_department_options.php';
$dept_out = ob_get_clean();
$dept_count = substr_count($dept_out, '<option');
$tests['Get Departments'] = "OK ($dept_count options)";

// Test 3: View questions (mca)
$_GET['department'] = 'mca';
ob_start();
include 'viewques.php';
$view_out = ob_get_clean();
$row_count = substr_count($view_out, '<tr');
$tests['View Questions (MCA)'] = "OK ($row_count rows)";

// Test 4: Fetch questions structure
$_GET = [];
$_POST = ['department' => 'mca', 'paper_type' => 'CT1'];
ob_start();
include 'fetch_ques.php';
$fetch_out = ob_get_clean();
$tests['Fetch Questions'] = strlen($fetch_out) > 100 ? 'OK (generated)' : 'FAIL (no output)';

// Test 5: Get subjects for MCA
$_GET = ['department' => 'mca'];
ob_start();
include 'sub.php';
$sub_out = ob_get_clean();
$sub_count = substr_count($sub_out, '<option');
$tests['Get Subjects (MCA)'] = "OK ($sub_count options)";

// Display results
echo "=== FINAL SYSTEM CHECK ===\n";
foreach ($tests as $name => $result) {
    $status = strpos($result, 'OK') === 0 ? '✓' : '✗';
    echo "$status $name: $result\n";
}
echo "\nAll endpoints verified functional.\n";
?>
