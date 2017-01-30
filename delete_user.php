<?php include('header.inc.php'); ?>
<?php 
	$matric = $_GET['user'];

	// Cart .....
	$query44 = "SELECT * FROM cart WHERE matric = '$matric'";
    $result44 = mysql_query($query44)
    or die ("Couldn't execute query44.");
    while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
    {
        $query3 ="DELETE  FROM cart WHERE matric = '$matric'";
		$result3 = mysql_query($query3) or die('could not execute query3');
	}

	// Wallet .....
	$query44 = "SELECT * FROM wallet WHERE matric = '$matric'";
    $result44 = mysql_query($query44)
    or die ("Couldn't execute query44.");
    while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
    {
        $query3 ="DELETE  FROM wallet WHERE matric = '$matric'";
		$result3 = mysql_query($query3) or die('could not execute query3');
	}

	// Meals Bought .....
	$query44 = "SELECT * FROM meals_bought WHERE matric = '$matric'";
    $result44 = mysql_query($query44)
    or die ("Couldn't execute query44.");
    while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
    {
        $query3 ="DELETE  FROM meals_bought WHERE matric = '$matric'";
		$result3 = mysql_query($query3) or die('could not execute query3');
	}

	// Main User Account ....
    $query3 ="DELETE  FROM user WHERE matric = '$matric'";
	$result3 = mysql_query($query3) or die('could not execute query3');

	echo("<script>location.href = 'users.php';</script>");
?>