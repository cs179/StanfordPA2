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
		console.log(title);
		console.log(author);
		console.log(image_url);
    	
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
    	
    	$.mobile.changePage("#page_1");
		return false; 
		
    });
    
    /*
     * Capture the delete clicks
     *
     */
     
     var delbtns = $(".del-btn");
     delbtns.click(function() {
     	//get the uid of the button
     	var uid_to_del = $(this).data("uid");
     	
     	//make an ajax call
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
     });
     
     
     
     
     
     
     
     
     /*
      *						<div data-role="foo">
						$('#book').jqmData(key, value);
						$('#book').jqmData(key); // return value
						$('#book').jqmData('role') // 'foo'
      *
      */
});