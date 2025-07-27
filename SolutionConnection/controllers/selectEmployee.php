<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Core/Functions.php';

$result = mssql_query("SELECT * FROM Employees ");

require "views/Employee/selectemployee.view.php";