
<?php include("date.inc.php"); ?>
<?php
session_start('cafe');
if(session_destroy())
{
	// header("Location:login.php");
	echo("<script>location.href = 'login.php';</script>");
	// redirect_to("login.php");
}
?>