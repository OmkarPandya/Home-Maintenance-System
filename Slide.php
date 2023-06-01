<html>
<head>
<title>Client\Slideshow</title>
<style type="text/css">
@keyframes slider
{
	0%
	{
		Left:0%;
	}
	20%
	{
		Left:0%;
	}
	25%
	{
		Left:-100%;
	}
	45%
	{
		Left:-100%;
	}
	50%
	{
		Left:-200%;
	}
	70%
	{
		Left:-200%;
	}
	75%
	{
		Left:-200%;
	}
	95%
	{
		Left:-200%;
	}
	100%
	{
		Left:-200%;
	}
}

#slider figure img
{
		width:20%;
		float:left;
}

#slider figure
{
	position:relative;
	width:495%;
	margin:0%;
	left:0%;
	animation:10s slider infinite; 
}
</style>
</head>
<body>
<div id="slider">
	<figure>
	<img src="C/C1.jpg" width="100%">
	<img src="C/C2.jpg" width="100%">
	<img src="C/C3.jpg" width="100%">
	<img src="C/C4.jpg" width="100%">
	<img src="C/C5.jpg" width="100%">
	<img src="C/C6.jpg" width="100%">
	<img src="C/C7.jpg" width="100%">
	<img src="C/C8.jpg" width="100%">
	</figure>
</div>
</body>
</html>