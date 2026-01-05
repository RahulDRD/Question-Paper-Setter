<?php
// Test get_department_options.php
$_POST = [];
ob_start();
include 'get_department_options.php';
$output = ob_get_clean();
echo "OUTPUT:\n";
echo $output;
echo "\n\nOptionCount: " . substr_count($output, '<option');
