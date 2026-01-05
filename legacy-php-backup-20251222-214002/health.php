<?php
/**
 * Neon PostgreSQL Health Check
 * Requires: db.php (initializes $pdo)
 * Returns: JSON with connection status, version, table counts, and sample data
 */

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once __DIR__ . '/db.php';

$response = [
    'status'     => 'unknown',
    'postgres'   => false,
    'connected'  => false,
    'version'    => null,
    'method'     => null,
    'info'       => [
        'database'        => null,
        'user'            => null,
        'schema'          => null,
        'ssl'             => null,
        'channel_binding' => null
    ],
    'tables' => [
        'subjects' => null,
        'btech'    => null,
        'mca'      => null,
        'mba'      => null
    ],
    'sampleSubjects' => [],
    'errors' => [],
    'error' => null,
    'timestamp' => date('Y-m-d H:i:s')
];

try {
    // ---- PDO VALIDATION ----
    if (!isset($pdo) || !($pdo instanceof PDO)) {
        $response['errors'] = $pdo_errors ?? [];
        throw new Exception('PDO not initialized from db.php: ' . implode(' | ', $response['errors']));
    }

    $response['method'] = $pdo_method ?? 'unknown';
    $response['postgres'] = true;
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // ---- VERSION CHECK ----
    try {
        $verRow = $pdo->query('SELECT version()')->fetch();
        $response['version'] = $verRow['version'] ?? null;
        $response['connected'] = !empty($response['version']);
    } catch (Throwable $e) {
        $response['connected'] = false;
        $response['error'] = 'Version query failed: ' . $e->getMessage();
    }

    if (!$response['connected']) {
        $response['status'] = 'disconnected';
        echo json_encode($response, JSON_PRETTY_PRINT);
        exit;
    }

    $response['status'] = 'connected';

    // ---- CONNECTION INFO ----
    try {
        $meta = $pdo->query("
            SELECT 
                current_database() AS db,
                current_user AS usr,
                current_schema() AS sch
        ")->fetch();

        $response['info']['database'] = $meta['db'] ?? null;
        $response['info']['user']     = $meta['usr'] ?? null;
        $response['info']['schema']   = $meta['sch'] ?? 'public';
    } catch (Throwable $e) {
        // info stays null, continue
    }

    // ---- SSL STATUS ----
    try {
        $sslVal = $pdo->query('SHOW ssl')->fetchColumn();
        $response['info']['ssl'] = $sslVal ?? 'on';
    } catch (Throwable $e) {
        $response['info']['ssl'] = 'unavailable';
    }

    // ---- CHANNEL BINDING STATUS ----
    try {
        $cbVal = $pdo->query('SHOW channel_binding')->fetchColumn();
        $response['info']['channel_binding'] = $cbVal ?? 'require';
    } catch (Throwable $e) {
        $response['info']['channel_binding'] = 'unavailable';
    }

    // ---- TABLE COUNTS ----
    foreach (['subjects', 'btech', 'mca', 'mba'] as $table) {
        try {
            $count = $pdo->query("SELECT COUNT(*) AS cnt FROM public.$table")->fetchColumn();
            $response['tables'][$table] = (int)$count;
        } catch (Throwable $e) {
            $response['tables'][$table] = null;
        }
    }

    // ---- SAMPLE DATA ----
    try {
        $stmt = $pdo->query("
            SELECT department, subject
            FROM public.subjects
            ORDER BY department, subject
            LIMIT 5
        ");
        $response['sampleSubjects'] = $stmt->fetchAll();
    } catch (Throwable $e) {
        $response['sampleSubjects'] = [];
    }

} catch (Throwable $e) {
    $response['status'] = 'error';
    $response['error'] = $e->getMessage();
}

http_response_code($response['status'] === 'connected' ? 200 : 503);
