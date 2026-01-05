<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Testing All Endpoints ===\n\n";

// Test 1: get_subjects.php
echo "1. Testing get_subjects.php (mca):\n";
$_POST['department'] = 'mca';
ob_start();
include 'get_subjects.php';
$output = ob_get_clean();
echo "   Result: " . (strlen($output) > 0 ? strlen($output) . " bytes, " . substr_count($output, '<option') . " options" : "EMPTY") . "\n";
echo "   Sample: " . substr($output, 0, 200) . "\n\n";

// Test 2: sub.php
echo "2. Testing sub.php (mca):\n";
$_POST = ['department' => 'mca'];
ob_start();
include 'sub.php';
$output = ob_get_clean();
echo "   Result: " . (strlen($output) > 0 ? strlen($output) . " bytes, " . substr_count($output, '<option') . " options" : "EMPTY") . "\n";
echo "   Sample: " . substr($output, 0, 200) . "\n\n";

// Test 3: viewques.php
echo "3. Testing viewques.php (mca):\n";
$_GET['department'] = 'mca';
ob_start();
include 'viewques.php';
$output = ob_get_clean();
echo "   Result: " . (strlen($output) > 0 ? strlen($output) . " bytes, " . substr_count($output, '<tr') . " rows" : "EMPTY") . "\n\n";

// Test 4: add.php
echo "4. Testing add.php (test question):\n";
$_POST = [
    'department' => 'mca',
    'subject' => 'Test Subject',
    'unit' => '1',
    'question' => 'Test question?',
    'marks' => '5'
];
ob_start();
include 'add.php';
$output = ob_get_clean();
echo "   Result: " . trim($output) . "\n\n";

echo "=== All Tests Complete ===\n";
?>
