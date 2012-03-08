<?php
	require("common.php");
	
	if (isset($_POST['comment']) and isset($_POST['book_uid'])){
		
		$book_uid = mysql_real_escape_string($_POST['book_uid']);
		$comment = mysql_real_escape_string($_POST['comment']);
		
		$query = "INSERT INTO comments (book_uid, comment) VALUES('".$book_uid."','".$comment."')";
	}
	
		
	$result = mysql_query($query);
	echo(mysql_insert_id());

?>