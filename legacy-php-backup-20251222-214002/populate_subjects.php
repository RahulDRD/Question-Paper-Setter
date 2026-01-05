<?php
require 'db.php';

echo "=== Populating Subjects Table ===\n\n";

$departments = ['mca', 'mba', 'btech'];

foreach ($departments as $dept) {
    echo "Processing $dept...\n";
    
    // Get unique subjects from department table
    $sql = "SELECT DISTINCT subject, semester FROM \"$dept\" ORDER BY subject";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    
    foreach ($rows as $row) {
        $subject = $row['subject'];
        $semester = $row['semester'] ?? 1;
        
        // Check if already exists
        $checkSql = "SELECT COUNT(*) FROM subjects WHERE LOWER(TRIM(department)) = LOWER(TRIM(:dept)) AND LOWER(TRIM(subject)) = LOWER(TRIM(:subject))";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute([':dept' => $dept, ':subject' => $subject]);
        
        if ($checkStmt->fetchColumn() == 0) {
            // Insert
            $insertSql = "INSERT INTO subjects (department, sem, subject) VALUES (:dept, :sem, :subject)";
            $insertStmt = $pdo->prepare($insertSql);
            $insertStmt->execute([
                ':dept' => $dept,
                ':sem' => $semester,
                ':subject' => $subject
            ]);
            echo "  + Added: $subject (Sem: $semester)\n";
        } else {
            echo "  - Skipped (exists): $subject\n";
        }
    }
}

// Show final count
$stmt = $pdo->query('SELECT COUNT(*) FROM subjects');
echo "\n=== Complete ===\n";
echo "Total subjects in table: " . $stmt->fetchColumn() . "\n";
?>
