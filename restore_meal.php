<?php include('header.inc.php'); ?>
<?php 
	$meal = $_GET['food'];
	
	$query49 = "UPDATE meals SET trash = 'NO' WHERE id = '$meal'";
    $result49 = mysql_query($query49) or die ("Couldn't execute query49");
	
	echo("<script>location.href = 'trashed_meals.php';</script>");
	// header ('Location: meals.php');
?>