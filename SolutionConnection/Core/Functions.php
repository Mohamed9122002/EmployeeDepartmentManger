<?php
require "Core/Database.php";
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('Views/' . $path);
}
function base_path($path)
{
    return BASE_PATH . $path;
}

function mssql_query($query , $params = [])
{
    global $conn;
    $res = sqlsrv_query($conn, $query, $params, ['Scrollable' => 'buffered']);

    if ($res === false) {
        echo " Query failed: $query\n";
        echo "<pre>";
        die(print_r(sqlsrv_errors(), true));
    }

    return $res;
}

function mssql_fetch_assoc($result)
{

    return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}

function mssql_num_rows($result)
{
    return sqlsrv_num_rows($result);
}

function mssql_close($conn)
{
    sqlsrv_close($conn);
}

