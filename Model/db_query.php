<?php
include 'database.php';

$action = filter_input(INPUT_POST, 'action');

$action();

function verify(){
	$db = Database::getDB();
	if(isset($_POST['patron-r']) == False){
		$patron = filter_input(INPUT_POST, 'patron');
		$cardno = filter_input(INPUT_POST, 'cardno');
		$query = 'SELECT id FROM kas58.patrons WHERE patronName = :patron AND cardNo = :cardno';
		$statement = $db->prepare($query);		
		$statement->bindValue(':patron', "$patron");
		$statement->bindValue(':cardno', "$cardno");
		$statement->execute();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();
		if($rowCount >= 1){ echo 'true'; }
		else{ echo 'false'; }
	}
	else{
		$patron = filter_input(INPUT_POST, 'patron-r');
		$query = 'SELECT id FROM kas58.patrons WHERE patronName = :patron';
		$statement = $db->prepare($query);		
		$statement->bindValue(':patron', "$patron");
		$statement->execute();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();
		if($rowCount >= 1){ return True; }
		else{ return False; }
	}
}

function sendMessage(){
	$db = Database::getDB();
	$patron = filter_input(INPUT_POST, 'patron');
	$patron_r = filter_input(INPUT_POST, 'patron-r');
	if(verify() == True){
		$message = filter_input(INPUT_POST, 'message');
		$query = 'INSERT INTO kas58.chat (patron, recipient, patronmessage) VALUES (:patron, :patron_r, :patronmessage)';
		$statement = $db->prepare($query);
		$statement->bindValue(':patron', "$patron");
		$statement->bindValue(':patron_r', "$patron_r");
		$statement->bindValue(':patronmessage', "$message");
		$statement->execute();
		$statement->closeCursor();
		echo "true";
	}
	else{
		echo "false";
	}
}

function receiveMessage(){
	$db = Database::getDB();
	$patron = filter_input(INPUT_POST, 'patron');
	$patron_r = filter_input(INPUT_POST, 'patron-r');
	$query = 'SELECT patronmessage FROM kas58.chat WHERE recipient = :patron AND patron = :patron_r ORDER BY id DESC LIMIT 1';
	$statement = $db->prepare($query);
	$statement->bindValue(':patron', "$patron");
	$statement->bindValue(':patron_r', "$patron_r");
	$statement->execute();
	$messages = $statement->fetch();
	$statement->closeCursor();
	echo $messages[0];
}

function closeChat(){
	$db = Database::getDB();
	$query = 'DELETE FROM kas58.chat WHERE id < 1000';
	$statement = $db->prepare($query);
	$statement->execute();
	$statement->closeCursor();
	echo "true";

}

?>