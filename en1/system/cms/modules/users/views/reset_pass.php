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
				<h2>Password Reset</h2> 
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
				<h2>Enter your credentials</h2>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>


				<?php if(empty($success_string)): ?>
					<?php echo form_open('users/reset_pass', array('id'=>'reset-pass')) ?>
		                <div class="row">
							<div class="col-lg-6">
								<label>Enter your email address or username <span>*</span></label>
								<input type="text" name="email" maxlength="100" value="<?php echo set_value('email') ?>" />
							</div>
							<div class="col-lg-6">
								<label>&nbsp;</label>
								<?php echo form_submit('submit', 'RESET PASSWORD', 'class="btn-primary pull-right"'); ?>	
							</div>
		                </div>

				        <!-- SUBMIT AREA -->
				        <div class="row">
				            <div class="col-lg-12"> 
				                <?php echo anchor('users/login','BACK TO LOGIN', 'class="btn-l-4"'); ?> 
				                OR
				                <?php echo anchor('users/register','REGISTER', 'class="btn-secondary"'); ?> 
				            </div>
				        </div> 
					<?php echo form_close() ?>
			    <?php else: ?>
                    <div class="alert alert-success">
                        <?php echo $success_string; ?>
                    </div>
				<?php endif ?>
            </div>
        </div>
        <div class="divider"></div>

	
    </div>
</div>







<!--
<h2 class="page-title"><?php echo lang('user:reset_password_title');?></h2>

<?php if(!empty($error_string)):?>
	<div class="error-box">
		<?php echo $error_string;?>
	</div>
<?php endif;?>

<?php if(!empty($success_string)): ?>
	<div class="success-box">
		<?php echo $success_string ?>
	</div>
<?php else: ?>
	
	<?php echo form_open('users/reset_pass', array('id'=>'reset-pass')) ?>

	<label for="email"><?php echo lang('user:reset_instructions') ?></label>
	<input type="text" name="email" maxlength="100" value="<?php echo set_value('email') ?>" />

	<?php echo form_submit('', lang('user:reset_pass_btn')) ?>

	<?php echo form_close() ?>
	
<?php endif ?>
-->