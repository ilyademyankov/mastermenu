<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 22.05.17
 * Time: 22:43
 */

class Route
{
    static function start()
    {
         $controllerName = 'Main';
         $modelName = 'Main';
         $actionName = 'Index';

         $routeString = explode('/', $_SERVER['REQUEST_URI']);

        if(!empty($routeString[1]))
        {
            $controllerName = $routeString[1];
            $modelName== $routeString[1];
        }

        if(!empty($routeString[2]))
        {
            $actionName = $routeString[2];
        }




        $modelFile = "model_".strtolower($modelName).'.php';
        $modelPath = "application/models/".$modelFile;
        $modelName = 'Model'.ucfirst($modelName);


        if(file_exists($modelPath))
        {
            include "application/models/".$modelFile;
        }




        $controllerFile = "controller_".strtolower($controllerName).'.php';
        $controllerPath = "application/controllers/".$controllerFile;
        $controllerName = 'Controller'.ucfirst($controllerName);

        if(file_exists($controllerPath))
        {
            include "application/controllers/".$controllerFile;
        }
        else
        {
         self::ErrorPage404("Controller error $controllerPath");
        }

        $actionName = 'Action'.ucfirst($actionName);
        $controller = new $controllerName;
        $action = $actionName;


        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            self::ErrorPage404("Action error $actionName");
        }

    }
        function ErrorPage404($errorText)
        {
            print "<i>$errorText</i>";
         }
}
