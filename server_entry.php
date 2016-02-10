<?php
	$db = new PDO("mysql:host=localhost;dbname=sinfo;","root","");
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$server_ip = addslashes($request->server_ip);
	$server_type = addslashes($request->server_type);
	$user_name = addslashes($request->user_name);
	$pass_word = addslashes($request->pass_word);
		
	
	echo $str = "INSERT INTO `server_info`(`server_ip`,
	`server_type`, 
	`user_name`, 
	`pass_word`,
	`entry_date`)
	
	VALUES('$server_ip', '$server_type',
	'$user_name', '$pass_word', NOW());";

	$stm = $db->prepare($str);
	$stm->execute();
?>