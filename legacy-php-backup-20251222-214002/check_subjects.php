<?php
require 'db.php';

echo "=== Subjects Table Check ===\n\n";

// Count subjects
$stmt = $pdo->query('SELECT COUNT(*) FROM subjects');
echo "Total subjects: " . $stmt->fetchColumn() . "\n\n";

// Show all subjects
$stmt = $pdo->query('SELECT * FROM subjects ORDER BY department, subject');
$subjects = $stmt->fetchAll();

if (empty($subjects)) {
    echo "SUBJECTS TABLE IS EMPTY!\n\n";
    echo "Need to populate subjects table.\n";
} else {
    echo "Subjects:\n";
    foreach ($subjects as $row) {
        echo "  - {$row['department']}: {$row['subject']} (Sem: {$row['sem']})\n";
    }
}
?>
