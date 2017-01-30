<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <h3 style="text-align:left; margin-left:20px;">
          <i class="fa fa-cog"></i>  Change Password
        </h3>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <?php
            if(isset($_POST['pass']))
            {
              $user = $_SESSION['matric'];
              $query44 = "SELECT * FROM user WHERE matric = '$user'";
              $result44 = mysql_query($query44)
              or die ("Couldn't execute query44.");
              while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
              {
                $old = $row44['password'];
                $current = trim(md5(sha1($_POST['current'])));
                $new = trim(md5(sha1($_POST['password'])));

                if ($old == $current) {
                  $query30 = "UPDATE user SET password = '$new' WHERE matric = '$user'";
                  $result30 = mysql_query($query30) or die ("Couldn't execute query30");
                  echo "<div class ='alert alert-success'>Password Changed.</div>";
                }else{
                  echo "<div class ='alert alert-danger'>Password Typed Does Not Match Your Current Password.</div>";
                }
              }
            }          
          ?>
        </div>
        <form action="password.php" method="POST" class="form-horizontal form-label-left input_mask">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Current Password
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="password" class="form-control has-feedback-left" name="current" id="inputSuccess2" placeholder="Current Password" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                New Password
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="password" class="form-control has-feedback-left" name="password" id="inputSuccess2" placeholder="New Password" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="index.php" class="btn btn-default"><i class="fa fa-home"></i> Home</a>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <button type="submit" name="pass" class="btn btn-info"> <i class="fa fa-cog"></i> Change Password</button>
              </div>
            </div>
        </form>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            