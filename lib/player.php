<?php

function register($name, $password) {
    global $mysqli;

    $sql = 'insert into player (name, password, score) value ("'.$name.'", "'.$password.'", "0")';
    $st = $mysqli->prepare($sql);

    $st->execute();

    $sql = 'select * from player where name="'.$name.'"';
    $st = $mysqli->prepare($sql);

    $st->execute();
    $res = $st->get_result();

    header('Content-type: application/json');
    print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function login($name, $password) {
    global $mysqli;
    //Παίρνουμε το password του χρήστη με το όνομα που δώσαμε ως input
    $sql = 'select password from player where name="'.$name.'"';
    $st = $mysqli->prepare($sql);

    $st->execute();
    $res = $st->get_result();
    $row = $res->fetch_assoc();
    //Ελέγχουμε αν πήραμε αποτέλεσμα (δηλαδή αν υπάρχει ο χρήστης)
    if($row==null){
        //Σε περίπτωση που δεν υπάρχει εμφανίζουμε το κατάλληλο μήνυμα
        print json_encode('Ο χρήστης δεν υπάρχει!');
    }else{
        //Αν υπάρχει ελέγχουμε αν είναι σωστό το password
        if ($row['password'] == $password) {
        print json_encode('Συνδέθηκες με επιτυχία!');
        } else {
            print json_encode('Λάθος password!');
        }
    }
}
function show_players() {
    global $mysqli;

    $sql = 'select * from player';
    $st = $mysqli->prepare($sql);

    $st->execute();
    $res = $st->get_result();

    header('Content-type: application/json');
    print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function edit_player() {
    global $mysqli;
    $name = 'player1';

    $sql = 'UPDATE player SET name = "'.$name.'" WHERE id=1';
    $st = $mysqli->prepare($sql);

    $st->execute();
}

?>
