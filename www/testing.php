<?php

require_once "../lib/dbconnect.php";
require_once "../lib/player.php";
require_once "../lib/testmethods.php";
require_once "../lib/cards.php";

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);



switch($r=array_shift($request)){
    case 'players': 
        switch ($b=array_shift($request)){
            //Εμφάνισης λίστας παικτών
            case 'list':
                handle_player($method);
            break;
            case 'givePlayers':
                //Δίνω τον αριθμό των παικτών
                $playerNum = $input['playerNum'];
                print "Ο αριθμός των παικτών είναι" + $playerNum;
            break;

            case 'deal':
                handle_deal($method, $playerNum);
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

function handle_deal($method, $playerNum){
    //Μοιράζουμε τις κάρτες
    if($method=='GET'){
        deal_cards($playerNum);
    }
}

?>