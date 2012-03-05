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
                document.location.href="index-finished.php#page_1";
        });
        </script>
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js" type="text/javascript"></script>
        <script src="site.js" type="text/javascript"></script>
        <script src="exercise-finished.js" type="text/javascript"></script>
    </head>
    <body>
        
        
        <div data-role="page" id="page_1">
        
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Ben B.'s Book Club</h1>
                <a href="index.html#page_2" data-icon="arrow-r" data-theme="b" class="ui-btn-right">Add Book</a>
            </div><!-- /header -->
            
            <div data-role="content">
                
                <h2 class="heading">Reading Suggestions </h2>
                
                <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
                <?php 
					while($row = mysql_fetch_array($result)) {
						//$comments = mysql_query("SELECT * FROM comments WHERE pid =".$row['pid']); 

						echo('<li class="book-listing ui-li ui-li-static ui-li-has-thumb">');

						echo('<img src="'.$row["url"].'" class="ui-corner-tl ui-li-thumb">');
						echo('<h3 class="ui-li-heading">'.$row["title"].'</h3>');
						echo('<p class="ui-li-desc">'.$row["author"].'</p>');
						
						echo('</li>');
					}
				?>
                </ul><!-- list of books -->
                

                
            </div>
        </div><!-- /page -->
        
        <div data-role="page" id="page_2">
        	<div id="input-form">
				<form action="addbook.php" method="post">
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
					<label for="url-input" class="ui-input-text">URL: </label>
					<input type="url" name="url" id="url-input" value class="ui-input-text" 
						ui-body-c ui-corner-all ui-shadow-inset">
				</div>
				</form>
			</div>
        </div><!--- /page -->
    
    </body>
</html>