<?php 

//Η function καλείται με παράμετρο το id του παίκτη ($player)
function show_player_cards($player) {
	global $mysqli;

	    $sql = 'select card_no, card_type from cards where player_id="'.$player.'"';
	    $st = $mysqli->prepare($sql);

	    $st->execute();
	    $res = $st->get_result();

	    header('Content-type: application/json');
	    print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);

}
//Η function καλείται με παράμετρο το id του παίκτη ($player)
function get_cardFromCards($player) {
	global $mysqli;

	//Εμφανίζουμε πόσες κάρτες υπάρχουν στη τράπουλα
    $sql = 'SELECT COUNT(*) AS array_length FROM testcards WHERE player_id=0';
	    $st = $mysqli->prepare($sql);

	    $st->execute();
	    $res = $st->get_result();
	    print "Ο αριθμός των καρτών στην τράπουλα είναι:" + $res;
	   
	if($sql>0){
		$sql = 'SELECT COUNT(*) AS array_length FROM testcards WHERE player_id!=0';
        $st = $mysqli->prepare($sql);
        $st->execute();
        $res = $st->get_result();

		$sql = 'UPDATE testcards SET player_id = "'.$player.'" WHERE id=1+"'.$res.'"';
        $st = $mysqli->prepare($sql);
        $st->execute();
	}else{
        print "Δεν υπάρχουν κάρτες για να τραβήξεις";
	} 
}
//Η function καλείται με παράμετρο το id της κάρτας ($card) και το id του παίκτη ($player)
function put_cardInTheMiddle($card, $player){
	global $mysqli;

	$sql = 'UPDATE testcards SET player_id = "4" WHERE id="'.$card.'"';
    $st = $mysqli->prepare($sql);
    $st->execute();		

}



?>