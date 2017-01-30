<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <h3 style="text-align:left; margin-left:20px;">
          <i class="fa fa-plus"></i>  Add New Admin User
        </h3>
        <?php
          if(isset($_POST['user'])){
            function protect($field){
              $string=htmlentities($field,ENT_QUOTES);
              $string= mysql_real_escape_string(trim(strip_tags(addslashes($field))));
              return $string;
            }
            $matric = protect($_POST['matric']);
            $firstname = ucfirst($_POST['firstname']);
            $lastname = ucfirst($_POST['lastname']);
            $email = ucfirst($_POST['email']);
            $password = $_POST['password'];

            $query45 = "INSERT INTO user (matric,firstname,lastname,email,password,section)
              values ('$matric', '$firstname', '$lastname', '$email', '$password', 'Admin')";
            $result45 = mysql_query($query45) or die ("Couldn't execute query45");
            echo("<script>location.href = 'users.php';</script>");  
          }          
        ?>
        <form action="add_admin.php" method="POST" class="form-horizontal form-label-left input_mask">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Matric No
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control has-feedback-left" name="matric" id="inputSuccess2" placeholder="Matric No" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                First name
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control has-feedback-left" name="firstname" id="inputSuccess2" placeholder="First Name" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Last Name
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control has-feedback-left" name="lastname" id="inputSuccess2" placeholder="Last Name" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Email
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="email" class="form-control has-feedback-left" name="email" id="inputSuccess2" placeholder="Email" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Password
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="password" class="form-control has-feedback-left" name="password" placeholder="Password" id="inputSuccess2" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="users.php" class="btn btn-default">Cancel</a>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <button type="submit" name="user" class="btn btn-info"> <i class="fa fa-user"></i> Add </button>
              </div>
            </div>
        </form>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            