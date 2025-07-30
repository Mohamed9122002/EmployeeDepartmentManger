<?php
session_start();
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
// Filter employees by ID if provided
$id = !empty($_GET['id']) ? intval($_GET['id']) : null;

$sql = "SELECT 
    E.Id,
    E.EmployeeName,
    E.Email,
    E.HireDate,
    N.NameArabic AS NationalityArabic,
    N.NameEnglish 
FROM Employees E
 left join Nationalities N ON E.NationalityId = N.Id
WHERE E.Id = ?";
$stmt = mssql_query($sql, [$id]);
$employees = [];
while ($row = mssql_fetch_assoc($stmt)) {
    $employees[] = $row;
}
//Pagination 
$recordsPerPage = 10;
// Page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Offset 
$offset = ($page - 1) * $recordsPerPage;
$sql = "SELECT * FROM Employees ORDER BY Id OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
$result = mssql_query($sql, [$offset, $recordsPerPage]);
$sqlCount = "SELECT COUNT(*) AS Total FROM Employees";
$stmtCount = mssql_query($sqlCount);
$totalRecords = sqlsrv_fetch_array($stmtCount, SQLSRV_FETCH_ASSOC)['Total'];
//CountPage 
$total_pages = ceil($totalRecords / $recordsPerPage);



require "views/employee.view.php";
