<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <a href="meals.php" class="btn btn-info" style="margin-left:10px;"> <i class="i i-cart"></i> Continue Shopping</a>
        <h3 style="text-align:center;">Checkout List</h3>
        <?php  
            $matric = $_SESSION['matric'];
            $query44 = "SELECT * FROM cart WHERE matric = '$matric'";
            $result44 = mysql_query($query44)
            or die ("Couldn't execute query44.");
            $checkout = mysql_num_rows($result44);
            if ($checkout == '0') {
                echo "<h3 style='text-align:center;'>Your Cart Is Empty</h3>";
            }
            while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
            {
                $meal = $row44['meal'];
                $query50 = "SELECT * FROM meals WHERE id = '$meal'";
                $result50 = mysql_query($query50)
                or die ("Couldn't execute query50.");
                while ($row50 = mysql_fetch_array($result50,MYSQL_ASSOC))
                {
        ?> 
        <div class="col-md-8" style="margin-left:60px; margin-bottom:20px;">
            <div class="col-md-3">
                <img src="images/meals/<?php echo $row50['picture'] ?>" width="100px" class="img-responsive" style="height:100px !important; border:1px solid #ccc; border-radius:50px;" >
            </div>
            <div class="col-md-3">
                <h4><?php echo $row50['meal']; ?></h4> NGN <?php echo $row50['price']; ?>
            </div>
            <div class="col-md-2">
                <a href="remove.php?meal=<?php echo $row44['id']; ?>" class="btn btn-info" onclick="return confirm('Are You Sure?')" > <i  class="fa fa-trash-o"></i>  Remove</a>
            </div>
        </div>
        <?php
            }
          }
        ?>
        <div class="col-md-8" style="margin-left:60px;">
            <?php
              $matric = $_SESSION['matric'];
              $query = "SELECT SUM(amount) FROM cart WHERE matric='$matric'"; 
              $result = mysql_query($query) or die(mysql_error());
              $cartcount = mysql_num_rows($result);
              while($row = mysql_fetch_array($result)){
                  $one = $row['SUM(amount)'];
              if (!empty($one)) {
            ?>
            <a class="pull-left"><b><h4>Total  #<?php echo $one; ?></h4></b> </a>
            <a href="final_checkout.php" style="margin-left:50px;" class="btn btn-info"><i class="fa fa-shopping-cart"></i>  Checkout</a>
            <?php
                }
              }
            ?>
        </div>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            