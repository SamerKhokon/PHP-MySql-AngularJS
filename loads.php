<?php 	$con = mysql_connect('localhost','root','');
		mysql_select_db('db_iportal',$con);

		$sql = "select open,high,low,
				ltp,ycp,entry_date,total_trade
				from eod_stock 
				where entry_date=(select max(entry_date))
				order by entry_date desc limit";
				
		$r   = mysql_query($sql);
		while($row = mysql_fetch_assoc($r))
		$res[] = $row;
		
		echo json_encode($res);
?>