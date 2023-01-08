<?php

require_once "../lib/dbconnect.php";
require_once "../lib/player.php";
require_once "../lib/cards.php";

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);



switch($r=array_shift($request)){
    case 'players': 
        switch ($b=array_shift($request)){
            case 'list':
                handle_player($method);
            break;
            case 'cards':
                handle_cards($method);
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

function handle_player($method){
    if($method=='GET'){
        show_players();
    }
    elseif($method=='PATCH'){
        edit_player();
    }
}

function handle_cards($method){
    if($method=='GET'){
        show_cards();
    }
}

?>