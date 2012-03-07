$(document).ready(function() {  // wait for DOM ready event

    // grab a reference to the form
    var form = $("#add-book");
    
    var book_list = $("#book-list");
    
    
    form.submit(function () {
    	var title = $("#title-input");
    	var author = $("#author-input");
    	var image_url = $("image_url-input");
    	
    	//let's ajax this shit
    	$.ajax({
    		url: "add-book.php",
    		type: "post",
    		data: {title:title, author:author, image_url:image_url}
    	});
    	
    	//now we pray it got to the server and update the page accordingly
    	
    	var new_book = $('<li class="book-listing ui-li ui-li-static ui-li-has-thumb">');
    	
    	var new_title = $('<h3 class="ui-li-heading">').text(title.val());
    	
    	var new_author = $('<p class="ui-li-desc">').text(author.val());
    	
    	var new_image_url = $('<img class="ui-corner-tl ui-li-thumb">').src(image_url.val());
    	);
    	

    }
            
    // get a reference to the list of posts
    var list = $("div#posts-list");

});