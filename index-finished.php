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
        
            <div data-role="header" data-id="header" data-position="fixed"  data-add-back-btn="true" >
                <h1>Ben B.'s Book Club</h1>
            </div><!-- /header -->
            
            <div data-role="content">
                
                <h5>Reading Suggestions </h5>
                
                <ul data-role="listview" id="tweet-list">
                <?php 
					while($row = mysql_fetch_array($result)) {
						//$comments = mysql_query("SELECT * FROM comments WHERE pid =".$row['pid']); 
						echo('<h2>'.$row["title"].'</h2>');
						//echo($row["description"].'<br/>');
						//echo('<a href=details.php?pid='.$row["pid"].'>Read '.mysql_num_rows($comments).' comment(s) <br/><br/>');
					}
				?>
                </ul><!-- list for holding tweets -->
                
            </div>
            <!-- Comment for git to find -->
        </div><!-- /page -->
    
    </body>
</html>