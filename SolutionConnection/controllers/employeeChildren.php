<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $nationalId = $_POST['NationalId'];
    $birthDate = $_POST['BirthDate'];
    $employeeId = $_POST['employeeId']; 
    $wifeId = $_POST['WifeId']; 
    $query = "INSERT INTO Children (Name, NationalId, BirthDate, EmployeeId, WifeId)
              VALUES (?, ?, ?, ?, ?)";
    $params = [$name, $nationalId, $birthDate, $employeeId , $wifeId];
    $result = mssql_query($query, $params);
    if ($result === false) {
        echo "Error inserting Child: " . print_r(sqlsrv_errors(), true);
    } else {
        header("Location: /");
        exit();
    }
}
require "views/Employee/employeeChildren.view.php";