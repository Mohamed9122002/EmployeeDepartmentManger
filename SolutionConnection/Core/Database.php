<?php
$db_host = 'DESKTOP-HC1PCNK';
$db_name = 'Company';
$db_user = 'sa';
$db_pass = 'sa123456';

// Memory and buffer settings
ini_set('memory_limit', '256M');
ini_set('sqlsrv.ClientBufferMaxKBSize', '524288');
ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');

// Connection info array
$connectionInfo = [
    "Database" => $db_name,
    "UID" => $db_user,
    "PWD" => $db_pass,
    "CharacterSet" => "UTF-8",
    // "CharacterSet" => "UTF-8", // Uncomment if needed for character se
];

// Create connection
$conn = sqlsrv_connect($db_host, $connectionInfo);

// Check connection
if (!$conn) {
    echo "Connection failed.<br>";
    echo "<pre>";
    die(print_r(sqlsrv_errors(), true));
}
