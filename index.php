<?php include("header.inc.php"); ?>
        <?php
            $username = $_SESSION['matric'];  
            $query44 = "SELECT * FROM user WHERE matric = '$username'";
            $result44 = mysql_query($query44)
            or die ("Couldn't execute query44.");
            while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
            { 
              $query40 = "SELECT * FROM wallet WHERE matric = '$username'";
              $result40 = mysql_query($query40)
              or die ("Couldn't execute query40.");
              while ($row40 = mysql_fetch_array($result40,MYSQL_ASSOC))
              {
        ?>
<span class="h3 font-thin">Howdy <?php echo $row44['firstname']; ?> !</span> 
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="col-md-6">
        <h3 style="background-color:#ccc; width:100%; padding:15px; color:#fff;">Profile Details</h3> 
            <h3> Name:  <?php echo $row44['firstname'] .'  '. $row44['lastname']; ?></h3>
            <h3> Matric No:  <?php echo $row44['matric']; ?></h3>
            <h3> Wallet <i class="fa fa-credit-card"></i> : NGN <span style="color:red;">#<?php echo $row40['amount']; ?></span></h3>
        <?php
          } }
        ?>  
      </div>
      <div class="col-md-6">
        <div class="col-md-6 b-b b-r" style="border:none;">
          <a href="wallet.php" class="block padder-v hover">
            <span class="i-s i-s-2x pull-left m-r-sm">
              <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
              <i class="i i-mail i-1x text-white"></i>
            </span>
            <span class="clear">
              <span class="h3 block m-t-xs text-info">Wallet</span>
            </span>
          </a>
        </div>
        <div class="col-md-6 b-b b-r" style="border:none;">
          <a href="meals.php" class="block padder-v hover">
            <span class="i-s i-s-2x pull-left m-r-sm">
              <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
              <i class="fa fa-coffee i-1x text-white"></i>
            </span>
            <span class="clear">
              <span class="h3 block m-t-xs text-info">Meals</span>
            </span>
          </a>
        </div>
        <?php
            $user = $_SESSION['matric'];
            $query89 = "SELECT * FROM user WHERE matric = '$user' ";
            $result89 = mysql_query($query89)
            or die ("Couldn't execute query89.");
            while ($row89 = mysql_fetch_array($result89,MYSQL_ASSOC))
            {
              if ($row89['section'] == 'Admin') {
        ?>
        <div class="col-md-6 b-b b-r" style="border:none;">
          <a href="add_meal.php" class="block padder-v hover">
            <span class="i-s i-s-2x pull-left m-r-sm">
              <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
              <i class="fa fa-plus i-1x text-white"></i>
            </span>
            <span class="clear">
              <span class="h3 block m-t-xs text-info">Add Meal</span>
            </span>
          </a>
        </div>
        <div class="col-md-6 b-b b-r" style="border:none;">
          <a href="add_admin.php" class="block padder-v hover">
            <span class="i-s i-s-2x pull-left m-r-sm">
              <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
              <i class="fa fa-user i-1x text-white"></i>
            </span>
            <span class="clear">
              <span class="h3 block m-t-xs text-info">Admin</span>
            </span>
          </a>
        </div>
        <?php
            }
          }
        ?>
        <h3 style="margin-top:10px;">History</h3>
        <div class="viewhistory" style="display:block; overflow: scroll; height:300px;">
          <?php  
              $matric = $_SESSION['matric'];
              $query44 = "SELECT * FROM meals_bought WHERE matric = '$matric'";
              $result44 = mysql_query($query44)
              or die ("Couldn't execute query44.");
              while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
              {
                $meal = $row44['meal'];
                $query50 = "SELECT * FROM meals WHERE id = '$meal'";
                $result50 = mysql_query($query50)
                or die ("Couldn't execute query50.");
                while ($row50 = mysql_fetch_array($result50,MYSQL_ASSOC))
                {
          ?> 
          <div class="col-md-12" style="margin:10px;">
              <div class="col-md-4">
                <img src="images/meals/<?php echo $row50['picture']; ?>" width="100px" class="img-responsive" style="height:100px !important; border:1px solid #ccc; border-radius:50px;" >
              </div>
              <div class="col-md-4">
                <h3><?php echo $row50['meal']; ?></h3>
              </div>
              <div class="col-md-4" style="padding-top:20px;">
                <?php echo datetime($row44['date']); ?>
              </div>
          </div>
          <?php
            } }
          ?>
        </div>
      </div>
    </div>
  </div>
<?php include("footer.inc.php"); ?>            