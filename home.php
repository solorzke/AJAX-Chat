<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW5</title>
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="Js/ajax-app.js"></script>
	</head>
	<body>
		<div class="chat-box">
			<div class="chat-frame">
				<h1>Chat Box</h1>
				<label>Patron Name: </label>
				<input type="text" name="patron" id="patron">
				<br>
				<label>Card ID: </label>
				<input type="number" name="card-no" id="card-no">
				<br>
				<input type="submit" name="submit" value="Connect" id="connect">
				<br>
				<label>Send Chat Message</label>
				<br>
				<textarea name="message" rows="4" cols="50" id="message" maxlength="100"></textarea>
				<br>
				<input type="submit" name="submit" value="Send" id="send">
			</div>
		</div>
		<div class="chat-box">
			<div class="chat-frame">
				<h3>Chat Log: </h3>
				<label>Recipient's name: </label>
				<input type="text" id="patron-r">
				<br>
				<input type="submit" name="" value="Listen" id="listen">
				<br>
				<textarea id="chat-log" rows="15" cols="50"></textarea>
				<input type="submit" name="" value="Close Chat" id="close-chat">
			</div>
		</div>
	</body>
</html>