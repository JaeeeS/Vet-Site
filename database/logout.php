<?php
	session_start();
	if (!isset($_SESSION['username-login']) && !isset($_SESSION['password-login']))
	{session_destroy();
		header('location:../account.php');
	}
	else
	{
		session_destroy();
		echo "<script> alert('Log Out Successful!')</script>";
		header('location:../account.php');
	}
?>