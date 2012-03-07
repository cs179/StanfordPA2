$(document).ready(function() {  // wait for DOM ready event
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
				var new_book = $('<li class="book-listing"/>').attr('data-uid', uid);
					var list_shell = $('<a />');
						list_shell.append($('<img />').attr('src', image_url));
						list_shell.append($('<h3></h3>').text(title)).attr('class', 'book-title');				
						list_shell.append($('<p></p>').text(author));	
					new_book.append(list_shell);
					new_book.append($('<a class="del-btn"/>').attr('data-uid', uid));
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
     
	/*
	 * Bind the book listings for commenting
	 *
	 */
	 
	 var book_listings = $(".book-listing");
	 
	 book_listings.live('click', function() {
	 	//get the title and uid of the book
	 	var title = $(this).find('.book-title').text();
	 	var book_uid = $(this).data("uid");
	 	
	 	$.mobile.changePage("#page_3");
	 	$("#page_3").data({book_uid: book_uid});
	 	$("#page_3").data({title: title});
	 	//find the heading and make it have the title
	 	$("#comment-heading").text("Comments for " + title);
	 	
	 	//grab a reference to the comment list and build it 
	 	
	 });
	 
	 
	//handle add-comment form submit
	$("#add-comment_form").submit(function() {
		console.log("caught form submit");
		var comment = $("#comment-input").val();
		var book_uid = $("#page_3").data("book_uid");
		$.ajax({
			url  : "add-comment.php",
			type : "post",
			data : {comment:comment, book_uid:book_uid},
			success : function(uid) {
				console.log("ajax success");
			}
		});
		return false;
	});

});