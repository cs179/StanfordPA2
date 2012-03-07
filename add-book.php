<?php

	require("common.php");

	if (isset($_POST['author']) and isset($_POST['title']) and isset($_POST['image_url'])) {
	
		$title = mysql_real_escape_string($_POST['title']);
		$author = mysql_real_escape_string($_POST['author']);
		$image_url = mysql_real_escape_string($_POST['image_url']);

	$query = "INSERT INTO posts (title, author, image_url) VALUES('".$title."','
		".$author."','".$image_url."')";

	
	$result = mysql_query($query);
	
	}
	
	echo($_POST['author']);
	// Redirect to homepage
	//header("Location: index.php");
?>