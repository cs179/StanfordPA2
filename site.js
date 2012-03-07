$(document).ready(function() {  // wait for DOM ready event
    // grab a reference to the form
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
    		success: function() {
				var new_book = $('<li class="book-listing">');
			
					new_book.append($('<img />').attr('src', image_url));
					new_book.append($('<h3></h3>').text(title));				
					new_book.append($('<p></p>').text(author));			
					book_list.append(new_book);
				
				book_list.listview('refresh');
    		}
    	});
    	
    	
    	//now we pray it got to the server and update the page accordingly
    	//*** I never added closing tags because I thought that was what I was supposed to do
    	
    		
    	
    	
		return false; 
		
    });
    
});