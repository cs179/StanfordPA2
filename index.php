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
       	<script src="site.js" type="text/javascript"></script>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        
        <div data-role="page" id="page_1">
        
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Ben B.'s Book Club</h1>
                <a href="index.html#page_2" data-icon="arrow-r" data-theme="b" class="ui-btn-right">Add Books</a>
            </div><!-- /header -->
            
            <div data-role="content" class="centered-object">
                
                <h2 class="page-heading">Reading Suggestions </h2>
                <h4 class="page-heading">Click a title to view comments or click a cover to favorite </h4>
                
                <ul data-role="listview" id="book-list" data-split-theme="d"   data-inset="true" 
                	data-split-icon="delete">

                </ul><!-- list of books -->
            </div>
        </div><!-- /page -->
        
        <!--- add book page --->   
        <div data-role="page" id="page_2">
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Ben B.'s Book Club</h1>
                <a href="index.html#page_1" data-icon="arrow-l" data-theme="b" class="ui-btn-left">View Books</a>
            </div><!-- /header -->
        	<div id="add-book" class="centered-object">
        		<h2 class="page-heading"> Add your favorite book </h2>
				<form action="add-book.php" id="add-book-form" method="post">
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
        </div><!--- / add book page -->
        
        <!--- comments page --->
        
         <div data-role="page" id="page_3">
            <div data-role="header" data-id="header" data-position="fixed">
                <h1>Book Club</h1>
                <a href="index.html#page_1" data-icon="arrow-l" data-theme="b" class="ui-btn-left">View Books</a>
            </div><!-- /header -->
        	<div id="add-comment" class="centered-object">
        	    <h2 class="page-heading" id="comment-heading">Comments for </h2>

				<form action="add-comment.php" id="add-comment_form" method="post">
				<div data-role="fieldcontain">
					<label for="comment-input">Add a comment: </label>
					<input type="text" name="comment" id="comment-input">
				</div>
				<div class="ui-btn" >
					<input type="submit" id="add-comment-submit" value="do it" data-inline="true">
				</div>
				</form>
				
				<div id="comment-list">
					<ul data-role="listview" id="book-list" data-inset="true"> </ul>
				</div>
			</div>
        </div><!--- /page -->
    
    </body>
</html>