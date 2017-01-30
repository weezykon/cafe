<?php include("connection.inc.php"); ?>
<?php
  session_start('air');
  if (!isset($_SESSION['matric'])) {
  header ('Location: login.php');
 } 
  date_default_timezone_get();
?>
<?php include("date.inc.php"); ?>
<script>
  function myFunction() {
      window.print();
  }
</script> 
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Cette</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" /> 
</head>
<body onload="myFunction()" style="background-color:#fff;">
  <section class="vbox">
    <section>
      <section class="hbox stretch">
        <section id="content">
          <section class="vbox">          
              <div style="width:350px; height:550px; padding:10px; margin:auto; margin-top:40px;">
                <div class="col-md-12" style="margin-top:10px; padding-right:50px;">
                  <span class="pull-right" style="font-size:20px;"><i class="fa fa-coffee"></i> CETTE</span>
                </div>
                <div class="col-md-12">
                  <div class="col-md-6" style="border-bottom:1px solid #ccc; font-size:20px;">
                    Invoice
                  </div>
                </div>  
                <div class="col-md-12" style="margin-top:20px;">
                  Invoice No : <?php echo $_GET['code']; ?>
                </div>
                <div class="col-md-12" style="margin-top:5px;">
                  Invoice Date : <?php echo dates(date('Y-m-d')); ?>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; margin-top:20px;">
                  <b>Customer Details</b>
                </div>
                <div class="col-md-12" style="margin-top:5px;">
                  Name: <?php
                          $username = $_SESSION['matric'];  
                          $query44 = "SELECT * FROM user WHERE matric = '$username'";
                          $result44 = mysql_query($query44)
                          or die ("Couldn't execute query44.");
                          while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
                          {
                            echo $row44['firstname'] .' '. $row44['lastname'];  
                          }
                        ?> 
                </div>
                <div class="col-md-12" style="margin-top:5px;">
                  Matric No : <?php echo $_SESSION['matric']; ?>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; margin-top:20px;">
                  <b>Your Order(s)</b>
                </div>
                <?php
                  $username = $_SESSION['matric'];  
                  $code = $_GET['code'];
                  $query57 = "SELECT * FROM meals_bought WHERE matric = '$username' and code = '$code'";
                  $result57 = mysql_query($query57)
                  or die ("Couldn't execute query57.");
                  $coder = mysql_num_rows($result57);
                  if ($coder == '0') {
                    header("Location: meals.php");
                  }
                  while ($row57 = mysql_fetch_array($result57,MYSQL_ASSOC))
                  {
                    $meal = $row57['meal'];
                    $query79 = "SELECT * FROM meals WHERE id = '$meal'";
                    $result79 = mysql_query($query79)
                    or die ("Couldn't execute query79.");
                    while ($row79 = mysql_fetch_array($result79,MYSQL_ASSOC))
                    {
                ?>
                <div class="col-md-12" style="margin-top:5px;">
                  <div class="col-md-6">
                    <?php echo $row79['meal']; ?>
                  </div>
                  <div class="col-md-6" style="text-align:right;">
                    <?php echo '#' .''. $row57['amount']; ?>
                  </div>
                </div>
                <?php
                    }
                  }
                ?>
                <div class="col-md-12" style="border-bottom:1px solid #000; border-top:1px solid #000; padding:10px; padding-right:30px; text-align:right; margin-top:20px;">
                  <?php
                    $query = "SELECT SUM(amount) FROM meals_bought WHERE matric='$username' and code = '$code'"; 
                    $result = mysql_query($query) or die(mysql_error());
                    while($row = mysql_fetch_array($result))
                    {
                        $one = $row['SUM(amount)'];
                        echo '<b>Total</b>' .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. '#' .''. $one;
                    }    
                  ?>
                </div>
              </div>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
</html>