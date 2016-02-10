<?php 	$con = mysql_connect('localhost','root','');
		mysql_select_db('sms_app',$con);

		$sql = "select ID,CompanyName,ContactName,Address,ContactTitle,Country,Phone 
			from customers order by ID desc";
				
		$r   = mysql_query($sql);
		while($row = mysql_fetch_assoc($r))
		$res[] = $row;
		
		echo json_encode($res);
?>