<?php

require_once "../lib/dbconnect.php";
require_once "../lib/player.php";
require_once "../lib/cards.php";

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

//Αρχικοποίηση κενού πίνακα του πλήθους των παικτών


session_start();


switch($r=array_shift($request)){
    case 'players': 
        switch ($b=array_shift($request)){
            //Εμφάνισης λίστας παικτών
            case 'register':
                handle_register($method);
            break;
            case 'list':
                handle_player($method);
            break;
            case 'login':
                handle_login($method, $_SESSION['playerCount']);
            break;
            case 'logout':
                handle_logout($method, $_SESSION['playerCount']);
            break;
            //Δίνουμε τον αριθμό των παικτών ώστε να ξέρουμε πως θα μοιραστούν οι κάρτες
            case 'numberOfPlayers':
                handle_givePlayers($method);
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
                handle_deal();
            break;
            default:
                header("HTTP/1.1 404 Not Found");
            break;
        }
}
//------------------------------------------------------------------- Functions -------------------------------------------------------------------//
function handle_register($method){
    if($method=='GET'){
        $name = $_GET['name'];
        $password = $_GET['password'];
        if($name=="" or $password=="" or $name==null or $password==null) {
            print json_encode('Παρακαλώ πληκτρολόγησε όλα τα στοιχεία για να εγγραφείς!');
        }else{
            register($name, $password);
        }
        
    }
}

function handle_login($method, $playerCount){
    if($method=='GET'){
        $name = $_GET['name'];
        $password = $_GET['password'];
        if($name=="" or $password=="" or $name==null or $password==null) {
            print json_encode('Παρακαλώ πληκτρολόγησε όλα τα στοιχεία για να συνδεθείς!');
        }else{
            login($name, $password, $_SESSION['playerCount']);
        }
    }
}

function handle_logout($method, $playerCount){
    if($method=='GET'){
        $id = $_GET['id'];
        if($id==""or $id==null) {
            print json_encode('Παρακαλώ πληκτρολόγησε όλα τα στοιχεία για να συνδεθείς!');
        }else{
            logout($id, $_SESSION['playerCount']);
        }
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
//----------------------- Παίρνουμε τον αριθμό των παικτών και μοιράζουμε τις κάρτες αναλόγως -----------------------//
function handle_givePlayers($method) {
    if ($method == 'GET') {
      $_SESSION['playerNum'] = $_GET['value'];
    }
    print json_encode(['Players:' => $_SESSION['playerNum']]);
}
  
function handle_deal() {
    deal_cards($_SESSION['playerNum']);
}

//-------------------------------------------------------------------------------------------------------------------//

//Βάζουμε ξανά τα φύλλα στην τράπουλα (θέτουμε το user_id=0)
function handle_resetCards($method){
    //Τα φύλλα μπαίνουν όλα πίσω στη τράπουλα
    if($method=='PATCH'){
        reset_cards();
    }
}

//------------------------------------------------------------------ End Of Functions ------------------------------------------------------------------//
?>