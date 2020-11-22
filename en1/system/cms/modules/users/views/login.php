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
							<i class="fa fa-user" aria-hidden="true"></i>
							Login
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





<!--
<h2 class="page-title" id="page_title"><?php echo lang('user:login_header') ?></h2>

<?php if (validation_errors()): ?>
<div class="error-box">
	<?php echo validation_errors();?>
</div>
<?php endif ?>

<?php echo form_open('users/login', array('id'=>'login'), array('redirect_to' => $redirect_to)) ?>
<ul>
	<li>
		<label for="email"><?php echo lang('global:email') ?></label>
		<?php echo form_input('email', $this->input->post('email') ? escape_tags($this->input->post('email')) : '')?>
	</li>
	<li>
		<label for="password"><?php echo lang('global:password') ?></label>
		<input type="password" id="password" name="password" maxlength="20" />
	</li>
	<li id="remember_me">
		<label><?php echo lang('user:remember') ?></label>
		<?php echo form_checkbox('remember', '1', false) ?>
	</li>
	<li class="form_buttons">
		<input type="submit" value="<?php echo lang('user:login_btn') ?>" name="btnLogin" /> <span class="register"> | <?php echo anchor('register', lang('user:register_btn'));?></span>
	</li>
	<li class="reset_pass">
		<?php echo anchor('users/reset_pass', lang('user:reset_password_link'));?>
	</li>
</ul>
<?php echo form_close() ?>
-->