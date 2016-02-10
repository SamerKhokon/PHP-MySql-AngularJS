<?php

	$db = new PDO("mysql:host=localhost;dbname=cream;","root","");
	
	$str = "SELECT 	`id`, 
				`unit_price`, 
				`ad_code`, 
				`click_count`, 
				`registration_count`	 
				FROM 	`adcode_setting` ";
				
	$stm = $db->prepare($str);
	$stm->execute();

	while($r = $stm->fetch(PDO::FETCH_ASSOC)) {
	    $result[] = array(
			'id' => (int)$r['id'] , 
			'unit_price'=> (int)$r['unit_price'] , 
			'ad_code'=> $r['ad_code'] , 
			'click_count'=> (int)$r['click_count'] , 
			'registration_count'=> (int)$r['registration_count'] 
		);
	}	
	
	header('Content-type: application/json');
	echo json_encode($result);
?>