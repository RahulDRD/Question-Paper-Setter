<?php
// Neon/Postgres connection via PDO
// Preferred: provide a full connection URL in env var DATABASE_URL
// Example: postgresql://user:pass@host:port/dbname?sslmode=require

$pdo = null;

function pdo_from_url($url, &$lastError = null) {
    $parts = parse_url($url);
    if (!$parts || !isset($parts['scheme']) || !isset($parts['host']) || !isset($parts['path'])) {
        $lastError = 'Invalid URL format';
        return null;
    }
    $host = $parts['host'];
    $port = isset($parts['port']) ? $parts['port'] : 5432;
    $db = ltrim($parts['path'], '/');
    $user = isset($parts['user']) ? $parts['user'] : '';
    $pass = isset($parts['pass']) ? $parts['pass'] : '';
    // Build DSN with SSL and optional parameters from query
    $dsn = "pgsql:host={$host};port={$port};dbname={$db};sslmode=require";
    if (isset($parts['query'])) {
        parse_str($parts['query'], $q);
        // Note: channel_binding is not supported by PHP pgsql driver, so we skip it
        // Handle 'options' parameter for Neon SNI endpoint specification
        if (isset($q['options'])) {
            $opts = $q['options'];
            // URL-decode if needed
            $opts = urldecode($opts);
            $dsn .= ";options='" . str_replace("'", "\\'", $opts) . "'";
        }
        // Forward optional application_name if present
        if (isset($q['application_name'])) {
            $an = $q['application_name'];
            $dsn .= ";application_name={$an}";
        }
    }
    try {
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (Throwable $e) {
        $lastError = $e->getMessage();
        return null;
    }
}

// 1) Try DATABASE_URL
$pdo = null;
$pdo_method = null;
$pdo_errors = [];

$databaseUrl = getenv('DATABASE_URL');
if ($databaseUrl) {
    $pdo = pdo_from_url($databaseUrl, $err);
    if ($pdo) {
        $pdo_method = 'DATABASE_URL env var';
    } else {
        $pdo_errors[] = "DATABASE_URL failed: $err";
    }
}

// 2) If not set or failed, try PG* env vars
if (!$pdo) {
    $PGHOST = getenv('PGHOST');
    $PGPORT = getenv('PGPORT') ?: '5432';
    $PGDATABASE = getenv('PGDATABASE');
    $PGUSER = getenv('PGUSER');
    $PGPASSWORD = getenv('PGPASSWORD');
    if ($PGHOST && $PGDATABASE && $PGUSER && $PGPASSWORD) {
        try {
            $dsn = "pgsql:host={$PGHOST};port={$PGPORT};dbname={$PGDATABASE};sslmode=require";
            $pdo = new PDO($dsn, $PGUSER, $PGPASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            $pdo_method = 'PG* env vars';
        } catch (Throwable $e) {
            $pdo_errors[] = "PG* env vars failed: " . $e->getMessage();
            $pdo = null;
        }
    } else {
        $pdo_errors[] = "PG* env vars not fully set";
    }
}

// 3) If still not available, fallback to a baked-in URL if provided.
if (!$pdo) {
    // Provided Neon URL with SNI endpoint ID (ep-odd-night-ah0khiik)
    $fallbackUrl = 'postgresql://neondb_owner:npg_ArRJFZ5dx3gf@ep-odd-night-ah0khiik-pooler.c-3.us-east-1.aws.neon.tech/neondb?sslmode=require&options=endpoint%3Dep-odd-night-ah0khiik';
    $pdo = pdo_from_url($fallbackUrl, $err);
    if ($pdo) {
        $pdo_method = 'Neon fallback URL';
    } else {
        $pdo_errors[] = "Neon fallback failed: $err";
    }
}

// 4) Final fallback: try MySQL if Postgres fails (optional, for graceful degradation)
if (!$pdo) {
    try {
        // Fallback to local MySQL for development
        $pdo = new PDO('mysql:host=localhost;dbname=qpsunit', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $pdo_method = 'MySQL fallback';
    } catch (Throwable $e) {
        $pdo_errors[] = "MySQL fallback failed: " . $e->getMessage();
        $pdo = null;
    }
}

// If connection fails, $pdo will be null; callers should handle gracefully.
?>
