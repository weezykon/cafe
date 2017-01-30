<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <h3 style="text-align:left; margin-left:20px;">Choose Meal
          <?php
              $user = $_SESSION['matric'];
              $query89 = "SELECT * FROM user WHERE matric = '$user' ";
              $result89 = mysql_query($query89)
              or die ("Couldn't execute query89.");
              while ($row89 = mysql_fetch_array($result89,MYSQL_ASSOC))
              {
                if ($row89['section'] == 'Admin') {
          ?>
          <a href="trashed_meals.php" class="btn btn-success"> <i class="fa fa-trash-o"></i>  Trashed Meals</a>
          <a href="add_meal.php" class="btn btn-success"> <i class="fa fa-plus"></i>  Add Meal</a>
          <?php
              }
            }
          ?>
        </h3>
        <?php  
            $query44 = "SELECT DISTINCT category FROM meals ";
            $result44 = mysql_query($query44)
            or die ("Couldn't execute query44.");
            while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
            {
        ?> 
            <div class="col-md-6 b-b b-r" style="border:none;">
              <a href="meal.php?category=<?php echo $row44['category']; ?>" class="block padder-v hover">
                <span class="i-s i-s-2x pull-left m-r-sm">
                  <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                  <i class="fa fa-coffee i-1x text-white"></i>
                </span>
                <span class="clear">
                  <span class="h3 block m-t-xs text-info"><?php echo $row44['category']; ?></span>
                </span>
              </a>
            </div>
        <?php
          }
        ?>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            