<?php include("header.inc.php"); ?>
<?php
	$matric = $_SESSION['matric'];
	$receipt = rand();

  	$query = "SELECT SUM(amount) FROM cart WHERE matric='$matric'"; 
  	$result = mysql_query($query) or die(mysql_error());
  	while($row = mysql_fetch_array($result))
  	{
      	$one = $row['SUM(amount)'];

	    $query90 = "SELECT * FROM wallet WHERE matric = '$matric'";
	    $result90 = mysql_query($query90)
	    or die ("Couldn't execute query90.");
	    while ($row90 = mysql_fetch_array($result90,MYSQL_ASSOC))
	    {  	
	    	$two = $row90['amount'];
	    	if ($two >= $one)
	    	{
	    		$three = $two - $one;

	    		$query56 = "UPDATE wallet SET  amount =  '$three' WHERE matric = '$matric'";
	            $result56 = mysql_query($query56)
	            or die ("Couldn't execute query56.");

	            $matric = $_SESSION['matric'];
				$query44 = "SELECT * FROM cart WHERE matric = '$matric'";
			    $result44 = mysql_query($query44)
			    or die ("Couldn't execute query44.");
			    while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
			    {
			    	$meal = $row44['meal'];
			    	$amount  = $row44['amount'];

			    	$query30 = "INSERT INTO meals_bought (matric, meal, amount, code)
			        VALUES ('$matric', '$meal', '$amount', '$receipt')";
			        $result30 = mysql_query($query30) or die ("Couldn't execute query30");

			        $query3 ="DELETE  FROM cart WHERE matric = '$matric'";
		    		$result3 = mysql_query($query3) or die('could not execute query3');


				    // header("Location: receipt.php?receipt=$receipt&&meal='mealid123$receipt'");
				    // redirect_to("receipt.php?receipt=$receipt&&meal='mealid123$receipt'");
        			echo("<script>location.href = 'receipt.php?receipt=$receipt&&meal=mealid123$receipt';</script>");

				}

	    	}elseif($two < $one)
	    	{
	    		// header("Location: update.php");
        			echo("<script>location.href = 'update.php';</script>");
	    	}
    	}
    }  
?>