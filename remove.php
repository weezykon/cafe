<?php include("header.inc.php"); ?>
<?php
	$meal = $_GET['meal'];

	$query3 ="DELETE  FROM cart WHERE id='$meal'";
    $result3 = mysql_query($query3) or die('could not execute query3');
    // header("Location: checkout.php");
    // redirect_to("checkout.php");
	echo("<script>location.href = 'checkout.php';</script>");
?>