<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <a href="add_admin.php" class="btn btn-info"><i class="fa fa-plus"></i> Add New Admin User</a>
      <div class="row">
        <?php
          $query44 = "SELECT * FROM user WHERE section = 'Admin'";
          $result44 = mysql_query($query44)
          or die ("Couldn't execute query44.");
          $num = mysql_num_rows($result44);
        ?>
        <h3 style="text-align:left; margin-left:20px;">
          <i class="fa fa-user"></i>  Admin <span class="badge"> <?php echo $num; ?></span>
        </h3>
        <div class="col-md-12" style="margin-bottom:20px;">
          <table class="table table-striped">
            <tr>
              <th>Matric No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Delete</th>
            </tr>
            <?php
              while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
              {
            ?>
            <tr>
              <td><?php echo $row44['matric']; ?></td>
              <td><?php echo $row44['firstname'] .'  '. $row44['lastname']; ?></td>
              <td><?php echo $row44['email']; ?></td>
              <td><a href="delete_user.php?user=<?php echo $row44['matric']; ?>" class="btn btn-success"><i class="fa fa-trash-o"></i> Delete User</a></td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
        <?php
          $query45 = "SELECT * FROM user WHERE section != 'Admin'";
          $result45 = mysql_query($query45)
          or die ("Couldn't execute query45.");
          $nu = mysql_num_rows($result45);
        ?>
        <h3 style="text-align:left; margin-left:20px;">
          <i class="fa fa-user"></i>  Normal User(s) <span class="badge"> <?php echo $nu; ?></span>
        </h3>
        <div class="col-md-12" style="margin-bottom:20px;">
          <table class="table table-striped">
            <tr>
              <th>Matric No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Delete</th>
            </tr>
            <?php
              while ($row45 = mysql_fetch_array($result45,MYSQL_ASSOC))
              {
            ?>
            <tr>
              <td><?php echo $row45['matric']; ?></td>
              <td><?php echo $row45['firstname'] .'  '. $row45['lastname']; ?></td>
              <td><?php echo $row45['email']; ?></td>
              <td><a href="delete_user.php?user=<?php echo $row45['matric']; ?>" class="btn btn-success"><i class="fa fa-trash-o"></i> Delete User</a></td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            