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
				var new_book = $('<li class="book-listing"/>')
					var list_shell = $('<a />');
						list_shell.append($('<img />').attr('src', image_url));
						list_shell.append($('<h3></h3>').text(title));				
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
      *						<div data-role="foo">
						$('#book').jqmData(key, value);
						$('#book').jqmData(key); // return value
						$('#book').jqmData('role') // 'foo'
      *
      */
});