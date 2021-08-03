<?php

require_once "vendor/autoload.php";

@list($controller, $method, $args) = explode("/", $_GET['route']);

if(!isset($controller) || !in_array($controller, $_ROUTES))
    die("404");

switch($controller)
{
    case 'home' :
        $dashboardController = new \App\Controller\Dashboard();

        $method = isset($method) ? $method : 'index';

        call_user_func_array(array($dashboardController, $method), []);

    break;

    case 'lessee' :
        $lesseeController = new \App\Controller\Lessee();

        $method = isset($method) ? $method : 'index';

        call_user_func_array(array($lesseeController, $method), []);

    break;

    case 'landlord' :
        $landlordController = new \App\Controller\Landlord();

        $method = isset($method) ? $method : 'index';

        call_user_func_array(array($landlordController, $method), []);

    break;

    case 'property' :
        $propertyController = new \App\Controller\Property();

        $method = isset($method) ? $method : 'index';

        call_user_func_array(array($propertyController, $method), []);

    break;

    case 'contract' :
        $contractController = new \App\Controller\Contract();

        $method = isset($method) ? $method : 'index';

        call_user_func_array(array($contractController, $method), [$args]);

    break;
}


// VistaApiClient::getAllPropertyFields();

// var_dump(VistaApiClient::getAllProperty());