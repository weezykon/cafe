<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <?php
          $user = $_SESSION['matric'];
          $query89 = "SELECT * FROM user WHERE matric = '$user' ";
          $result89 = mysql_query($query89)
          or die ("Couldn't execute query89.");
          while ($row89 = mysql_fetch_array($result89,MYSQL_ASSOC))
          {
            if ($row89['section'] == 'Admin') {
      ?>
        <a href="meals.php" class="btn btn-success"> <i class="fa fa-hand-o-left"></i>  Back to Meals Menu</a>
        <a href="trashed_meals.php" class="btn btn-info"> <i class="fa fa-trash-o"></i>  Trashed Meals</a>
      <?php
          }
        }
      ?>  
      <div class="row" style="padding:20px;">
        <?php  
            $category = $_GET['category'];
            $query44 = "SELECT * FROM meals WHERE category = '$category' and trash != 'YES'";
            $result44 = mysql_query($query44)
            or die ("Couldn't execute query44.");
            $cate = mysql_num_rows($result44);
            if ($cate == '0' ) {
                // header("Location: meals.php");
                echo "<h3>Empty</h3>";
            }
            while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
            {
        ?> 
        <div class="col-lg-4">
          <section class="panel panel-default">
            <div class="panel-body">
              <div class="clearfix text-center m-t">
                <div class="inline">
                      <!-- <img src="images/a5.png" class="img-circle"> -->
                    <img src="images/meals/<?php echo $row44['picture']; ?>" width="200" height="200" class="img-circle" style="background-size:cover;" >                      
              </div>
            </div>
            <footer class="panel-footer bg-info text-center" style="margin-top:20px;">
              <div class="row pull-out">
                <div class="col-xs-4">
                  <div class="padder-v">
                    <?php
                        $user = $_SESSION['matric'];
                        $query89 = "SELECT * FROM user WHERE matric = '$user' ";
                        $result89 = mysql_query($query89)
                        or die ("Couldn't execute query89.");
                        while ($row89 = mysql_fetch_array($result89,MYSQL_ASSOC))
                        {
                          if ($row89['section'] == 'Admin') {
                    ?>
                    <span class="m-b-xs h3 block text-white">
                      <a href="edit_meal.php?food=<?php echo $row44['id']; ?>" class="btn btn-info" style="padding:3px 8px"><i class="i i-pencil"></i></a>
                    </span>
                    <small class="text-muted">
                      <a href="delete_meal.php?meal=<?php echo $row44['id']; ?>&&category=<?php echo $_GET['category']; ?>" class="btn btn-info" style="padding:3px 8px"><i class="fa fa-trash-o"></i></a>
                    </small>
                    <?php        
                        }else{
                    ?>      
                    <span class="m-b-xs h3 block text-white">
                      
                    </span>
                    <small class="text-muted"></small>
                    <?php      
                      }
                      }
                    ?> 
                  </div>
                </div>
                <div class="col-xs-4 dk">
                  <div class="padder-v">
                    <span class="m-b-xs h3 block text-white"></span>
                    <small class="text-muted"><?php  echo $row44['meal']; ?></small>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="padder-v">
                    <span class="m-b-xs h3 block text-white">
                        <a href="order.php?food=<?php echo $row44['id']; ?>&&category=<?php echo $_GET['category']; ?>" class="btn btn-info" style="padding:3px 8px"><i class="i i-cart"></i></a>
                    </span>
                    <small class="text-muted">NGN <?php echo $row44['price']; ?></small>
                  </div>
                </div>
              </div>
            </footer>
          </section>
        </div>
        <?php
          }
        ?>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            