<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
$Id = $_GET['id'] ?? null;

if (!$Id) {
    die("Employee ID is Not Found.");
}
$query = "DELETE  FROM Children WHERE Id = ?";
$result = mssql_query($query, [$Id]);
if (!$result) {
    die("Error deleting Child: " . print_r(sqlsrv_errors(), true));
} else {
    header("Location: /");
    exit();
}
require "views/Employee/deleteChildrenEmployee.view.php";