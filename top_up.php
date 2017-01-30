<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <div class="col-md-12">
          <?php
            $matric = $_GET['matric'];
            $query90 = "SELECT * FROM wallet WHERE matric = '$matric'";
            $result90 = mysql_query($query90)
            or die ("Couldn't execute query90.");
            while ($row90 = mysql_fetch_array($result90,MYSQL_ASSOC))
            {
              if (isset($_POST['wallet'])) {
                $matric = $_GET['matric'];
                $a = $row90['amount'];
                $b = $_POST['amount'];

                $amount = $a + $b ;

                $query56 = "UPDATE wallet SET  amount =  '$amount' WHERE matric = '$matric'";
                $result56 = mysql_query($query56)
                or die ("Couldn't execute query56.");
                // header("Location: top_wallet.php");
                echo("<script>location.href = 'top_wallet.php';</script>");
                // redirect_to("top_wallet.php");
              }
            } 
          ?>
            <form action="top_up.php?matric=<?php echo $_GET['matric']; ?>" method="post" class="form-horizontal form-label-left input_mask">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input type="number" class="form-control has-feedback-left" name="amount" id="inputSuccess2" placeholder="Amount">
                    <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="top_wallet.php" class="btn btn-default">Cancel</a>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <button type="submit" name="wallet" class="btn btn-info"> <i class="fa fa-arrow-up"></i> Top</button>
                  </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            