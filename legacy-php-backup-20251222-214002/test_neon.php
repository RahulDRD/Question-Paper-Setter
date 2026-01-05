<?php
/**
 * Test Neon Database Integration
 * Checks: 1) Connection 2) Department tables 3) Subjects table 4) Fetch questions
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/db.php';

echo "=== NEON DATABASE INTEGRATION TEST ===\n\n";

// Test 1: Connection
echo "1. DATABASE CONNECTION\n";
if (isset($pdo) && $pdo instanceof PDO) {
    echo "✓ PDO initialized\n";
    echo "   Method: " . ($pdo_method ?? 'unknown') . "\n";
    
    try {
        $version = $pdo->query('SELECT version()')->fetchColumn();
        echo "✓ Connected to: " . substr($version, 0, 40) . "...\n";
    } catch (Exception $e) {
        echo "✗ Connection test failed: " . $e->getMessage() . "\n";
    }
} else {
    echo "✗ PDO not initialized\n";
    echo "   Errors: " . json_encode($pdo_errors ?? []) . "\n";
    exit(1);
}

// Test 2: Department Tables
echo "\n2. DEPARTMENT TABLES (btech, mca, mba)\n";
$tables = ['btech', 'mca', 'mba'];
foreach ($tables as $table) {
    try {
        $count = $pdo->query("SELECT COUNT(*) FROM \"$table\"")->fetchColumn();
        echo "✓ $table: $count questions\n";
    } catch (Exception $e) {
        echo "✗ $table: " . $e->getMessage() . "\n";
    }
}

// Test 3: Subjects Table
echo "\n3. SUBJECTS TABLE\n";
try {
    $subjects = $pdo->query("SELECT department, COUNT(*) as cnt FROM subjects GROUP BY department ORDER BY department")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($subjects)) {
        echo "⚠ No subjects found\n";
    } else {
        echo "✓ Subjects by department:\n";
        foreach ($subjects as $row) {
            echo "   " . $row['department'] . ": " . $row['cnt'] . " subjects\n";
        }
    }
} catch (Exception $e) {
    echo "✗ Subjects query failed: " . $e->getMessage() . "\n";
}

// Test 4: Sample Questions
echo "\n4. SAMPLE QUESTIONS (mca)\n";
try {
    $sample = $pdo->query("SELECT subject, unit, marks, COUNT(*) as cnt FROM mca GROUP BY subject, unit, marks ORDER BY subject, unit, marks LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($sample)) {
        echo "⚠ No questions found in mca\n";
    } else {
        echo "✓ Question distribution:\n";
        foreach ($sample as $row) {
            echo "   " . str_pad($row['subject'], 20) . " Unit" . $row['unit'] . " (" . $row['marks'] . "m): " . $row['cnt'] . " questions\n";
        }
    }
} catch (Exception $e) {
    echo "✗ Sample query failed: " . $e->getMessage() . "\n";
}

// Test 5: Fetch Questions Logic
echo "\n5. FETCH QUESTIONS TEST (mca, Unit 1, 8-mark, Sample Subject)\n";
try {
    $result = $pdo->query("SELECT subject FROM subjects WHERE department = 'mca' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $subject = $result['subject'];
        $q = $pdo->prepare("SELECT COUNT(*) FROM mca WHERE unit = :unit AND marks = :marks AND LOWER(TRIM(subject)) = LOWER(TRIM(:sub))");
        $q->execute([':unit' => 1, ':marks' => 8, ':sub' => $subject]);
        $count = $q->fetchColumn();
        echo "✓ Found $count questions for: $subject, Unit 1, 8-mark\n";
    } else {
        echo "⚠ No subjects found to test\n";
    }
} catch (Exception $e) {
    echo "✗ Fetch test failed: " . $e->getMessage() . "\n";
}

echo "\n=== TEST COMPLETE ===\n";
