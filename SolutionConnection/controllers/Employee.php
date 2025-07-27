<?php
session_start();
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
// Filter employees by ID if provided

$lang = $_SESSION['lang'] ?? 'ar';
$sql = "{CALL sp_GetAllEmployeesWithLang(?)}";
$params = [$lang];

$result = mssql_query($sql, $params);


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
require "views/employee.view.php";
