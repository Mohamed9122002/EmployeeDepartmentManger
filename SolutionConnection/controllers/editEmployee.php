<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Employee ID is Not Found.");
}
$query = "SELECT * FROM Employees WHERE Id = ?";
$result = mssql_query($query, [$id]);
$employee = mssql_fetch_assoc($result);

if (!$employee) {
    die("Employee not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['EmployeeName'];
    $salary = $_POST['Salary'];
    $age = $_POST['Age'];
    $email = $_POST['Email'];
    $departmentId = $_POST['DepartmentId'];

    $updateQuery = "UPDATE Employees 
                    SET EmployeeName = ?, Salary = ?, Age = ?, Email = ?, DepartmentId = ?
                    WHERE Id = ?";

    $params = [$name, $salary, $age, $email, $departmentId, $id];

    $updateResult = mssql_query($updateQuery, $params);

    if ($updateResult) {
        // echo "Employee updated successfully!";
        header("Location: /");
        exit;
    } else {
        echo " Failed to update employee.";
    }
}

require "views/Employee/editEmployee.view.php";