<?php
function show_cards() {
    global $mysqli;

    $sql = 'select * from cards';
    $st = $mysqli->prepare($sql);

    $st->execute();
    $res = $st->get_result();

    header('Content-type: application/json');
    print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function reset_cards() {
    global $mysqli;

    for ($i = 1; $i <= 24; $i++) {
        $sql = 'UPDATE testcards SET player_id = "0" WHERE id="'.$i.'"';
            $st = $mysqli->prepare($sql);
            $st->execute();
    }
}

function deal_cards_2P() {
    global $mysqli;

    $player_number = $_GET['key'];

    if($player_number==2){

        $id_1 = 1;
        $id_2 = 3;

        for ($i = 1; $i <= 12; $i++) {

                $sql = 'UPDATE testcards SET player_id = "1" WHERE id="'.$id_1.'"';
                $st = $mysqli->prepare($sql);
                $st->execute();

                $sql = 'UPDATE testcards SET player_id = "1" WHERE id=1+"'.$id_1.'"';
                $st = $mysqli->prepare($sql);
                $st->execute();

                $sql = 'UPDATE testcards SET player_id = "2" WHERE id="'.$id_2.'"';
                $st = $mysqli->prepare($sql);
                $st->execute();

                $sql = 'UPDATE testcards SET player_id = "2" WHERE id=1+"'.$id_2.'"';
                $st = $mysqli->prepare($sql);
                $st->execute();
            
            $id_1 = $id_1+4;
            $id_2 = $id_2+4;
        }

        //Εμγάνιση των καρτών αφού μοιράστηκαν 
        $sql = 'select player_id from testcards';
        $st = $mysqli->prepare($sql);

        $st->execute();
        $res = $st->get_result();

        header('Content-type: application/json');
        print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);

    }elseif($player_number==3) {
        
        print "3 players";

    }else{
        print "dwse swsto arithmo paiktwn (2 or 3)";
    }

    
}

?>
