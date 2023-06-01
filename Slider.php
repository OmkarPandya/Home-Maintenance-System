<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.mySlides 
{
	display:none;
}

</style>
<body>

<h2 class="w3-center">Automatic Slideshow</h2>

<div class="w3-content w3-section" style="max-width:1000px">
  <img class="mySlides" src="C\C1.jpg" style="width:100%">
  <img class="mySlides" src="C\C2.jpg" style="width:100%">
  <img class="mySlides" src="C\C3.jpg" style="width:100%">
  <img class="mySlides" src="C\C4.jpg" style="width:100%">
  <img class="mySlides" src="C\C5.jpg" style="width:100%">
  <img class="mySlides" src="C\C6.jpg" style="width:100%">
  <img class="mySlides" src="C\C7.jpg" style="width:100%">
  <img class="mySlides" src="C\C8.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() 
{
    var i;
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("w3-content w3-section");
    for (i = 0; i < x.length; i++) 
	{		
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block"; 
   setTimeout(carousel, 2000); // Change image every 2 second
   
}
</script>

</body>
</html>
