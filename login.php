<?php
    session_start("cafe");
    $week = new Datetime('+1 week');
    setcookie('key', 'value', $week->getTimestamp(), '/', null, null, true); 
    
    include "connection.inc.php";
?>
<?php
  if (isset($_SESSION['matric'])) {
  header ('Location: index.php');
 } 
?>
<?php include("date.inc.php"); ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Cette</title>
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
<body class="" style="background-image:url('images/meals/r5.jpg');">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html"><i class="fa fa-coffee"></i>  Cette</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Log In</strong>
        </header>
        <?php
            if(isset($_POST['submit'])){
              $matric = trim(stripslashes($_POST['matric_id']));
              $password = trim(md5(sha1($_POST['password'])));

              $sql1 = "Select * from user where `matric` = '$matric' and `password` = '$password'";
              $query = mysql_query($sql1) or die(mysql_error());
              $result = mysql_fetch_array($query);
              $count = mysql_num_rows($query);
              if ($count == 1) {
                  $_SESSION['matric'] = $result['matric'];
                  $_SESSION['email'] = $result['email'];
                  if (isset($_SESSION['matric'])) {
                      // header("location:index.php");
                      echo("<script>location.href = 'index.php';</script>");
                  }
              }
              else {
                  $error = "<div class='alert alert-warning alert-block'>
                              <button type='button' class='close' data-dismiss='alert'>×</button>
                              <h4><i class='fa fa-bell-alt'></i>Oops!</h4>
                              <p>Matric No and Password Mismatch!!</p>
                            </div>";
                  echo $error;
              }
            }

        ?>
        <form action="login.php" method="post">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" name="matric_id" placeholder="Matric No" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
               <input type="password" name="password" placeholder="Password" class="form-control no-border" required>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Sign in</button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center" style="color:#fff;"><small>Do not have an account with us?</small> </p>
          <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a>
        </form>
      </section>
    </div>
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