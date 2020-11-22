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
				<h2>Customer Options</h2> 
				<ul class="customer-menu">
					<li>
						<a class="active" href="{{ url:site }}users/edit">
							<i class="fa fa-user" aria-hidden="true"></i>
							My Profile
						</a>
					</li>
				    <li>
				    	<a href="{{ url:site }}store/customer/orders">
				    		<i class="fa fa-truck" aria-hidden="true"></i>
				    		My Orders
				    	</a>
				    </li>
				    <li>
				    	<a href="{{ url:site }}store/customer/addresses">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
				    		My Addresses
				    	</a>
				    </li>
				</ul> 
            </div>
            <div class="col-lg-9">
				<h2><?php echo ($this->current_user->id !== $_user->id) ? sprintf(lang('user:edit_title'), $_user->display_name) : lang('profile_edit') ?></h2>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>

				<?php echo form_open_multipart('', array('id'=>'user_edit'));?>
                <div class="row">

					<div class="col-lg-4">
						<label>Display Name <span>*</span></label>
						<?php echo form_input(array('name' => 'display_name', 'id' => 'display_name', 'value' => set_value('display_name', $display_name))) ?>
					</div>

                	<?php foreach($profile_fields as $field): ?>
                		<?php if($field['input']): ?>
		                    <div class="col-lg-4">
		                        <label>
		                        	<?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?>
		                        	<?php echo ($field['required']) ? '<span>*</span>' : '(optional)'; ?>
		                        </label>
		                       	<?php echo $field['input'] ?>
		                    </div>    
						<?php endif ?>
					<?php endforeach ?>  


					<div class="col-lg-4">
						<label>E-mail  <span>*</span></label>
						<?php echo form_input('email', $_user->email) ?>
					</div>
				
                </div>

				<h2>Password</h2> 
                <div class="row">
                	
					<div class="col-lg-4">
						<label>Only if you want to change your password:</label>
						<?php echo form_password('password', '', 'autocomplete="off" placeholder="Set new password:"') ?>
					</div>	                	
                </div>

				
            </div>
        </div>
        <div class="divider"></div>


         <!-- SUBMIT AREA -->
        <div class="row">
            <div class="col-lg-6"> 
                <?php //echo anchor('store/cart/','BACK TO SHOPPING CART', 'class="btn-secondary"'); ?> 
            </div>

            <div class="col-lg-6">
                <?php echo form_submit('submit', 'CONTINUE', 'class="btn-primary pull-right"'); ?>
            </div>
        </div>
        <br><br><br><br>
		<?php echo form_close() ?>
    </div>
</div>