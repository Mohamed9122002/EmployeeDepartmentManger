<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';

$empId = $_GET['employeeId'] ?? null;

$EmployeeDetails = mssql_query(
    "SELECT 
    E.Id AS EmployeeId,
    E.EmployeeName,
    E.Salary,
    E.Age,
    E.Email,
    E.DepartmentId,

    W.Id AS WifeId,
    W.Name AS WifeName,
    W.NationalId AS WifeNationalId,
    W.BirthDate AS WifeBirthDate,

    C.Id AS ChildId,
    C.Name AS ChildName,
    C.NationalId AS ChildNationalId,
    C.BirthDate AS ChildBirthDate
FROM Employees E
LEFT JOIN Wives W ON E.Id = W.EmployeeId
LEFT JOIN Children C ON E.Id = C.EmployeeId AND C.WifeId = W.Id
WHERE E.Id = ?
ORDER BY W.Id, C.Id", [$empId]);
// while ($row = mssql_fetch_assoc($EmployeeDetails)){
//     echo $row['EmployeeName'];
// }


require "views/Employee/Details.view.php";
