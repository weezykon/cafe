<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <div class="col-md-12">
            <table class="table table-striped" >
                <tr>
                    <th>  Name
                    </th>
                    <th> Matric No
                    </th>
                    <th> Wallet Amount
                    </th>
                    <th> Top Up
                    </th>
                </tr>
                <?php 
                    $query09 = "SELECT * FROM user";
                    $result09 = mysql_query($query09)
                    or die ("Couldn't execute query09.");
                    while ($row09 = mysql_fetch_array($result09,MYSQL_ASSOC))
                    {
                        $matric = $row09['matric'];
                        $query90 = "SELECT * FROM wallet WHERE matric = '$matric'";
                        $result90 = mysql_query($query90)
                        or die ("Couldn't execute query90.");
                        while ($row90 = mysql_fetch_array($result90,MYSQL_ASSOC))
                        {
                ?> 
                <tr>
                    <td><?php echo $row09['firstname'] .'  '. $row09['lastname']; ?></td>
                    <td><?php echo $row09['matric']; ?></td>
                    <td>NGN <?php echo $row90['amount']; ?></td>
                    <td><a href="top_up.php?matric=<?php echo $row90['matric']; ?>" class="btn btn-info"> <i class="fa fa-credit-card"></i> Top Up </a>
                    </td>
                </tr>
                <?php
                    } }
                ?>
            </table>
        </div>
      </div>

    </div>
  </div> 
<?php include("footer.inc.php"); ?>            