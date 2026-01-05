<?php
/**
 * Fetch questions for exam paper generation
 * Refactored for Neon PostgreSQL via PDO
 * Falls back to MySQL if needed
 */

require_once __DIR__ . '/db.php';

$ex = isset($_POST['ex']) ? trim($_POST['ex']) : '';
$sem = isset($_POST['sem']) ? trim($_POST['sem']) : '';
$sub = isset($_POST['sub']) ? trim($_POST['sub']) : '';
$dep = isset($_POST['dep']) ? trim($_POST['dep']) : '';

// Initialize arrays for questions by unit and marks
$unit1o = $unit2o = $unit3o = $unit4o = $unit5o = [];
$unit14o = $unit24o = $unit34o = $unit44o = $unit54o = [];

// Helper function to fetch questions by unit and marks
function fetchQuestions($pdo, $table, $unit, $marks, $subject) {
    try {
        $sql = "SELECT question FROM \"$table\" 
                WHERE unit = :unit 
                AND marks = :marks 
                AND LOWER(TRIM(subject)) = LOWER(TRIM(:subject))
                ORDER BY sno";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':unit' => $unit, ':marks' => $marks, ':subject' => $subject]);
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row['question'];
        }
        return $result;
    } catch (Throwable $e) {
        return [];
    }
}

// Fetch questions using Neon
if (isset($pdo) && $pdo instanceof PDO) {
    $safeDep = preg_replace('/[^A-Za-z0-9_]/', '', $dep);
    
    // Fetch 8-mark questions
    $unit1o = fetchQuestions($pdo, $safeDep, 1, 8, $sub);
    $unit2o = fetchQuestions($pdo, $safeDep, 2, 8, $sub);
    $unit3o = fetchQuestions($pdo, $safeDep, 3, 8, $sub);
    $unit4o = fetchQuestions($pdo, $safeDep, 4, 8, $sub);
    $unit5o = fetchQuestions($pdo, $safeDep, 5, 8, $sub);
    
    // Fetch 4-mark questions
    $unit14o = fetchQuestions($pdo, $safeDep, 1, 4, $sub);
    $unit24o = fetchQuestions($pdo, $safeDep, 2, 4, $sub);
    $unit34o = fetchQuestions($pdo, $safeDep, 3, 4, $sub);
    $unit44o = fetchQuestions($pdo, $safeDep, 4, 4, $sub);
    $unit54o = fetchQuestions($pdo, $safeDep, 5, 4, $sub);
} else {
    // MySQL fallback
    $con = mysqli_connect('localhost', 'root', '', 'bit');
    if (!$con) {
        die('DB Connection failed');
    }
    
    $safeDep = preg_replace('/[^A-Za-z0-9_]/', '', $dep);
    $safeSub = mysqli_real_escape_string($con, $sub);
    
    $queries = [
        "SELECT question FROM `$safeDep` WHERE unit=1 AND marks=8 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=2 AND marks=8 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=3 AND marks=8 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=4 AND marks=8 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=5 AND marks=8 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=1 AND marks=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=2 AND marks=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=3 AND marks=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=4 AND marks=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
        "SELECT question FROM `$safeDep` WHERE unit=5 AND marks=4 AND LOWER(TRIM(subject))=LOWER(TRIM('$safeSub'))",
    ];
    
    $results = [&$unit1o, &$unit2o, &$unit3o, &$unit4o, &$unit5o, &$unit14o, &$unit24o, &$unit34o, &$unit44o, &$unit54o];
    
    foreach ($queries as $i => $q) {
        $result = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($result)) {
            $results[$i][] = $row['question'];
        }
    }
}

// Generate HTML based on exam type
if ($ex == 'CT-1') {
    generateCT1($unit1o, $unit2o, $unit3o, $unit4o, $unit5o, $unit14o, $unit24o, $unit34o, $unit44o, $unit54o);
} elseif ($ex == 'CT-2') {
    generateCT2($unit1o, $unit2o, $unit3o, $unit4o, $unit5o, $unit14o, $unit24o, $unit34o, $unit44o, $unit54o);
} elseif ($ex == 'Endsem') {
    generateEndsem($unit1o, $unit2o, $unit3o, $unit4o, $unit5o, $unit14o, $unit24o, $unit34o, $unit44o, $unit54o);
}

