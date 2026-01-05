<?php
require 'db.php';

if (isset($pdo) && $pdo instanceof PDO) {
    echo "✅ PDO CONNECTED TO NEON";
} else {
    echo "❌ PDO NOT CONNECTED";
}
