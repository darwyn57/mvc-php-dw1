<?php

if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}
else
{
    $controller = 'home';
}

if(file_exists('../controller/' . $controller . '-controller.php'))
{
    require '../controller/' . $controller . '-controller.php';

    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'index';
    }

    if(function_exists($action))
    {
        $action(); // index() soit autre
    }
    else
    {
        header("HTTP/1.1 404 Not Found");
        echo "Erreur 404 Not Found";
    }

}
else
{
    header("HTTP/1.1 404 Not Found");
    echo "Erreur 404 Not Found";
}
