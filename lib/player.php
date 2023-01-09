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
