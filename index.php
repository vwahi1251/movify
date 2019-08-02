<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.solodev.com/_/assets/pagination/jquery.twbsPagination.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php

get_header();
?>


	<script>
	
	var links=document.createElement('div');
	links.id="pagination";
	
	$(document).ready(function(){
		var url = "https://api.themoviedb.org/3/movie/popular?api_key=1e448e0dfcdbb565f5d329820065b4d2";
	    var image_url = "https://image.tmdb.org/t/p/w500";
		$.get(url, function(data){
	$('#pagination').twbsPagination({
    totalPages: data.total_pages-8,
// the current page that show on start
    startPage: 1,

// maximum visible pages
    visiblePages: 5,

	initiateStartPageClick: true,

// template for pagination links
    href: false,

// variable name in href template for page number
	hrefVariable: '{{number}}',

	// Text labels
	first: 'First',
	prev: 'Previous',
	next: 'Next',
	last: 'Last',

	// carousel-style pagination
	loop: false,

// callback function
	onPageClick: function (event, page) {
		
			
			var url = "https://api.themoviedb.org/3/movie/popular?api_key=1e448e0dfcdbb565f5d329820065b4d2";
	    var image_url = "https://image.tmdb.org/t/p/w500";
			  $('.page-active').removeClass('page-active');
			  $('#page'+page).addClass('page-active');
			  url += "&page=" + page;
			  $.get(url, function(data){
				 
				  for(var i=0;i<data.results.length;i++){
					  
					  $(".video").remove();
				  }
			  var k=0;
				for(var i=0;i<data.results.length;i++){
					var $div = $('<article />').appendTo('.bmain');
					
					if((i+1)==data.results.length){
						$div.attr('id','videolast');
					}
					$div.attr('class', 'video');
					$(".video")[i].innerHTML="<figure/>";
					
					
					var result = data.results[i];
   
					var title = result.original_title;
				   var overview = result.overview;
				   var image = result.poster_path;
				   var img = document.createElement("IMG");
				   var ttl = document.createElement("H2");
				   var ovrvw = document.createElement("P");
				   var bttn=document.createElement("button");
				  bttn.innerHTML="Details";
				  bttn.id="details";
				  ttl.className="headtext";
					ovrvw.className="overview";
				   
				   image_url= "https://image.tmdb.org/t/p/w500";
				   image_url += image;
				   img.src = image_url; 
				   ttl.innerText = title;
				   ovrvw.innerText = overview ; 
				 
				   $("figure")[i].innerHTML="<img src='" + img.src + "' />";
				   $('figure')[i].append(ttl);
				   $('figure')[i].append(ovrvw);
				   $('figure')[i].append(bttn);

 }
			$("#videolast").after(links);
 				  
			$("#details").click(function(){
    
  });
		$('body').on('click','.video',function() { window.location.href = 'http://localhost/wordpress/movie_detail/?page='+page+"?index="+($(this).index());
		});
	
	});
},

// pagination Classes
	paginationClass: 'pagination',
	nextClass: 'next',
	prevClass: 'prev',
	lastClass: 'last',
	firstClass: 'first',
	pageClass: 'page',
	activeClass: 'active',
	disabledClass: 'disabled'

});

  
	});
	document.body.append(links);
});
 


</script> 

<div class="bmain"></div>

<?php get_footer(); ?>






