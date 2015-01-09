<?php
	session_start();
		unset($_SESSION['adminAllowed']);
		unset($_SESSION['AdminId']);
		unset($_SESSION['AdminName']);
		unset($_SESSION);
	session_destroy();
	header("Location: signup.php");
	exit();
?>