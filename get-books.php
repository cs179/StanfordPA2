<?php

	require("common.php");
	$query = "SELECT * FROM books";
	$result = mysql_query($query);
	
	$infos = array();
		
	// So I need to figure out how to get an array of the comments, jsonify them
			
	while($row = mysql_fetch_array($result)) {
		$info = array();
		$info['uid'] = (int)$row["uid"];
		$info['title'] = $row["title"];
		$info['author'] = $row["author"];
		$info['image_url'] = $row["image_url"];
		$infos[] = $info;
	}
			
			
	echo(json_encode($infos));

?>