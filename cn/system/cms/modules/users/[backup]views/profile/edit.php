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
						<a <?php echo ($current == 'profile') ? 'class="active"' : ''; ?> href="{{ url:site }}users/edit">
							<i class="fa fa-user" aria-hidden="true"></i>
							My Profile
						</a>
					</li>
				    <li>
				    	<a <?php echo ($current == 'orders') ? 'class="active"' : ''; ?> href="{{ url:site }}store/customer/orders">
				    		<i class="fa fa-truck" aria-hidden="true"></i>
				    		My Orders
				    	</a>
				    </li>
				    <li>
				    	<a <?php echo ($current == 'addresses') ? 'class="active"' : ''; ?> href="{{ url:site }}store/customer/addresses">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
				    		My Addresses
				    	</a>
				    </li>
				    <!--li><?php echo anchor('store/customer/wishlist', lang('store:wishlist_title')); ?></li-->
				</ul> 
            </div>
            <div class="col-lg-9">
				<h2><?php echo ($this->current_user->id !== $_user->id) ? sprintf(lang('user:edit_title'), $_user->display_name) : lang('profile_edit') ?></h2>
            </div>
        </div>

        <div class="divider"></div>
    </div>
</div>









<div>
	<?php if (validation_errors()):?>
	<div class="error-box">
		<?php echo validation_errors();?>
	</div>
	<?php endif;?>

	<?php echo form_open_multipart('', array('id'=>'user_edit'));?>

	<fieldset id="profile_fields">
		<legend><?php echo lang('user:details_section') ?></legend>
		<ul>
			<li>
				<label for="display_name"><?php echo lang('profile_display_name') ?></label>
				<div class="input">
				<?php echo form_input(array('name' => 'display_name', 'id' => 'display_name', 'value' => set_value('display_name', $display_name))) ?>
				</div>
			</li>

			<?php foreach($profile_fields as $field): ?>
				<?php if($field['input']): ?>
					<li>
						<label for="<?php echo $field['field_slug'] ?>">
							<?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?>
							<?php if ($field['required']) echo '<span>*</span>' ?>
						</label>

						<?php if($field['instructions']) echo '<p class="instructions">'.$field['instructions'].'</p>' ?>
						
						<div class="input">
							<?php echo $field['input'] ?>
						</div>
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	</fieldset>

	<fieldset id="user_names">
		<legend><?php echo lang('global:email') ?></legend>
		<ul>
			<li>
				<label for="email"><?php echo lang('global:email') ?></label>
				<div class="input">
					<?php echo form_input('email', $_user->email) ?>
				</div>
			</li>
		</ul>
	</fieldset>

	<fieldset id="user_password">
		<legend><?php echo lang('user:password_section') ?></legend>
		<ul>
			<li class="float-left spacer-right">
				<label for="password"><?php echo lang('global:password') ?></label><br/>
				<?php echo form_password('password', '', 'autocomplete="off"') ?>
			</li>
		</ul>
	</fieldset>

	<?php if (Settings::get('api_enabled') and Settings::get('api_user_keys')): ?>
		
	<script>
	jQuery(function($) {
		
		$('input#generate_api_key').click(function(){
			
			var url = "<?php echo site_url('api/ajax/generate_key') ?>",
				$button = $(this);
			
			$.post(url, function(data) {
				$button.prop('disabled', true);
				$('span#api_key').text(data.api_key).parent('li').show();
			}, 'json');
			
		});
		
	});
	</script>
		
	<fieldset>
		<legend><?php echo lang('profile_api_section') ?></legend>
		
		<ul>
			<li <?php $api_key or print('style="display:none"') ?>><?php echo sprintf(lang('api:key_message'), '<span id="api_key">'.$api_key.'</span>') ?></li>
			<li>
				<input type="button" id="generate_api_key" value="<?php echo lang('api:generate_key') ?>" />
			</li>
		</ul>
	
	</fieldset>
	<?php endif ?>

	<?php echo form_submit('', lang('profile_save_btn')) ?>
	<?php echo form_close() ?>
</div>