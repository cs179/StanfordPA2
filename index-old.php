<?php
	require("common.php");
	
	$query = "SELECT * FROM posts";
	$result = mysql_query($query);
	
	// TODO 1: Set a query that would return all the posts from the table
	
	// TODO 3: Change query to filter posts by if the keyword is found in the comments associated with the post
	
	// TODO 1: Perform query
	
?>
<!DOCTYPE html>
<html >
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>CS 179 Lab 2</title>
</head>

<body>
	<div id='wrapper'>
		<div id='header'>
			<div id='title'><a href="index.php">CS 179 Lab 2<a/></div>

			<form id="addpost" name="addpost" method="post" action="add_post.php"> 
				<input type="text" name="title" id="title" placeholder="Title"/>
				<input type="text" name="url" id="url" placeholder="URL"/><br />
				<textarea name="description" id="description" rows="3" cols="38" placeholder="Description"></textarea>
				<input type="submit" value="Post" />
			</form>
		</div>
		<br/>
		<form id="filter" name="filter" method="get" action="index.php"> 
			<input type="query" name="query" id="query" placeholder = "Filter by keyword"/>
			<input type="submit" value="Filter" />
		</form>
		<br/>
		<?php
			$filter = $_GET['filter'];
			while($row = mysql_fetch_array($result))
			{
				
				$comments = mysql_query("SELECT * FROM comments WHERE pid =".$row['pid']);
				echo('<h2><a href=http://'.$row["url"].'>'.$row["title"].'</a></h2>');
				echo($row["description"].'<br/>');
				// TODO 3: For each post, query and display number of comments, linking to details page passing pid using $_GET
				echo('<a href=details.php?pid='.$row["pid"].'>Read '.mysql_num_rows($comments).' comment(s) <br/><br/>');
			}
			
			// TODO 3: For each post, query and display number of comments, linking to details page passing pid using $_GET(details.php?pid=1 would pass 1 as the pid)
		?>
	</div>
</body>
</html>
