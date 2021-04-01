<?php include_once('header.php'); ?>

<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-md-6">
			<h3>Registration Form</h3>

			<?php if($not_registered = $this->session->flashdata('user_not_added')): ?>
				<div class="row mx-50">
					<div class="alert alert-danger">
						<?php echo $not_registered; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php echo form_open('register/sendemail'); ?>
			<div class="form-group">
		    <label for="email">Username:</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter username','name'=>'username', 'value'=>set_value("username")]); ?> 
		  </div>
		  <?php echo form_error('username'); ?>
			<div class="form-group">
		    <label for="email">Name:</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter name','name'=>'name', 'value'=>set_value("name")]); ?> 
		  </div>
		  <?php echo form_error('name'); ?>
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter email','name'=>'email', 'value'=>set_value("email")]); ?> 
		  </div>
		  <?php echo form_error('email'); ?>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter password', 'name'=>'password', 'value'=>set_value("password") ]); ?> 
		  </div>
		  <?php echo form_error('password'); echo br(1); ?>
		  
		    <?php echo form_submit(['class'=>'btn btn-success','value'=>'Submit']); ?> 
		    <?php echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']); ?> 
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>
