<?php include('header.inc.php'); ?>
<?php 
	$meal = $_GET['meal'];
	$category = $_GET['category'];
	
	$query49 = "UPDATE meals SET trash = 'YES' WHERE id = '$meal'";
    $result49 = mysql_query($query49) or die ("Couldn't execute query49");
	
	echo("<script>location.href = 'meal.php?category=$category';</script>");
	// header ('Location: meals.php');
?>