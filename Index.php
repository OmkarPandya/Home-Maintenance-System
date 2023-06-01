<html>
<head>
<link rel="shortcut icon" href="Image/Logo.png">
 <link href="Animation/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="Animation/common.css" />
<title>Home Care</title>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<style type="text/css">


<script type="text/javascript" src="Animation/modernizr.custom.79639.js"></script> 
  

div#main
{	
	width:100%;
	height:58%;
}
img#i
{
	margin-left:14%;
}
.ch-item 
{
	width: 150%;
	height: 150%;
	border-radius: 50%;
	cursor: default;
	-webkit-perspective: 900px;
	-moz-perspective: 900px;
	-o-perspective: 900px;
	-ms-perspective: 900px;
	perspective: 900px;
}
.ch-info
{
	position: absolute;
	width: 100%;
	height: 100%;
	margin-left: -140px;
	margin-top:-40px;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	-o-transform-style: preserve-3d;
	-ms-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
.ch-info > div {
	display: block;
	position: absolute;
	width: 100%;
	height: 100%;
	border-radius: 50%;
	background-position: center center;
	-webkit-transition: all 0.4s linear;
	-moz-transition: all 0.4s linear;
	-o-transition: all 0.4s linear;
	-ms-transition: all 0.4s linear;
	transition: all 0.4s linear;
	-webkit-transform-origin: 50% 0%;
	-moz-transform-origin: 50% 0%;
	-o-transform-origin: 50% 0%;
	-ms-transform-origin: 50% 0%;
	transform-origin: 50% 0%;
}

.ch-info .ch-info-front 
{
	box-shadow: inset 0 0 0 16px grey;
}

.ch-info .ch-info-back
 {
	-webkit-transform: translate3d(0,0,-220px) rotate3d(1,0,0,90deg);
	-moz-transform: translate3d(0,0,-220px) rotate3d(1,0,0,90deg);
	-o-transform: translate3d(0,0,-220px) rotate3d(1,0,0,90deg);
	-ms-transform: translate3d(0,0,-220px) rotate3d(1,0,0,90deg);
	transform: translate3d(0,0,-220px) rotate3d(1,0,0,90deg);
	background:grey;
	opacity: 0;
}

.ch-img-1 
{ 
	background-image: url(Image/Client.gif);
}

.ch-img-2 
{ 
	background-image: url(Image/Service.gif);
}

.ch-info h3 
{
	color: #fff;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-size: 40px;
	margin-top:50px;
	padding:84px 0 0 0;
	height: 110px;
	font-family: 'Open Sans', Arial, sans-serif;
}
.ch-info-back a
{
	text-decoration:none;
}

.ch-info p 
{
	color: #fff;
	padding: 10px 5px;
	font-style: italic;
	margin: 0 30px;
	font-size: 12px;
	border-top: 1px solid rgba(255,255,255,0.5);
}

.ch-info p a 
{
	display: block;
	color: #fff;
	color: rgba(255,255,255,0.7);
	font-style: normal;
	font-weight: 700;
	text-transform: uppercase;
	font-size: 9px;
	letter-spacing: 1px;
	padding-top: 4px;
	font-family: 'Open Sans', Arial, sans-serif;
}

.ch-info p a:hover 
{
	color: #fff222;
	color: rgba(255,242,34, 0.8);
}

.ch-item:hover .ch-info-front 
{
	-webkit-transform: translate3d(0,280px,0) rotate3d(1,0,0,-90deg);
	-moz-transform: translate3d(0,280px,0) rotate3d(1,0,0,-90deg);
	-o-transform: translate3d(0,280px,0) rotate3d(1,0,0,-90deg);
	-ms-transform: translate3d(0,280px,0) rotate3d(1,0,0,-90deg);
	transform: translate3d(0,280px,0) rotate3d(1,0,0,-90deg);
	opacity: 0;
}

.ch-item:hover .ch-info-back
{
	-webkit-transform: rotate3d(1,0,0,0deg);
	-moz-transform: rotate3d(1,0,0,0deg);
	-o-transform: rotate3d(1,0,0,0deg);
	-ms-transform: rotate3d(1,0,0,0deg);
	transform: rotate3d(1,0,0,0deg);
	opacity: 1;
	size:30px 30px;
}

.main
{
	margin-top:12%;
}

.ch-grid h2
{
	margin-top: 14px;
	color: #29C1C3;
	margin-bottom: 22px;
	font-size: 26px;
}
h1
{
	color:#31c5c7;
	font-weight:300;
	font-size:50px;
}
@media screen and (max-width:1199px){
body
{
	background-repeat:no-repeat;
	height:750px;
	background-position:bottom center;
}

@media screen and (max-width:767px)
{
	.main img{
	width:80%;
	margin:0px auto;	
	}
	
	.main{
	margin-top:8%;
}

.ch-grid li 
{
	width: 200px;
	height: 200px;
	display: inline-block;
	margin: 20%;
}

</style>
</head>
<body background="Image/Background.gif">
<div id="google_translate_element" style="float:right;"></div>
<div id="header">
	<img src="Image/Home_Logo.png">
</div>
<br><br><br><br><br>
	<center>
	<ul class="ch-grid hidden-xs" >
		<li>
		<center>
			<div class="ch-item">				
				<div class="ch-info">
					<div class="ch-info-front ch-img-1">
					</div>
						
					<div class="ch-info-back">
						<a href="Login_Client.php"><h3>CLIENT<h3>
							</a>
					</div>
				</div>
			</div>
		</li>
	
		<li>
			<div class="ch-item" style="margin-left:60%">				
				<div class="ch-info">
					<div class="ch-info-front ch-img-2">
					</div>
					
					<div class="ch-info-back">							
						<a href="Login_ServiceProvider.php"><h3>SERVICE PROVIDER</h3></a>
					</div>
				</div>
			</div>
		</li>
		</center>
	</ul>
</body>
</html>