<?php
	
	session_start();

	$recid=$_POST["rcid"];
	$p_date=$_POST["pdate"];	
	echo "<center><img src='Image\Icon.jpg'>";
?>
<html>
<head>
<style type="text/css">

input[type=submit]
{
	width:20%;
	text-align:center;
	display:block;
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-radius:5px;
	font-family:"segoe ui";
}

</style>
</head>
<body>
<form method="POST" action="P_Done.php">

<input type="hidden" id="record" name="record" value="<?PHP echo $recid; ?>" />
<input type="hidden" id="datep" name="datep" value="<?PHP echo $p_date; ?>" />
<input type="submit" name="updatep" value="Payment Done" />
</form>
</body>
</html>
