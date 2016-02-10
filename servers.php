<?php

	$db = new PDO("mysql:host=localhost;dbname=sinfo;","root","");
	
	$str = "SELECT 	`id`, 
	`server_ip`, 
	`server_type`, 
	`user_name`, 
	`pass_word`, 
	`entry_date`
	 
	FROM `server_info`";
	
	$stm = $db->prepare($str);
	$stm->execute();

	if($stm->rowCount()>0){
		while($r = $stm->fetch(PDO::FETCH_ASSOC)) {
			$result[] = array(
				'id' => (int)$r['id'] , 
				'server_ip'=> $r['server_ip'] , 
				'server_type'=> $r['server_type'] , 
				'user_name'=> $r['user_name'] , 
				'pass_word'=>  $r['pass_word'] 
			);
		}	
		
		header('Content-type: application/json');
		echo json_encode($result);
	}
?>