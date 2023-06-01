function show()
{
	document.getElementById('abc').style.display="block";
}
function div_hide()
{
	document.getElementById('abc').style.display = "none";
}

function showPassword() {
	document.getElementById('c_password').setAttribute("type", "text");
	document.getElementById('showpass').src = "Image/eye_icon_show.png";
}

function hidePassword() {
	document.getElementById('c_password').setAttribute("type", "password");
	document.getElementById('showpass').src = "Image/eye_icon_hide.png";
}