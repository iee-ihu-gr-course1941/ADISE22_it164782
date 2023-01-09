<?php

require_once "../lib/dbconnect.php";
require_once "../lib/player.php";
require_once "../lib/testmethods.php";
require_once "../lib/cards.php";

session_start();

$request = explode('/', substr(@$_SERVER['PATH_INFO'], 1));
$method = $_SERVER['REQUEST_METHOD'];
$testArray = array();

switch($r=array_shift($request)){
    case 'players': 
        switch ($b=array_shift($request)){
            case 'showInput':
                handle_myInput($method);
            break;
            case 'length':
                handle_addToArray($method, $testArray);
            break;
            default:
                header("HTTP/1.1 404 Not Found");
            break;
        }
    break;
    default:
        header("HTTP/1.1 404 Not Found");
    exit;
}


function handle_myInput($method){
    //Εμφάνιση του input που δίνω
    if($method=='GET'){
        show_input();
    }
}

function handle_addToArray($method, $testArray){
    if($method=='GET'){
        $length = count($testArray);
        print json_encode(['length before the insert:'=> $length]);
        add_toArray($testArray);
    }
}
?>