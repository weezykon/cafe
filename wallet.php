<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <div class="col-md-12">
          <form method='POST' action='https://voguepay.com/pay/'>

            <input type='hidden' name='v_merchant_id' value='demo' class="form-horizontal form-label-left input_mask"/>
            <input type='hidden' name='merchant_ref' value='234-567-890' />
            <input type='hidden' name='memo' value='Cuca E-Wallet' />

            <input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
            <input type='hidden' name='store_id' value='25' />

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-3 col-sm-3 col-xs-12">
                Input Amount
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type='number' id='amount' name='total' value='' placeholder="10000" required class="form-control"/>
              </div>
            </div>  
            <input type='submit' id='submitForm' style="margin-top:5px;display:none" class="btn btn-info" alt='Submit'  />

            <button type='button' id='topup' class="btn btn-info">Top Up</button>  
            <a href="index.php" class="btn btn-default">Cancel</a>  
          </form>
        </div>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            
<script>
  jQuery(document).ready(function(){
    $('#topup').click(function(){
      var total = $('#amount').val() ;
      var data = {'total':total}; 
      jQuery.ajax({
        'url':'wallet_add.php',
        'type':'POST',
        'dataType':'json',
        'data':data,
        success:function(response){
          $('#submitForm').click();
        },
        error:function(response){
          console.log(response);

        }
      })
    });
  })
</script>