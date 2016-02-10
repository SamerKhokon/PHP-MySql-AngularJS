<?php
 class Rest {
    public function conection() {
		return new PDO("mysql:host=localhost;dbname=cream;","root" ,"");
	}
	
	public function getAllData() {
	    $db = $this->conection();
		$str = "SELECT `id`,`ad_code` FROM `adcode_setting`";
		$stm = $db->prepare($str);
		$stm->execute();
  
		while ( $r = $stm->fetch(PDO::FETCH_ASSOC) ) {
			$result[] = array(
				'id' => $r['id'] ,
				'name' => $r['ad_code']		
			);
		}
		header("Content-type:application/json");
		echo json_encode($result);
    }
 }
   $r = new Rest(); 
   $r->getAllData();
?>