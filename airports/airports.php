<?php

if ( !isset( $_GET['rt'] ) ){
    $controller = 'airports';
    $action = 'index';


}

else{
    //explode nam parsira string, delimiter /
    $parts = explode( '/', $_GET['rt'] );

    if( isset($parts[0]) && preg_match( '/^[A-Za-z0-9]+$/', $parts[0] ) ){
        $controller = $parts[0];
    }
    else{
        $controller = 'airports';
    }

    if( isset($parts[1]) && preg_match( '/^[-a-z0-9_ \x{100}-\x{17f}]+$/ui', $parts[1] ) ){
        $action = $parts[1];
    }
    else{
        $action = 'index';
    }
}


$controllerName = $controller . 'Controller';


require_once __DIR__ . '/controller/' . $controllerName . '.php';


if( !file_exists(__DIR__ . '/controller/' . $controllerName . '.php')){
    
    error_404();
}

$con = new $controllerName;



if( !method_exists( $con, $action ) ){
    error_404();
}

$con->$action();

exit(0);

// --------------------------------------

function error_404(){
    require_once __DIR__ . '/controller/_404Controller.php';
    $con = new _404Controller();
    $con->index();
    exit(0);
}

?>