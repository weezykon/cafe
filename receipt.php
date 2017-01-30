<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row" style="padding:20px;">
      	<div class="col-md-2" ></div>
      	<div class="col-md-8" style=" padding:20px;">
      		<h3>Thanks For Shopping With Us!</h3>
      		<a href="meals.php" class="btn btn-info"> Continue Shopping</a> <a target="new" href="print_order.php?code=<?php echo $_GET['receipt']; ?>" class="btn btn-info"> <i class="fa fa-print"></i> Print Receipt</a>
      	</div>
      	<div class="col-md-2" ></div>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            