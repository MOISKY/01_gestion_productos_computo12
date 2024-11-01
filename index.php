<?php
require_once 'config/db.php';
require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'helpers/utils.php';
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else
{
    echo 'Error 404';
    exit();
}
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo 'Error 404';
    }
}else{
    echo 'Error 404';
}
require_once 'views/layout/footer.php';