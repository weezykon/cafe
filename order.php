<?php include("header.inc.php"); ?>
<?php
	$meal = $_GET['food'];
	$query44 = "SELECT * FROM meals WHERE id = '$meal'";
    $result44 = mysql_query($query44)
    or die ("Couldn't execute query44.");
    while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
    {
    	$amount  = $row44['price'];
    	$matric = $_SESSION['matric'];
    	$meal = $_GET['food'];
        $category = $_GET['category'];

    	$query30 = "INSERT INTO cart (matric, meal, amount)
        VALUES ('$matric', '$meal', '$amount')";
        $result30 = mysql_query($query30) or die ("Couldn't execute query30");
	    // header("Location: meal.php?category=$category");
        // redirect_to("meal.php?category=$category");
        echo("<script>location.href = 'meal.php?category=$category';</script>");
	}
?>