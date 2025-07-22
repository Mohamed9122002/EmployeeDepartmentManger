<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
// $result = mssql_query("INSERT INTO Employees (EmployeeName, Salary, Age, Email, DepartmentId)
// VALUES ('MohamedMahmoud', 5000, 21, 'mohamed@gmail.com', 1) ");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['EmployeeName'];
    $salary = $_POST['Salary'];
    $age = $_POST['Age'];
    $email = $_POST['Email'];
    $departmentId = $_POST['DepartmentId'];

    $query = "INSERT INTO Employees (EmployeeName, Salary, Age, Email, DepartmentId)
              VALUES (?, ?, ?, ?, ?)";
    $params = [$name, $salary, $age, $email, $departmentId];
    $result = mssql_query($query, $params);
    if ($result === false) {
        echo "Error inserting employee: " . print_r(sqlsrv_errors(), true);
    } else {
        header("Location: /");
        exit();
    }
}
require "views/Employee/createEmployee.view.php";