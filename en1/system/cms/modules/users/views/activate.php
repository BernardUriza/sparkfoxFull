<div id="cart" class="shipping-area">

    <!-- BREADCRUMBS -->
    <div class="container-fluid breadcrumbs">
        <div class="container">
            <a href="{{ url:site }}">Home</a>
            <a>/</a>
            <a class="active">ACCOUNT</a>
        </div>
    </div>
    
    <br><br><br>

    <!-- CART RESUME + SHIPPING ADDRESS -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
				<h2>Registration Process</h2> 
				<ul class="customer-menu">
					<li>
						<a class="active" href="{{ url:site }}users/login">
							<i class="fa fa-user" aria-hidden="true"></i>
							Welcome
						</a>
					</li>
				</ul> 
            </div>
            <div class="col-lg-9">
				<h2>Enter your email and activation code (it was sent to you by email)</h2>
                <?php if(!empty($error_string)) {  ?>
                    <div class="alert alert-danger">
                        <?php echo $error_string ?>
                    </div>
                <?php } ?>

				<?php echo form_open('users/activate', 'id="activate-user"') ?>
                <div class="row">

					<div class="col-lg-4">
						<label>E-mail <span>*</span></label>
						<?php echo form_input('email', isset($_user['email']) ? escape_tags($_user['email']) : '', 'maxlength="40"');?>
					</div>

					<div class="col-lg-4">
						<label>Activation Code  <span>*</span></label>
						<?php echo form_input('activation_code', '', 'maxlength="40"');?>
					</div>
				
                </div>
				
            </div>
        </div>
        <div class="divider"></div>


         <!-- SUBMIT AREA -->
        <div class="row">
            <div class="col-lg-6"></div>

            <div class="col-lg-6">
                <?php echo form_submit('submit', 'ACTIVATE', 'class="btn-primary pull-right"'); ?>
            </div>
        </div>
        <br><br><br><br>
		<?php echo form_close() ?>
    </div>
</div>