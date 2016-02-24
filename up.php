<?php 
	$file = $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);
	echo "file uploaded successfully.";
?>