<?php
  session_start('air');
?>  
<?php include("connection.inc.php"); ?>
<?php
  if (!isset($_SESSION['matric'])) {
  header ('Location: login.php');
 } 
  date_default_timezone_get();
?>
<?php include("date.inc.php"); ?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title>Welcome To Cette</title>
  <meta name="description" content="web app, meals, e-wallet" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
  <link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/>
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body onload="myFunction()" class="container" style="background-color:#fff;width: 1000px;margin: auto;">
<script>
  // function myFunction() {
  //     window.print();
  // }
</script>
  <section class="vbox">
    <header class="bg-info header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.php" class="navbar-brand">
          <!-- <img src="images/logo_white.png" class="m-r-sm" alt="scale"> -->
          <i class="fa fa-coffee"></i>
          <span class="hidden-nav-xs">Cette</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-grid"></i>
          </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="wallet.php">
                    <span class="m-b-xs block">
                      <i class="i i-mail i-2x text-primary-lt"></i>
                    </span>
                    <small class="text-muted">Wallet</small>
                  </a>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="meals.php">
                    <span class="m-b-xs block">
                      <i class="fa fa-coffee i-2x text-info-lt"></i>
                    </span>
                    <small class="text-muted">Menu</small>
                  </a>
                </div>
              </div>
              <?php
                  $username = $_SESSION['matric'];  
                  $query44 = "SELECT * FROM user WHERE matric = '$username'";
                  $result44 = mysql_query($query44)
                  or die ("Couldn't execute query44.");
                  while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
                  {
                    if($row44['section'] == 'Admin'){
              ?>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="users.php">
                    <span class="m-b-xs block">
                      <i class="fa fa-user i-2x text-info-lt"></i>
                    </span>
                    <small class="text-muted">Users</small>
                  </a>
                </div>
              </div>
              <?php
                  }
                }
              ?>
            </div>
          </section>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="hidden-xs">
            <?php
                $username = $_SESSION['matric'];  
                $query44 = "SELECT * FROM user WHERE matric = '$username'";
                $result44 = mysql_query($query44)
                or die ("Couldn't execute query44.");
                while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
                {
                  if($row44['section'] == 'Admin'){
            ?> 
          <a href="top_wallet.php" class="dropdown-toggle">
              Top Up Wallet
          </a>
            <?php
              } }
            ?>
        </li>
        <?php
            $username = $_SESSION['matric'];  
            $query22 = "SELECT * FROM cart WHERE matric = '$username'";
            $result22 = mysql_query($query22)
            or die ("Couldn't execute query22.");
            $cart = mysql_num_rows($result22);
        ?>
        <li class="hidden-xs">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-cart"></i>
            <span class="badge badge-sm up bg-info">
              <?php
                if ($cart == '0') {
                  echo '';
                }else{
                  echo $cart;
                } 
              ?>
            </span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>Your Orders</strong>
              </div>
              <div class="list-group-alt" id="cartsInner">
            <?php
                while ($row22 = mysql_fetch_array($result22,MYSQL_ASSOC))
                {
                  $meal  = $row22['meal'];
                  $query32 = "SELECT * FROM meals WHERE id = '$meal'";
                  $result32 = mysql_query($query32)
                  or die ("Couldn't execute query32.");
                  while ($row32 = mysql_fetch_array($result32,MYSQL_ASSOC))
                  {
            ?>  
                <a class="media list-group-item" style="display: block;">
                  <span class="pull-left thumb-sm text-center">
                    <i class="i i-cart fa-2x text-success"></i>
                  </span>
                  <span class="media-body block m-b-none">
                   <?php echo $row32['meal']; ?><br><small class="text-muted"><?php echo $row32['price']; ?></small>
                  </span>
                </a>
            <?php } } ?>
              </div>
              <div class="panel-footer text-sm">
                <?php
                  $matric = $_SESSION['matric'];
                  $query = "SELECT SUM(amount) FROM cart WHERE matric='$matric'"; 
                  $result = mysql_query($query) or die(mysql_error());
                  $cartcount = mysql_num_rows($result);
                  while($row = mysql_fetch_array($result)){
                      $one = $row['SUM(amount)'];
                  if (!empty($one)) {
                ?>
                <a class="pull-left">Total  #<?php echo $one; ?> </a>
                <a href="checkout.php" class="pull-right btn btn-info"><i class="fa fa-shopping-cart"></i>  Checkout</a>
                <?php
                    }
                  }
                ?>
              </div>
            </section>
          </section>
        </li>
        <?php
            $username = $_SESSION['matric'];  
            $query40 = "SELECT * FROM wallet WHERE matric = '$username'";
            $result40 = mysql_query($query40)
            or die ("Couldn't execute query40.");
            while ($row40 = mysql_fetch_array($result40,MYSQL_ASSOC))
            {
        ?> 
        <li class="hidden-xs">
          <a class="dropdown-toggle" >
            <i class="fa fa-credit-card"></i>
            <span class="badge badge-sm up bg-info"><?php echo $row40['amount']; ?></span>
          </a>
        </li>
        <?php
          }
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="images/default-avatar.png" alt="...">
            </span>
            <?php
                $username = $_SESSION['matric'];  
                $query44 = "SELECT * FROM user WHERE matric = '$username'";
                $result44 = mysql_query($query44)
                or die ("Couldn't execute query44.");
                while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
                {
            ?> 
            <?php echo $row44['firstname'] .'  '. $row44['lastname']; ?><b class="caret"></b>
            <?php
                }
            ?>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <!-- <li>
              <span class="arrow top"></span>
              <a href="settings.php">Settings</a>
            </li> -->
            <li>
              <a href="password.php">Change Password</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <section id="content">
          <section class="wrapper">
          <div class="m-b">