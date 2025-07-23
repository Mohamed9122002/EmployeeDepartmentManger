<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $nationalId = $_POST['NationalId'];
    $birthDate = $_POST['BirthDate'];
    $employeeId = $_POST['EmployeeId'];
    $query = "INSERT INTO Wives (Name, NationalId, BirthDate, EmployeeId)
              VALUES (?, ?, ?, ?)";
    $params = [$name, $nationalId, $birthDate, $employeeId];
    $result = mssql_query($query, $params);
    if ($result === false) {
        echo "Error inserting Wife: " . print_r(sqlsrv_errors(), true);
    } else {
        header("Location: /");
        exit();
    }
}

require "views/Employee/employeeWives.view.php";
