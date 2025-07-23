<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
$Id = $_GET['id'] ?? null;

if (!$Id) {
    die("Wife ID is Not Found.");
}
$checkQuery = "SELECT COUNT(*) AS count FROM Children WHERE WifeId = ?";
$checkResult = mssql_query($checkQuery, [$Id]);
$checkCount = mssql_fetch_assoc($checkResult)['count'];
if ($checkCount > 0) {
    die("Cannot delete Wife with existing children.");
}
$query = "DELETE  FROM Wives WHERE Id = ?";
$result = mssql_query($query, [$Id]);
if (!$result) {
    echo "Error deleting Wife:";
} else {
    header("Location: /");
    exit();
}
require "views/Employee/deleteWifeEmployee.view.php";