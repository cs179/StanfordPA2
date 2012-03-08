$(document).ready(function() {  // wait for DOM ready event		

	/*
	 * Set up the recommendations
	 *
	 */
		var book_list = $("#book-list");
		book_list.listview();
		
		$.ajax({
			url:"get-books.php",
			success: function(booksJSON){
				var books=JSON.parse(booksJSON);
				console.log(books);
				for (x in books) {
					var book = books[x];
					var new_book = makeBook(book['title'], book['author'], 
						book['image_url'], book['uid']);
					book_list.append(new_book);
				}
				book_list.listview('refresh');
			}
		
		});

    /*
     * Capture the form submit 
     *
     */
    var form = $("#add-book");
    
    var book_list = $("#book-list");
    
    
    form.submit(function () {
    	var title = $("#title-input").val();
    	var author = $("#author-input").val();
    	var image_url = $("#image_url-input").val();
    	
    	//let's ajax this shit
    	$.ajax({
    		url: "add-book.php",
    		type: "post",
    		data: {title:title, author:author, image_url:image_url},
    		success: function(uid) {
				var new_book = makeBook(title, author, image_url, uid);
				book_list.append(new_book);
				book_list.listview('refresh');
    		}
    	});
    	
    	$.mobile.changePage("#page_1");
		return false; 
		
    });
    
    /*
     * Capture the delete clicks
     *
     */
     
     var delbtns = $(".del-btn");
     var book_list = $("#book-list");

     delbtns.live('click', function() {
     	//get the uid of the button
     	var uid_to_del = $(this).data("uid");
     	var book_to_del = $(this).parent('li');
     	console.log(uid_to_del);
     	//make an ajax call
     	$.ajax({
     		url: "del-book.php",
    		type: "post",
    		data: {uid:uid_to_del},
    		success: function() {
				book_to_del.remove();
				book_list.listview('refresh');
    		}
    		
     	});
     	
		return false; 
     	
     });
	 
	 
	//handle add-comment form submit
	$("#add-comment_form").submit(function() {
		
		//Aquire the objects we need
		var comment = $("#comment-input").val();
		var book_uid = $("#page_3").data("book_uid");
		var comment_list = $("#comment-list");

		//add the comment to the database
		$.ajax({
			url  : "add-comment.php",
			type : "post",
			data : {comment:comment, book_uid:book_uid},
			success : function() {
				makeComment(comment, comment_list);
			}
		});
		return false;
	});
	
	
	/*
	 * Grab the page navigation arrows to affec their transformations
	 *
	 */
		var back_btns = $(".ui-btn-left");
		back_btns.live('click', function(){
			$.mobile.changePage("#page_1",{reverse:true});
			console.log("reverse applied");
		});
		
	/*
	 * Tie title text and comment text to transition to comment screen
	 *
	 */ 
	 
	 var book_listings = $(".comment-clickable");
	 
	 book_listings.live('click', function() {
	 	//get the title and uid of the book
	 	var listing = $(this).parents(".book-listing");
	 	var title = listing.find('.book-title').text();
	 	var book_uid = listing.data("uid");
	 	
	 	$.mobile.changePage("#page_3");
	 	$("#page_3").data({book_uid: book_uid});
	 	$("#page_3").data({title: title});
	 	//find the heading and make it have the title
	 	$("#comment-heading").text("Comments for " + title);
	 	
	 	//grab a reference to the comment list and build it 
	 	
	 	var comment_list = $("#comment-list");
	 	comment_list.empty();
	 	
	 	//do an ajax call to get all of the comments
	 	
	 	$.ajax({
	 		url     : "get-comments.php",
	 		type    : "post",
	 		datatype: "json",
	 		data    : {book_uid:book_uid},
	 		success : function(commentsJSON) {
	 			var comments = $.parseJSON(commentsJSON);
	 			console.log(comments);
	 			for (x in comments) {
	 				var comment = makeComment(comments[x], comment_list);
	 			}
	 		}
	 	});
	 	
	 });
	
	
	/*
	 * Bind the cover image for favoriting
	 *
	 */
	 
	 $(".thumb-nail").live('click', function(){
	 	var img = $(this);
	 	var listing = $(this).parents(".book-listing");
	 	var uid = listing.data('uid');
	 		 	
	 	var favoritesJSON = localStorage['favorites'];
		//if (favoritesJSON!=null){
			var favorites = JSON.parse(favoritesJSON);
		//}
		
	 	
		 if (img.attr('src')!="star_icon.png"){
			img.attr('src', "star_icon.png");
			favorites.push(uid);
			localStorage['favorites'] = JSON.stringify(favorites);
		} else {
			img.attr('src', img.data('src'));
		
			//found this on stackoverflow
			favorites = jQuery.grep(favorites, function(value) {
				return value != uid;
			});
			localStorage['favorites']= JSON.stringify(favorites);
		}

	 });
		
});


/*
 * Takes a string and creates an HTML list element formatted like a comment
 *
 */
 
 function makeComment(comment, comment_list){
 	var new_comment = $("<li />");
 	new_comment.text(comment);
 	comment_list.append(new_comment);
 	comment_list.listview();
 	comment_list.listview('refresh');
 }
 
 function makeBook(title, author, image_url, uid){
 	var favorites = localStorage['favorites'];
 	favorites = JSON.parse(favorites);
	var new_book = $('<li class="book-listing" data-uid='+uid+'/>').attr('data-uid', uid);
	var list_shell = $('<a />');
	var fav = $.inArray(uid,favorites);
		if(fav!=-1){ 
			var img = $('<img class="thumb-nail"/>').attr('src', "star_icon.png");
			list_shell.append(img); }
		else{ 
			var img = $('<img class="thumb-nail"/>').attr('src', image_url);
			list_shell.append(img);}
		img.data('src', image_url);
		list_shell.append($('<h3 class="book-title comment-clickable"></h3>').text(title)).attr('class', 'book-title');				
		list_shell.append($('<p class="comment-clickable"></p>').text(author));	
		new_book.append(list_shell);
	new_book.append($('<a class="del-btn"/>').attr('data-uid', uid));
	return new_book;
 }
 
/*
while($row = mysql_fetch_array($result)) {
	//$comments = mysql_query("SELECT * FROM comments WHERE pid =".$row['pid']); 
	
	echo('<li class="book-listing" data-uid='.$row['uid'].'>');
	echo('<a>');
	echo('<img class="thumb-nail" src="'.$row["image_url"].'">');
	echo('<h3 class="book-title comment-clickable">'.$row["title"].'</h3>');
	echo('<p class="comment-clickable">'.$row["author"].'</p>');
	//echo('<a href="index.html#page3" class="comment-notice"> join the conversation </a>');
	echo('</a>');
	echo('<a class="del-btn" id=del-btn_'.$row['uid'].' data-uid='.$row['uid'].'></a>');
	
	echo('</li>');
}

 */