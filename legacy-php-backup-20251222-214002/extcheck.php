<?php
header('Content-Type: application/json');
$drivers = class_exists('PDO') ? PDO::getAvailableDrivers() : [];
echo json_encode([
  'pdo' => extension_loaded('pdo'),
  'pdo_pgsql' => extension_loaded('pdo_pgsql'),
  'pgsql' => extension_loaded('pgsql'),
  'pdo_drivers' => $drivers,
]);
?>
