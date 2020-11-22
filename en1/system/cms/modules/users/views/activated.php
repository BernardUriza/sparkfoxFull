<div id="cart" class="shipping-area">

    <!-- BREADCRUMBS -->
    <div class="container-fluid breadcrumbs">
        <div class="container">
            <a href="{{ url:site }}">Home</a>
            <a>/</a>
            <a class="active">MY ORDERS</a>
        </div>
    </div>
    
    <br><br><br>

    <!-- CART RESUME + SHIPPING ADDRESS -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
				<h2>Login</h2> 
				<ul class="customer-menu">
					<li>
						<a class="active" href="{{ url:site }}users/login">
							<i class="fa fa-user" aria-hidden="true"></i>
							Login
						</a>
					</li>
				</ul> 
            </div>
            <div class="col-lg-9">
				<h2>Your account has been activated, you can now log in to your account.</h2>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>

				<?php echo form_open('users/login', array('id'=>'login'), array('redirect_to' => $redirect_to)) ?>
                <div class="row">

					<div class="col-lg-4">
						<label>E-mail <span>*</span></label>
						<?php echo form_input('email', $this->input->post('email') ? escape_tags($this->input->post('email')) : '')?>
					</div>

					<div class="col-lg-4">
						<label>Password  <span>*</span></label>
						<input type="password" id="password" name="password" maxlength="20" />
					</div>
				
                </div>
				
            </div>
        </div>
        <div class="divider"></div>


         <!-- SUBMIT AREA -->
        <div class="row">
            <div class="col-lg-6"> 
                <?php echo anchor('users/reset_pass','I FORGOT MY PASSWORD', 'class="btn-l-4"'); ?> 
            </div>

            <div class="col-lg-6">
                <?php echo form_submit('submit', 'LOGIN', 'class="btn-primary pull-right"'); ?>
            </div>
        </div>
        <br><br><br><br>
		<?php echo form_close() ?>
    </div>
</div>