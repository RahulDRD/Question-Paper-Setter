<?php
// PDO PostgreSQL connection for Neon
// Usage: include 'db_pg.php'; use $pdo

$DB_HOST = getenv('PGHOST') ?: 'ep-odd-night-ah0khiik-pooler.c-3.us-east-1.aws.neon.tech';
$DB_PORT = getenv('PGPORT') ?: '5432';
$DB_NAME = getenv('PGDATABASE') ?: 'neondb';
$DB_USER = getenv('PGUSER') ?: 'neondb_owner';
$DB_PASS = getenv('PGPASSWORD') ?: 'npg_ArRJFZ5dx3gf';

$dsn = "pgsql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};sslmode=require";

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    die(json_encode(['success' => false, 'message' => 'DB connection error', 'error' => $e->getMessage()]));
}

?>
