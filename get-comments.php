<?php
	require("common.php");
	
		if (isset($_POST['book_uid'])){
		
			$book_uid = mysql_real_escape_string($_POST['book_uid']);
			$query = "SELECT * FROM comments WHERE book_uid=".$book_uid;

		
			$result = mysql_query($query);
			
			$comments = array();

			// So I need to figure out how to get an array of the comments, jsonify them
			
			while($row = mysql_fetch_array($result)) {
				$comments[] = $row["comment"];
			}
			
			
			echo(json_encode($comments));
		}
?>