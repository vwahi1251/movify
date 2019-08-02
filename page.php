<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Fluida
 */

get_header(); ?>


		
			<script>
$(document).ready(function(){
 var url = "https://api.themoviedb.org/3/movie/popular?api_key=1e448e0dfcdbb565f5d329820065b4d2";
 var page = location.search.split('page=')[1];
 var n=page.split("?")[0];
 var index = location.search.split('index=')[1];
 var image_url = "https://image.tmdb.org/t/p/w500";
 url += "&page=" + n;
 $.get(url, function(data){
   var result = data.results[index];
   var title = result.original_title;
   var overview = result.overview;
   var image = result.poster_path;
   var vbttn=document.createElement("button");
   vbttn.id="bvideo";
   image_url += image;
   document.querySelector("#movie1 .image").src = image_url;
   document.querySelector("#movie1 .headtitle").innerHTML = title;
 


   document.querySelector("#movie1 .overviewmovie").innerHTML ="<h2>Storyline</h2>"+overview;
  
  
    });
	
 });
</script>

<div id="movie1">
<img class="image">
<button id="bvideo">
 
   <img src="http://www.clipartbest.com/cliparts/9Tp/enR/9TpenRLTE.svg" id ="bimg"   />
</button>
<h2 class="headtitle"></h2> 

<p class="overviewmovie"></p>



<div id="light">
  <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
  <video id="movieVideo"  controls >
      <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
      <!--Browser does not support <video> tag -->
    </video>
</div>
<div id="fade" onClick="lightbox_close();"></div>

</div>


<style>



</style>
<script>
window.document.onkeydown = function(e) {
  if (!e) {
    e = event;
  }
  if (e.keyCode == 27) {
    lightbox_close();
  }
}

function lightbox_open() {
  var lightBoxVideo = document.getElementById("movieVideo");
  window.scrollTo(0, 0);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
  lightBoxVideo.play();
}

function lightbox_close() {
  var lightBoxVideo = document.getElementById("movieVideo");
  document.getElementById('light').style.display = 'none';
  document.getElementById('fade').style.display = 'none';
  lightBoxVideo.pause();
}
</script>
<div id="statuscomplete">
<div id="status" class="incomplete">
<span>Play status: </span>
<span class="status complete">Watched</span>
<span class="status incomplete">Not Watched</span>
<br />
</div>
<div>
<span id="played">0</span> seconds out of 
<span id="duration"></span> seconds. 
</div></div>

<script>
var video = document.getElementById("movieVideo");

var timeStarted = -1;
var timePlayed = 0;
var duration = 0;
// If video metadata is laoded get duration
if(video.readyState > 0)
  getDuration.call(video);
//If metadata not loaded, use event to get it
else
{
  video.addEventListener('loadedmetadata', getDuration);
}
// remember time user started the video
function videoStartedPlaying() {
  timeStarted = new Date().getTime()/1000;
}
function videoStoppedPlaying(event) {
  // Start time less then zero means stop event was fired vidout start event
  if(timeStarted>0) {
    var playedFor = new Date().getTime()/1000 - timeStarted;
    timeStarted = -1;
    // add the new ammount of seconds played
    timePlayed+=playedFor;
  }
  document.getElementById("played").innerHTML = Math.round(timePlayed)+"";
  // Count as complete only if end of video was reached
  if(timePlayed>=duration && event.type=="ended") {
    document.getElementById("status").className="complete";
  }
}

function getDuration() {
  duration = video.duration;
  document.getElementById("duration").appendChild(new Text(Math.round(duration)+""));
  console.log("Duration: ", duration);
}

video.addEventListener("play", videoStartedPlaying);
video.addEventListener("playing", videoStartedPlaying);

video.addEventListener("ended", videoStoppedPlaying);
video.addEventListener("pause", videoStoppedPlaying);



  $('body').on('click','#bvideo',function() { 
  lightbox_open();
		});
	 	 
</script>


<?php get_footer();?>