function generateCT1($u1, $u2, $u3, $u4, $u5, $u14, $u24, $u34, $u44, $u54) {
    echo "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>
    <tr>
        <th colspan='2' text-center>Q.No</th>
        <th>Questions</th>
        <th>Marks</th>
    </tr>";
    
    // Question 1
    echo "<tr><td rowspan='4' class='text-center' width='5%'>1.</td>";
    echo "<td width='5%'>(a)</td><td><select class='form-select' id='ct11a'>";
    foreach ($u14 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>04</td></tr>";
    
    echo "<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct11b'>";
    foreach ($u1 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct11c'>";
    foreach ($u1 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct11d'>";
    foreach ($u1 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    // Question 2
    echo "<tr><td rowspan='4' class='text-center'>2.</td>";
    echo "<td width='5%'>(a)</td><td><select class='form-select' id='ct12a'>";
    foreach ($u24 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>04</td></tr>";
    
    echo "<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct12b'>";
    foreach ($u2 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct12c'>";
    foreach ($u2 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct12d'>";
    foreach ($u2 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "</table>";
}

function generateCT2($u1, $u2, $u3, $u4, $u5, $u14, $u24, $u34, $u44, $u54) {
    // Similar structure as CT-1 but for CT-2 (units 3-5)
    echo "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>
    <tr>
        <th colspan='2' text-center>Q.No</th>
        <th>Questions</th>
        <th>Marks</th>
    </tr>";
    
    // Question 1 (Unit 3)
    echo "<tr><td rowspan='4' class='text-center' width='5%'>1.</td>";
    echo "<td width='5%'>(a)</td><td><select class='form-select' id='ct21a'>";
    foreach ($u34 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>04</td></tr>";
    
    echo "<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct21b'>";
    foreach ($u3 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct21c'>";
    foreach ($u3 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct21d'>";
    foreach ($u3 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    // Question 2 (Unit 4)
    echo "<tr><td rowspan='4' class='text-center'>2.</td>";
    echo "<td width='5%'>(a)</td><td><select class='form-select' id='ct22a'>";
    foreach ($u44 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>04</td></tr>";
    
    echo "<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct22b'>";
    foreach ($u4 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct22c'>";
    foreach ($u4 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct22d'>";
    foreach ($u4 as $q) echo "<option>" . htmlspecialchars($q) . "</option>";
    echo "</select></td><td width='5%'>08</td></tr>";
    
    echo "</table>";
}

function generateEndsem($u1, $u2, $u3, $u4, $u5, $u14, $u24, $u34, $u44, $u54) {
    // Endsem covers all units
    echo "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>
    <tr>
        <th colspan='2' text-center>Q.No</th>
        <th>Questions</th>
        <th>Marks</th>
    </tr>";
    
    $units = [$u1, $u2, $u3, $u4, $u5];
    $units4 = [$u14, $u24, $u34, $u44, $u54];
    $qids = ['es1', 'es2', 'es3', 'es4', 'es5'];
    
    for ($q = 1; $q <= 5; $q++) {
        echo "<tr><td rowspan='4' class='text-center' width='5%'>$q.</td>";
        echo "<td width='5%'>(a)</td><td><select class='form-select' id='{$qids[$q-1]}a'>";
        foreach ($units4[$q-1] as $qu) echo "<option>" . htmlspecialchars($qu) . "</option>";
        echo "</select></td><td width='5%'>04</td></tr>";
        
        for ($i = 1; $i < 4; $i++) {
            $letter = chr(97 + $i); // b, c, d
            echo "<tr><td width='5%'>($letter)</td><td><select class='form-select' id='{$qids[$q-1]}$letter'>";
            foreach ($units[$q-1] as $qu) echo "<option>" . htmlspecialchars($qu) . "</option>";
            echo "</select></td><td width='5%'>08</td></tr>";
        }
    }
    
    echo "</table>";
}
?>
