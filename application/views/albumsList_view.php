
<div class="container" style="margin-top: 20px" >
		<div class="row row-cols-1 row-cols-md-3" id="cardGroup">		
			
		</div>

	
</div>

<?php /**
 * modal to pay
 */ ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proced to checkput</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="payment-form" method="post"  >
		  <div id="card-element">
		    <!-- Elements will create input elements here -->
		    <div class="form-group">
								<label class="control-label col-md-3">Card Number</label>
								<input type="text" size="20" autocomplete="off" name="cardnumber" value="4242424242424242"  />
							</div>							
							<div class="form-group">
								<label class="control-label col-md-3">Expiration (MM/YYYY)</label>
								<input type="text" size="2" name="expirymonth" value="8" />
								<span> / </span>
								<input type="text" size="4" name="expiryyear" value="2018" />
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Product ID</label>							
								<input type="text" id="productId" name="productId" readonly="readonly" /><br>
								<label class="control-label col-md-3">Amount</label>							
								<input type="text" size="4" id="amount" name="amount" />
							</div>
		  </div>

		  <!-- We'll put the error messages in this element -->
		  <div id="card-errors" role="alert"></div>

		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pay</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="<?= base_url() ?>assets/js/API.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>
