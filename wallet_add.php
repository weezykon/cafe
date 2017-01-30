<?php include("connection.inc.php");
  session_start('cafe');

?>
         
<?php
  $amount = $_POST['total'];
  $matric = $_SESSION['matric'];
  $query90 = "SELECT * FROM wallet WHERE matric = '$matric'";
  $result90 = mysql_query($query90)
  or die ("Couldn't execute query90.");
  while ($row90 = mysql_fetch_array($result90,MYSQL_ASSOC))
  {
    if (isset($_POST['total'])) {
      $a = $row90['amount'];
      $b = $amount;

      $amount = $a + $b ;

      $query56 = "UPDATE wallet SET  amount =  '$amount' WHERE matric = '$matric'";
      $result56 = mysql_query($query56)
      or die ("Couldn't execute query56.");
    }
  } 


  print_r(json_encode("done"));

?>