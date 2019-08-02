$(document).ready(function(){
 var url = "https://api.themoviedb.org/3/movie/popular?api_key=1e448e0dfcdbb565f5d329820065b4d2";
 var page = 1;
 var image_url = "https://image.tmdb.org/t/p/w500";
 url += "&page=" + page;
 $.get(url, function(data){
   var result = data.results[0];
   var title = result.original_title;
   var overview = result.overview;
   var image = result.poster_path;
   image_url += image;
   document.querySelector("#movie1 .image").src = image_url;
   document.querySelector("#movie1 .title").innerHTML = title;
   document.querySelector("#movie1 .overview").innerHTML =overview;
 });});