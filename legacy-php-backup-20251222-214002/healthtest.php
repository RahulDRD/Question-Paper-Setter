<?php
// Simple test version of health check without redirects
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once __DIR__ . '/db.php';

$response = [
    'status' => 'unknown',
    'postgres' => false,
    'connected' => false,
    'version' => null,
    'method' => null,
    'info' => [
        'database' => null,
        'user' => null,
        'schema' => null,
        'ssl' => null,
        'channel_binding' => null
    ],
    'tables' => [
        'subjects' => null,
        'btech' => null,
        'mca' => null,
        'mba' => null
    ],
    'sampleSubjects' => [],
    'errors' => [],
    'error' => null,
    'timestamp' => date('Y-m-d H:i:s')
];

try {
    if (!isset($pdo) || !($pdo instanceof PDO)) {
        $response['errors'] = $pdo_errors ?? [];
        throw new Exception('PDO not initialized');
    }

    $response['method'] = $pdo_method ?? 'unknown';
    $response['postgres'] = true;
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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

    try {
        $meta = $pdo->query("
            SELECT 
                current_database() AS db,
                current_user AS usr,
                current_schema() AS sch
        ")->fetch();

        $response['info']['database'] = $meta['db'] ?? null;
        $response['info']['user'] = $meta['usr'] ?? null;
        $response['info']['schema'] = $meta['sch'] ?? 'public';
    } catch (Throwable $e) {
        // continue
    }

    foreach (['subjects', 'btech', 'mca', 'mba'] as $table) {
        try {
            $count = $pdo->query("SELECT COUNT(*) AS cnt FROM public.$table")->fetchColumn();
            $response['tables'][$table] = (int)$count;
        } catch (Throwable $e) {
            $response['tables'][$table] = null;
        }
    }

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

echo json_encode($response, JSON_PRETTY_PRINT);
