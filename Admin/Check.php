<?php

	if(isset($_POST["submit"]))
	{
		$name=$_POST["c_name"];
		$email=$_POST["c_email"];
		$city=$_POST["c_city"];
		$contact=$_POST["c_contact_number"];
		$address=$_POST["c_address"];
		$password=$_POST["c_password"];
		
		$cn=mysql_connect("localhost","root","");
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
				$q=mysql_query("insert into admin values(NULL,'$name','$contact','$address','$email','$password','$city')");
				
				if($q)
				{
					session_start();
					$_SESSION['admin']=$email;
					echo "<script>alert('successfully Registered')</script>";
					header("Location:Admin_index.php");
				}
				else
				{
					echo "<script>alert('Unsuccessfull')</script>";
				}
			}
			else
			{
				mysql_error();
			}
		}
		else
		{
			mysql_error();
		}
	}

?>