<?php

	require("common.php");
	$query = "SELECT * FROM books";
	$result = mysql_query($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CS179 PA2: Ben B.'s Book Club</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        // redirect to home page on landing or refresh
        $(document).bind("mobileinit", function(){
                document.location.href="index.php#page_1";
        });
        </script>
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js" type="text/javascript"></script>
       	<!--<script src="site.js" type="text/javascript"></script> -->
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        
        <div data-role="page" id="page_1">
        
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Ben B.'s Book Club</h1>
                <a href="index.html#page_2" data-icon="arrow-r" data-theme="b" class="ui-btn-right">Add Books</a>
            </div><!-- /header -->
            
            <div data-role="content" class="centered-object">
                
                <h2 class="heading">Reading Suggestions </h2>
                
                <ul data-role="listview" id="book-list" data-inset="true">
                <?php 
					while($row = mysql_fetch_array($result)) {
						//$comments = mysql_query("SELECT * FROM comments WHERE pid =".$row['pid']); 

						echo('<li class="book-listing">');

						echo('<img src="'.$row["image_url"].'">');
						echo('<h3>'.$row["title"].'</h3>');
						echo('<p>'.$row["author"].'</p>');
						
						echo('</li>');
					}
				?>
                </ul><!-- list of books -->
                

                
            </div>
        </div><!-- /page -->
        <div data-role="page" id="page_2">
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Ben B.'s Book Club</h1>
                <a href="index.html#page_1" data-icon="arrow-l" data-theme="b" class="ui-btn-left">View Books</a>
            </div><!-- /header -->
        	<div id="add-book" class="centered-object">
				<form action="add-book.php" method="post">
				<div data-role="fieldcontain" class="ui-fieldcontain ui-body ui-br">
					<label for="title-input" class="ui-input-text">Title: </label>
					<input type="text" name="title" id="title-input" value class="ui-input-text" 
						ui-body-c ui-corner-all ui-shadow-inset">
				</div>
				<div data-role="fieldcontain" class="ui-fieldcontain ui-body ui-br">
					<label for="author-input" class="ui-input-text">Author: </label>
					<input type="text" name="author" id="author-input" value class="ui-input-text" 
						ui-body-c ui-corner-all ui-shadow-inset">
				</div>
				<div data-role="fieldcontain" class="ui-fieldcontain ui-body ui-br">
					<label for="image_url-input" class="ui-input-text">URL: </label>
					<input type="url" name="image_url" id="image_url-input" value class="ui-input-text" 
						ui-body-c ui-corner-all ui-shadow-inset">
				</div>
				<div class="ui-btn" >
					<input type="submit" id="add-book-submit" value="make it so" data-inline="true">
				</div>
				</form>
			</div>
        </div><!--- /page -->
    
    </body>
</html>