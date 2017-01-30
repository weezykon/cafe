<?php
    session_start("cafe");
    $week = new Datetime('+1 week');
    setcookie('key', 'value', $week->getTimestamp(), '/', null, null, true); 
    
    include "connection.inc.php";
?>
<?php
  if (isset($_SESSION['username'])) {
  header ('Location: index.php');
 } 
?>
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
              $email = trim(stripslashes(mysql_escape_string($_POST['email'])));
              $password = trim(md5(sha1($_POST['password'])));
              $firstname = trim(stripslashes(mysql_escape_string($_POST['firstname'])));
              $lastname = trim(stripslashes(mysql_escape_string($_POST['lastname'])));
              $matric = trim(stripslashes(mysql_escape_string($_POST['matric'])));

              $sql1 = "Select * from user where `matric` = '$matric' OR `email` = '$email'";
              $query = mysql_query($sql1) or die(mysql_error());
              $result = mysql_fetch_array($query);
              $count = mysql_num_rows($query);
              if ($count == 0) {
                  $query60 = "INSERT INTO user (firstname,lastname,matric,email,password)
                    values
                      ('$firstname','$lastname','$matric','$email','$password')";
                    $result60 = mysql_query($query60) or die ("Couldn't execute query60");

                    $query60 = "INSERT INTO wallet (matric,amount)
                    values
                      ('$matric','000')";
                    $result60 = mysql_query($query60) or die ("Couldn't execute query60");
                              
                    $_SESSION['matric'] = $matric;
                    // header ('Location: wallet.php');
                    echo("<script>location.href = 'wallet.php';</script>");
                    // redirect_to("wallet.php");
                  }
              else {
                  $error = "<div class='alert alert-warning alert-block'>
                              <button type='button' class='close' data-dismiss='alert'>×</button>
                              <h4><i class='fa fa-bell-alt'></i>Oops!</h4>
                              <p>Already A Member!</p>
                            </div>";
                  echo $error;
              }
            }
        ?>
        <form action="signup.php" method="post">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" name="firstname" placeholder="Firstname" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
              <input type="text" name="lastname" placeholder="Lastname" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
              <input type="email" name="email" placeholder="Email" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
              <input type="text" name="matric" placeholder="Matric No" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
               <input type="password" name="password" placeholder="Password" class="form-control no-border" required>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Sign Up</button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center" style="color:#fff;"><small>Already a member</small> </p>
          <a href="login.php" class="btn btn-lg btn-default btn-block">Log In</a>
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