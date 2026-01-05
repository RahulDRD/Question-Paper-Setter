<?php
/**
 * Redirect to health.php (unified health check).
 * This prevents duplicate logic.
 */
header('Location: health.php');
exit;
