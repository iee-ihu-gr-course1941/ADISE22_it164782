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
            //Εμφάνισης λίστας παικτών
            case 'list':
                handle_player($method);
            break;
            default:
                header("HTTP/1.1 404 Not Found");
            break;
        }
    break;
    case 'cards':
        switch ($b=array_shift($request)){
            //Επαναφορά φύλλων στην τράπουλα
            case 'reset':
                handle_resetCards($method);
            break;
            //Εμφάνιση τράπουλας
            case 'list':
                handle_cards($method);
            break;
            //Μοίρασμα καρτών
            case 'deal':
                handle_cards($method);
            break;
            default:
                header("HTTP/1.1 404 Not Found");
            break;
        }
    //Case στο οποίο τεστάρω πράγματα
    case 'test':
        switch ($b=array_shift($request)){
            //Τεστ εμφάνισης κάποιου input μου
            case 'showInput':
                handle_myInput($method);
            break;
        }
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

function handle_player($method){
    //Εμφάνιση λίστας παικτών
    if($method=='GET'){
        show_players();
    }
    //Τεστ για το πως μπορώ να κάνω edit ένα table 
    elseif($method=='PATCH'){
        edit_player();
    }
}

function handle_cards($method){
    //Βλέπουμε όλη τη τράπουλα
    if($method=='GET'){
        show_cards();
    }
}

function deal_cards($method){
    //Μοιράζουμε τις κάρτες
    if($method=='GET'){
        deal_cards();
    }
}

function handle_resetCards($method){
    //Τα φύλλα μπαίνουν όλα πίσω στη τράπουλα
    if($method=='PATCH'){
        reset_cards();
    }
}
?>