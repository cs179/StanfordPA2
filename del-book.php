<?php
	require("common.php");
	var_dump($_POST);
	
	$query = "DELETE FROM books WHERE uid=".$_POST['uid'];
	$result = mysql_query($query);
	
	//Should probably also delete the comments from the book
	
	$query = "DELETE FROM comments WHERE book_uid=".$_POST['uid'];
	$result = mysql_query($query);
	
	header("Location: index.php");

?>