
$(document).ready(function(){

	$("#connect").click(function(){
		verify();
	});

	$("#send").click(function(){
		sendMessage();
	});

	$('#listen').click(function(){
		receiveMessage();
	});

	$('#close-chat').click(function(){
		closeChat();
	});

});

function verify(){
	var patron = $("#patron").val();
	var cardno = $("#card-no").val();
	var action = 'verify';

	var data = "patron=" + patron + "&cardno=" + cardno + "&action=" + action;
	$.ajax({
		url:'https://web.njit.edu/~kas58/it202-hw5/Model/db_query.php',
		type:"post",
		data: data,
		success: function(response){
			if(response == 'true')
				alert('Login Successful');
			else
				alert("login failed");
		},
		error: function(response){
			alert("An error occured!");
		}
	});
}

function sendMessage(){
	var message = $("#message").val();
	var patron = $("#patron").val();
	var patron_r = $("#patron-r").val();
	var action = 'sendMessage';
	var data = "patron=" + patron + "&message=" + message + "&action=" + action + "&patron-r=" + patron_r;

	$.ajax({
		url: 'https://web.njit.edu/~kas58/it202-hw5/Model/db_query.php',
		type: 'post',
		data: data,
		success: function(response){
			if(response == 'true'){
				$("#chat-log").append(patron + ": " + message + "\n");
				alert("Message was sent!");
			}
			else{
				alert("Check Database!");
			}
		},
		error: function(response){
			alert("Failed to send message!");
		}
	});
}

function receiveMessage(){
	var patron_r = $("#patron-r").val();
	var patron = $("#patron").val();
	var action = 'receiveMessage';
	var data = "patron-r=" + patron_r + "&patron=" + patron + "&action=" + action;

	$.ajax({
		url: 'https://web.njit.edu/~kas58/it202-hw5/Model/db_query.php',
		type: 'post',
		data: data,
		success: function(response){
			console.log(response);
			$('#chat-log').append(patron_r + ': ' + response + '\n');
			alert(response);
		},
		error: function(response){
			alert("Failed to receive message!");
		}
	});
}

function closeChat(){
	var action = 'closeChat';
	var data = "action=" + action;
	$.ajax({
		url: 'https://web.njit.edu/~kas58/it202-hw5/Model/db_query.php',
		type: post,
		data: data,
		success: function(response){
			$('#close-chat').val('');
			alert("Chat is closed!");
		},
		error: function(response){
			alert("Failed to close chat!");
		}
	});
}




