<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'Employee.php',
    '/department' => 'department.php',
    '/employee/create'=> 'createEmployee.php',
    '/employee/edit' => 'editEmployee.php',
    '/employee/details' => 'Details.php',
    '/employee/wives' => 'employeeWives.php',
    '/employee/children' => 'employeeChildren.php',
    '/employee/deleteWife'=> 'deleteWife.php',
    '/employee/deleteChild' => 'deleteChildren.php',
    '/select/employee'=> 'selectEmployee.php',
    '/select/Details'=> 'Details.php',
    
];


if (!function_exists('routeToController')) {
    function routeToController($uri , $routes) {
        if (array_key_exists($uri, $routes)) {
            require BASE_PATH . '/controllers/' . $routes[$uri];
        } else {
            http_response_code(404);
            echo "404 - Page not found";
        }
    }
}

routeToController($uri, $routes);
