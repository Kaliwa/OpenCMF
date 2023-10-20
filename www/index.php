<?php
namespace App;

use App\Controllers\Error;

spl_autoload_register("App\myAutoloader");

function myAutoloader($class)
{
    $class = str_replace('App\\', '', $class);
    $class = str_replace('\\', '/', $class);
    if (file_exists($class . ".php")) {
        include($class . ".php");
    }
}

$uri = strtolower($_SERVER['REQUEST_URI']);
$uri = strtok($uri, '?');
$uri = strlen($uri) > 1 ? rtrim($uri, '/') : $uri;


if (file_exists("routes.yaml")) {
    $yaml_parsed_file = yaml_parse_file('routes.yaml');
    if (!empty($yaml_parsed_file[$uri])) {
        if (!empty($yaml_parsed_file[$uri]['controller'])) {
            if (!empty($yaml_parsed_file[$uri]['action'])) {
                $controller = $yaml_parsed_file[$uri]['controller'];
                $action = $yaml_parsed_file[$uri]['action'];
                if (file_exists("Controllers/" . $controller . ".php")) {
                    require("Controllers/" . $controller . ".php");
                    $controller = "App\\Controllers\\" . $controller;
                    if (class_exists($controller)) {
                        $objectController = new $controller();
                        if (method_exists($objectController, $action)) {
                            $objectController->$action();
                        } else {
                            die("L'action n'existe pas dans le controller");
                        }
                    } else {
                        die("La classe du controller n'existe pas");
                    }
                } else {
                    die("Le fichier controller n'existe pas");
                }
            } else {
                die("La route ne contient pas de action");
            }
        } else {
            die("La route ne contient pas de controller");
        }
    } else {
        require("Controllers/Error.php");
        $customError = new Error();
        $customError->page404();
    }
} else {
    die("Le fichier de routing n'existe pas");
}
