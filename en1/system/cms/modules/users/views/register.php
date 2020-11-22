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
				<h2>Welcome!</h2> 
				<ul class="customer-menu">
					<li>
						<a class="active" href="{{ url:site }}users/login">
							<i class="fa fa-lock" aria-hidden="true"></i>
							Account
						</a>
					</li>
				</ul> 
            </div>
            <div class="col-lg-9">
				<h2>Create your account</h2>
                <?php if ( ! empty($error_string)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error_string; ?>
                    </div>
                <?php endif ?>
				<?php echo form_open('register', array('id' => 'register')) ?>
	                <div class="row">
						<div class="col-lg-6">
							<label>E-mail <span>*</span></label>
							<input type="text" name="email" maxlength="100" value="<?php echo $_user->email ?>" />
							<?php echo form_input('d0ntf1llth1s1n', ' ', 'class="default-form" style="display:none"') ?>
						</div>
						<div class="col-lg-6">
							<label>Password <span>*</span></label>
							<input type="password" name="password" maxlength="100" />
						</div>
	                </div>

	                <div class="row">
						<?php foreach($profile_fields as $field) { if($field['required'] and $field['field_slug'] != 'display_name') { ?>
							<div class="col-lg-6">
								<label><?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?> <span>*</span></label>
								<?php echo $field['input'] ?>
							</div>
						<?php } } ?>
	                </div>	                

			        <!-- SUBMIT AREA -->
			        <div class="row">
			            <div class="col-lg-6"> 
			                <?php echo anchor('users/login','BACK TO LOGIN', 'class="btn-l-4"'); ?> 
			            </div>
			            <div class="col-lg-6"> 
			            	<?php echo form_submit('submit', 'REGISTER', 'class="btn-primary pull-right"'); ?>
			            </div>
			        </div> 
				<?php echo form_close() ?>
            </div>
        </div>
        <div class="divider"></div>

	
    </div>
</div>
